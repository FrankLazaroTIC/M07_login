<?php
    //INCLOUREM ELS ARXIUS AMB LES DADES DE CONNEXIO
    include "dbConf.php";

    //RECOLLIM LES DADES DEL FORMULARI
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $remember = isset($_POST["remember"]) ? 1 : 0; // VERIFICA SI ESTA MARCAT
    }

    //CONNEXIÓ BBDD
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    //CODI PER VERIFICAR LA CONNEXIÓ
    if (!$connect) {
        echo "Error de conexión: " . mysqli_connect_error();
    } else {
        //FEM LA CONSULTA SQL PER BUSCAR L'USUARI PER BUSCAR AMB LES DADES EMAIL I PASSWORD PER FER LA VALIDACIÓ DEL LOGIN
        $query = "SELECT `name`, `surname`, `email`, `password` FROM `1` WHERE `email` = '$email' AND `password` = '$password'";
        $result = mysqli_query($connect, $query);

        if (!$result) {
            echo "Error en la consulta: " . mysqli_error($connect);
        } else {
            // VERIFIQUEM SI MOSTRA ALGUN RESULTAT 
            if (mysqli_num_rows($result) == 1) { //EL MYSQLI_NUM_ROWS L'UTILIZAREM PER SABER SI LA VALIDACIO PERQUE SI DONA 1 SIGNIFICA QUE HI HA UNA COINCIDENCIA AMB LA CONSULTA
                $user = mysqli_fetch_assoc($result);
                //MOSTREM LES DADES DEL USUARI GRACIAS A LA CONSULTA
                if ($user["rol"] == "alumna") {
                    echo "Sóc un alumne <br>";
                    echo "Nom: " . $user["name"] . "<br>";
                    echo "Cognom: " . $user["surname"] . "<br>";
                    echo "Email: " . $user["email"] . "<br>";
                } else {
                    //FEM UN ALTRE CONSULTA PER MOSTRAR LA LLISTA DE TOTS ELS USUARIS O NOMES FEM SELECT DEL NOM I COGNOM
                    $llistaQuery = "SELECT `name`, `surname` FROM `1` ";
                    $llistaResult = mysqli_query($connect, $llistaQuery);

                    //SI LA CONSULTA ES CORRECTA MOSTREM LES DADES DELS USUARIS
                    if ($llistaResult) {
                        echo "Hola " . $user["name"] . ", ets professor!!<br>";
                        echo "La llista d'usuaris de les bases de dades és: <br>";
                        //UTILITZEM EL FOREACH ON RECORREM LA LLISTA QUE ENS RETORNA LA CONSULTA I ANEM MOSTRANT-LA
                        foreach ($llistaResult as $usuaris) {
                            echo "Nom: " . $usuaris["name"] . " i cognom:". $usuaris["surname"] . "<br>";
                        }
                    } else {
                        echo "Error al obtenir la lista de d'usuaris: " . mysqli_error($connect);
                    }
                }
            } else {
                echo "Inici de sessió incorrecte ";
                echo "<a href='Login.html'>Iniciar sessió usuari</a>";
            }
        }
    }


    mysqli_close($connect);
?>