<?php

    //INICIEM SESSIO
    session_start();

    //INCLOUREM ELS ARXIUS AMB LES DADES DE CONNEXIO
    include "dbConf.php";
    include "functions.php";


    //AMB AQUESTA CONDICIO COMPROVEM SI S'HA FET LOGIN
    if(isset($_SESSION["LoggedIn"])){

    echo "<h2>Hola ". $_SESSION["nom"]." ets un ".$_SESSION["rol"]."</h2>";
    
    echo "<a href='mostraInfo.php?user_id=".$_SESSION["user_id"]."'>Mostra informació</a> <a href='logout.php'>Desconectar</a>";
    
    //CONNEXIÓ BBDDH 
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    //CODI PER VERIFICAR LA CONNEXIÓ
    if(!$connect)
    {
        echo"Error de connexio: ".mysqli_connect_error();
    }

    else if($_SESSION["rol"]=="professorat"){
        //FEM UN ALTRE CONSULTA PER MOSTRAR LA LLISTA DE TOTS ELS USUARIS O NOMES FEM SELECT DEL NOM I COGNOM
        $llistaQuery = "SELECT `name`, `surname`, `email` FROM `user` WHERE `rol` = 'professorat'";
        $llistaResult = mysqli_query($connect, $llistaQuery);

        //SI LA CONSULTA ES CORRECTA MOSTREM LES DADES DELS USUARIS
        if ($llistaResult) {
            echo "<table>";
            echo "<tr><th>Nom</th><th>Cognom</th><th>Email</th></tr>";
            //UTILITZEM EL FOREACH ON RECORREM LA LLISTA QUE ENS RETORNA LA CONSULTA I ANEM MOSTRANT-LA
            foreach (consultaUsuaris($connect,$llistaQuery) as $usuaris) {
                    echo "<tr><td>".$usuaris["name"]."</td> <td>".$usuaris["surname"]."</td> <td>".$usuaris["surname"]. "</td></tr>";
                }
            echo "</table>";
                } else {
                    echo "Error al obtenir la llista de d'usuaris: " . mysqli_error($connect);
                    }
    }
    mysqli_close($connect);
    }else{
        echo "<h2>No tens acces </h2>";
        echo "<a href='Login.html'>Fes Login</a>";
    }
?>