<?php
    //INICIEM SESSIO
    session_start();

    //INCLOUREM ELS ARXIUS AMB LES DADES DE CONNEXIO
    include "dbConf.php";
    include "functions.php";

    //IDIOMA

    $titolCA ="<h1>Informacio detallada de l'usuari</h1><br>";
    $titolES ="<h1>Informacion detallada del usuari</h1><br>";
    $titolEN="<h1>Detailed user information</h1><br>";

    if(isset($_COOKIE["idioma"])){
        if($_COOKIE["idioma"]=="ca"){
            echo $titolCA;
        } else if($_COOKIE["idioma"]=="es"){
            echo $titolES;
        } else if($_COOKIE["idioma"]=="en"){
            echo $titolEN;
        }else{
            echo "<h1>Informacio detallada de l'usuari</h1><br>";
        }
    }

    
    //AGAFEM LA ID AMB EL GET
    $user_id=$_GET["user_id"];           
    //CONNEXIÓ BBDD
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    //CODI PER VERIFICAR LA CONNEXIÓ
        if(!$connect)
        {
            echo"Error de connexio: ".mysqli_connect_error();
        }
    
        else{
            //FEM UN ALTRE CONSULTA PER MOSTRAR L'INFORMACIO ENMMAGATZEMADA DE L'USUARI 
            $usuariQuery = "SELECT `user_id`, `name`, `surname`, `email`,`rol`, `active` FROM `user` WHERE `user_id` = $user_id";
            $infoUsuari = mysqli_query($connect, $usuariQuery);
    
            //SI LA CONSULTA ES CORRECTA MOSTREM LES DADES DELS USUARIS
            if ($infoUsuari) {
                //UTILITZEM EL FOREACH ON RECORREM LA LLISTA QUE ENS RETORNA LA CONSULTA I LA MOSTREM
                foreach (consultaUsuaris($connect,$usuariQuery) as $usuari) {
                        echo "user_id: ".$usuari["user_id"]."</br>";
                        echo "Nom: ".$usuari["name"]."</br>";
                        echo "Cognom: ".$usuari["surname"]."</br>";
                        echo "Email: ".$usuari["email"]."</br>";
                        echo "Rol: ".$usuari["rol"]."</br>";
                        if($usuari["active"]==0){
                            echo "Actiu: No</br>";
                        } else{
                            echo "Actiu: Si</br>";
                        }
                    }
                    } else {
                        echo "Error al obtenir més informació de l'usuari " . mysqli_error($connect);
                        }
        }
        
        mysqli_close($connect);

        echo "<a href='index.php'>TORNAR</a>";
    
?>
