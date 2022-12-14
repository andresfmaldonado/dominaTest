<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\NoConfigurationException;
use App\Controllers\ArraysController;

class Router
{
    /**
     * @author Andres Maldonado
     * @description Funcion para cargar el controlador solicitado
     */
    public function __invoke(RouteCollection $routes)
    {
        $context = new RequestContext();
        $request = Request::createFromGlobals();
        $context->fromRequest(Request::createFromGlobals());
        
        $matcher = new UrlMatcher($routes, $context);

        try {
            $matcher = $matcher->match($_SERVER['REQUEST_URI']);

            // Cast params to int if numeric
            array_walk($matcher, function(&$param)
            {
                if(is_numeric($param)) 
                {
                    $param = (int) $param;
                }
            });

            $className = '\\App\\Controllers\\' . $matcher['controller'];
            $classInstance = new $className();

            $params = array_merge(array_slice($matcher, 2, -1), [ 'route' => $routes ]);

            call_user_func_array([ $classInstance, $matcher['method'] ], $params);
        } catch (\MethodNotAllowedException $e) {
            echo 'Route Method is not allowed';
        } catch (ResourceNotFoundException $e) {
            print_r($e->getMessage());
            echo 'Route does not exists.';
        } catch (NoConfigurationException $e) {
            echo 'Configuration does not exists.';
        }
    }
}

$router = new Router();
$router($routes);
