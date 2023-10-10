<?php
    //CONSTANTS DE LA CONNEXIO A LES BBDD
    define("DB_HOST","localhost");
    define("DB_NAME","users");
    define("DB_USER","root");
    define("DB_PSW",'');
    //DEFINIM EL PORT
    define("DB_PORT",3306);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoge los datos del formulario
        $user_id = $_POST["user_id"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $active = isset($_POST["active"]) ? 1 : 0; // Verifica si la casilla está marcada
        $rol = $_POST["rol"];
    }

    //CONNEXIÓ BBDD
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    //CODI PER VERIFICAR LA CONNEXIÓ
    if(!$connect)
    {
        echo"Error de connexio: ".mysqli_connect_error();
    }

    else{
        //FEM UNA SELECT PER RETORNAR TOTS ELS USERS
        $query = "INSERT INTO `user`(`user_id`, `name`, `surname`, `password`, `email`, `active`, `rol`) 
    VALUES ('$user_id','$name','$surname','$password','$email','$active','$rol')";;
    
    $usuario = mysqli_query($connect, $query);
    
    if (!$usuario) {
        echo "Error en la consulta: " . mysqli_error($connect);
    }else{
        header('Location: resultat.php');
    }
    }

    mysqli_close($connect);

?>