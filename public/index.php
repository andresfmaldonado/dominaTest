<?php
require_once '../config/config.php';
require_once '../vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/dominaTest/index">DOMINA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/dominaTest/steps/1">First Step</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/dominaTest/steps/2">Second Step</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/dominaTest/steps/3">Third Step</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/dominaTest/steps/4">Fourth Step</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/dominaTest/steps/5">Fifth Step</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

        <?php
        require_once '../app/ArraysController.php';
        require_once '../app/IndexController.php';
        ?>
        
    </body>
</html>

<?php

require_once '../routes/web.php';
require_once '../app/Router.php';
?>
