<?php

namespace App\Controllers;

use Exception;

class ArraysController
{
    /**
     * @author Andres Maldonado
     * @description Funcion para renderizar las vistas
     * 
     * @param Int $id
     * @return Void
     */
    public function steps($id)
    {
        switch ($id) {
            case 1:
                require_once '../views/first.php';
                break;

            case 2: 
                require_once '../views/second.php';
                break;
            
            case 3:
                require_once '../views/third.php';
                break;
            
            case 4:
                require_once '../views/fourth.php';
                break;
            
            case 5:
                require_once '../views/fifth.php';
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * @author Andres Maldonado
     * @description Funcion para calcular los puntos dado un arreglo y sus restricciones
     * 
     * @return String
     */
    public function firstStep()
    {
        if (isset($_POST['numberList'])) {
            $arrayList = explode(',', $_POST['numberList']);
            $points = 0;
            foreach ($arrayList as $value) {

                if ($value == 8) {
                    $points += 5;
                } else {
                    if ($value % 2 == 0) {
                        $points++;
                    } else {
                        $points += 3;
                    }
                }
            }

            echo 'Los puntos son '.$points;
        } else {
            return;
        }
    }

    /**
     * @author Andres Maldonado
     * @description Funcion para calcular la suma de 2 numeros dentro de un array (Sus intermedios)
     * 
     * @return String
     */
    public function secondStep()
    {
        $arrayInt = [ 10,20,30,40,50,60,70,80,90,100 ];

        if (isset($_POST['firstNumber']) && isset($_POST['secondNumber'])) {
            $firstNumber = $_POST['firstNumber'];
            $secondNumber = $_POST['secondNumber'];

            if ($firstNumber < 0 || $secondNumber < 0) {
                echo -1;
                return;
            }

            if ($firstNumber > $secondNumber || ($firstNumber > 100 && $secondNumber > 100)) {
                echo 0;
                return;
            }
            $sum = 0;
            foreach ($arrayInt as $value) {
                if ($value > 100) {
                    break;
                }

                if ($value >= $firstNumber && $value <= $secondNumber) {
                    $sum += $value;
                }
            }

            echo 'La suma es: '.$sum;
        } else {
            return;
        }
    }

    /**
     * @author Andres Maldonado
     * @description Para calcular el angulo entre las horas del reloj
     * 
     * @return String
     */
    public function thirdStep()
    {
        if (isset($_POST['time'])) {
            try {
                $time = $_POST['time'];

                $arrayTime = explode(':', $time);

                $hour = $arrayTime[0];
                $minute = $arrayTime[1];

                if ($hour > 11 || $minute > 59 || $hour < 0 || $minute < 0 || strlen($hour) < 2 || strlen($minute) < 2) {
                    throw new Exception('Formato no valido');
                } else {
                    if ($hour == '00') $hour = 12;
                    if ($minute == '00') $minute = 60;

                    $array = [1,2,3,4,5,6,7,8,9,10,11,12];
                    $minuteInNumber = $minute / 5;

                    if ($hour/6 < 1) {
                        if ($minute/30 > 1) {
                            rsort($array);
                        } 
                        foreach ($array as $key => $value) {
                            if ($value == $minuteInNumber) {
                                if ($key != 12) {
                                    echo ($key+$hour) * 30;
                                } else {
                                    echo $key*30;
                                }
                            }
                        }
                    } else {
                        if ($minute/30 < 1) {
                            rsort($array);
                        } 
                        foreach ($array as $key => $value) {
                            if ($value == $minuteInNumber) {
                                if ($key != 12) {
                                    echo ($key+$hour) * 30;
                                } else {
                                    echo $key*30;
                                }
                            }
                        }
                    }

                    
                }
            } catch (\Exception $e) {
                print_r($e->getMessage());
            }
        }
    }

    /**
     * @author Andres Maldonado
     * @description Funcion para encontrar el valor de la posicion dada de una matriz y segun sus longitudes
     * 
     * @return String
     */
    public function fourthStep()
    {
        if (isset($_POST['sizeX']) && isset($_POST['sizeY']) && isset($_POST['posX']) && isset($_POST['posY'])) {
            $sizeX = $_POST['sizeX'];
            $sizeY = $_POST['sizeY'];
            $posX = $_POST['posX'];
            $posY = $_POST['posY'];

            $array = [];
            $count=0;

            $controlX = 0;
            $controlY = 0;

            $x=0;
            $y=0;

            $loop = 0;
            
            $array[$x][$y] = $count;
            $count++;
            $loop++;
            $flag = true;

            while ($flag) {
                if ($loop < $sizeY) {
                    $controlY = $loop;
                    $y = $controlY;
                    if ($loop < $sizeX) {
                        $controlX = $loop;
                        $x = 0;
                    }
                }

                $array[$x][$y] = $count;
                $count++;

                for ($l = 0; $l <= $loop; $l++) {
                    $y--;
                    $x++;

                    if ($y >= 0) {
                        $array[$x][$y] = $count;
                        $count++;
                    }
                }

                if ($loop == $sizeY) $flag = false;

                $loop++;

            }

            echo $array[$posY][$posX];
        }
    }

    /**
     * @author Andres Maldonado
     * @description Funcion para calcular el perimetro de un area segun su longitud y numero de modulos requeridos
     * 
     * @return String
     */
    public function fifthStep()
    {
        if (isset($_POST['L']) && isset($_POST['N'])) {
            $l = $_POST['L'];
            $n = $_POST['N'];

            try {
                if ($l <= 0 || $n > $l**2 || $n < 0) {
                    throw new Exception('ERROR');
                } else {
                    if ($n == 0) {
                        $perimeter = 0;
                    } else {
                        if ($n%2 == 0) {
                            $perimeter = $l*4 + 4;
                        } else if ($l == $n) {
                            $perimeter = $l*4;
                        } else {
                            $a = $l**2;
                            $diff = $a - $n;

                            $perimeter = ($l*2) + (($l-$diff)*2) + $diff*2;
                        }
                    }

                    echo 'Perimetro: '.$perimeter;
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}

?>