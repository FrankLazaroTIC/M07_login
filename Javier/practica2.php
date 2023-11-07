<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $taula = array();
        $print = array();

        for($m = 0; $m <10;$m++){                 //aquesta for serveix per inserta los
            array_push($taula,rand(0,5));        //numeros dins de array con el rand pasa selecciona un numero entre 0,5
        }

        for ($m = 0; $m < count($taula); $m++) {        //aquesta for serveix per inserta los imformacio que vol imprimir
            if ($taula[$m] == 5) {
                array_push($print, "<li>La taula $m està plena</li>");
            } elseif ($taula[$m] == 0) {
                array_push($print, "<li>La taula $m està buida</li>");
            } else {
                array_push($print, "<li>La taula $m té {$taula[$m]} comensals</li>");
            }
        }

        $hotel = array(array(),array(),array(),array(),array());
        $hab = array();
        for ($m = 0; $m < 5; $m++) {                        //aquesta for serveix per inserta los
            for ($n = 0; $n < 10; $n++) {                   //numeros dins de array de un array
                $hotel[$m][$n] = rand(0, 4);                //con el rand pasa selecciona un numero entre 0,4
            }
        }
        for ($n = 0; $n < 5; $n++) {                    //aquesta for serveix per inserta los imformacio que vol imprimir a part de planta
            for ($m = 0; $m < 10; $m++) {           //aquesta for serveix per inserta los imformacio que vol imprimir a part habitacio
                if ($hotel[$n][$m] == 5) {
                    array_push($print, "<li>La Habitacio $m de la planta $n està plena</li>");
                } elseif ($hotel[$n][$m] == 0) {
                    array_push($print, "<li>La Habitacio $m de la planta $n està buida</li>");
                } else {
                    array_push($print, "<li>La Habitacio $m de la planta $n té {$hotel[$n][$m]} comensals</li>");
                }
            }
        }
        
        echo implode('', $hab);                 //imprimir el array a html
        echo implode('', $print);               //imprimir el array a html
    ?>



</body>
</html>