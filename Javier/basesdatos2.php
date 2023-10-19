<?php

    // CONSTANTES DE LA CONEXIÓN A LA BASE DE DATOS
    include "dbconf.php";


    function consulta($connect,$lista_query){
        $totalist= mysqli_query($connect, $lista_query);
        return $totalist;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoge los datos del formulario
        $password = $_POST["password"];
        $email = $_POST["email"];
        $active = isset($_POST["remenber"]) ? 1 : 0; // Verifica si la casilla está marcada
    }

    // CONEXIÓN A LA BASE DE DATOS
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    // VERIFICACIÓN DE LA CONEXIÓN
    if(!$connect) {
        echo "Error de conexión: ".mysqli_connect_error();
    } else {
        // FEM UNA SELECT PER RETORNAR TOTS ELS USERS (Aquí deberías usar una consulta SELECT con parámetros adecuados para evitar inyecciones SQL)
        $query = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
        $result = mysqli_query($connect, $query);

        if (!$result) {
            echo "Error en la consulta: " . mysqli_error($connect);
        } else {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $surname = $row['surname'];
            $rol = $row['rol'];

            // Si no se encuentra el usuario, redirigir a la página de inicio de sesión
            if (!$row) {
                header('Location: login.html');
                echo "Login incorrecto";
            }

            // Si el rol es 'alumnat', mostrar información relevante
            if ($rol === 'alumnat') {
                echo "Soc un alumne <br>";
                echo "Nom: ".$name."<br>";
                echo "Cognom: ".$surname."<br>";
                echo "Email: ".$email."<br>";
            }

            // Si el rol es 'professorat', realizar una consulta adicional y mostrar los resultados
            if ($rol === 'professorat') {
                echo "Hola ".$name.", ets professor!!<br>";
                echo "La llista d'usuaris de la base de dades és:<br>";
                $lista_query = "SELECT name , surname FROM `user` ;";
                foreach(consulta($connect,$lista_query) as $prod){
                    echo "Nom i cognom: ".$prod['name']." ".$prod['surname'];
                    echo "<br>";
                }
                
            }
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($connect);
?>
