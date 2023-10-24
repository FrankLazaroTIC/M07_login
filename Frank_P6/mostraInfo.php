<?php
    //INICIEM SESSIO
    session_start();

    //INCLOUREM ELS ARXIUS AMB LES DADES DE CONNEXIO
    include "dbConf.php";

    echo "<h1>Informacio detallada de l'usuari</h1>";
        //CONNEXIÓ BBDD
        $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

        //CODI PER VERIFICAR LA CONNEXIÓ
        if(!$connect)
        {
            echo"Error de connexio: ".mysqli_connect_error();
        }
    
        else{
            //FEM UN ALTRE CONSULTA PER MOSTRAR LA LLISTA DE TOTS ELS USUARIS O NOMES FEM SELECT DEL NOM I COGNOM
            $usuariQuery = "SELECT `user_id`, `name`, `surname`, `email`,`rol`, `active` FROM `user` WHERE `user_id` = $_SESSION["user_id"]";
            $infoUsuari = mysqli_query($connect, $llistaQuery);
    
            //SI LA CONSULTA ES CORRECTA MOSTREM LES DADES DELS USUARIS
            if ($infoUsuari) {
                //UTILITZEM EL FOREACH ON RECORREM LA LLISTA QUE ENS RETORNA LA CONSULTA I ANEM MOSTRANT-LA
                foreach (consultaUsuaris($connect,$usuariQuery) as $usuari) {
                        echo "user_id: ".$usuari["user_id"]."</br>";
                        echo "Nom: ".$usuari["name"]."</br>";
                        echo "Cognom: ".$usuari["surname"]."</br>";
                        echo "Email: ".$usuari["email"]."</br>";
                        echo "Rol: ".$usuari["rol"]."</br>";
                        echo "Actiu: ".$usuari["active"]."</br>";
                    }
                    } else {
                        echo "Error al obtenir la llista de d'usuaris: " . mysqli_error($connect);
                        }
        }
        
        mysqli_close($connect);

        echo "<a href='index.php'>TORNAR</a>";
    
?>
