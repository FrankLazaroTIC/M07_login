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
    if(!$connect)
    {
        echo"Error de connexio: ".mysqli_connect_error();
    }

    else{
        //FEM UN SELECT PER RETORNAR TOTS ELS USERS
        $alumne = "SELECT `surname`,`email`,`password` FROM `1` WHERE 1";
        
        $user= mysqli_query($connect, $alume);

        if(!$user){
            echo "Error resultat" . mysqli_error($connect);;
        }else{
            header('Location: resultat.php');
        }
        if(isset($_POST["email"]) && isset($_POST["psw"])&& ($_POST["email"]=='email' && $_POST["psw"]=='password')){
            echo "Login correcte";
            foreach ($users as $key => $usuaris) {
                    echo "La llista d'usuaris de la base de dades és:";
                    echo "nom i cognom". $usuaris["user"].$surname["surname"];
            }
        }

    }

    mysqli_close($connect);
?>