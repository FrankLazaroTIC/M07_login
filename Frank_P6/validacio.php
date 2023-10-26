<?php
    //INICIEM SESSIO
    session_start();

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
        $query = "SELECT `user_id`, `name`, `surname`, `email`, `password`, `rol` ,`active` FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
        $result = mysqli_query($connect, $query);

        if (!$result) {
            echo "Error en la consulta: " . mysqli_error($connect);
        } else {
            // VERIFIQUEM SI MOSTRA ALGUN RESULTAT 
            if (mysqli_num_rows($result) == 1) { //EL MYSQLI_NUM_ROWS L'UTILIZAREM PER SABER SI LA VALIDACIO PERQUE SI DONA 1 SIGNIFICA QUE HI HA UNA COINCIDENCIA AMB LA CONSULTA
                $user = mysqli_fetch_assoc($result);
                $_SESSION["LoggedIn"]=true;
                $_SESSION["nom"]=$user["name"];
                $_SESSION["rol"]=$user["rol"];
                $_SESSION["user_id"]=$user["user_id"];

                header('Location: index.php');
                } else {
                    header('Location: Login.html');
                }
            }
        }

    mysqli_close($connect);
?>