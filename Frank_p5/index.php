<?php
    //INCLOUREM ELS ARXIUS AMB LES DADES DE CONNEXIO
    include "dbConf.php";


    //RECOLLIM LES DADES DEL FORMULARI
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_POST["user_id"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $rol = $_POST["rol"];
        $active = isset($_POST["active"]) ? 1 : 0; // VERIFICA SI ESTA MARCAT
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
        $query = "INSERT INTO `user` (`user_id`, `name`, `surname`, `password`, `email`, `rol`, `active`) 
        VALUES ('$user_id', '$name', '$surname', '$password', '$email', '$rol', '$active')";
        
        $user= mysqli_query($connect, $query);
        if(!$user){
            echo "Error resultat" . mysqli_error($connect);;
        }else{
            header('Location: resultat.php');
        }
    }

    mysqli_close($connect);
?>