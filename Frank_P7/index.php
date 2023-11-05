<?php

    //INCLOUREM ELS ARXIUS AMB LES DADES DE CONNEXIO
    include "dbConf.php";
    include "functions.php";

    ///////////////////////////////////////// 
    ///////////////////////////////////////// 
    //////////////////////////////////////// 

    //INICIEM SESSIO
    session_start();

    //VARIABLES
    if(isset($_SESSION["LoggedIn"])){
    //Nom usuari de la sessio
    $nomUser=$_SESSION["nom"];

    //Id usuari de la sessio
    $idUser=$_SESSION["user_id"];

    //Rol usuari de la sessio
    $rolUser=$_SESSION["rol"];

    //IDIOMES
    $holaCA= "<h2>Hola ". $nomUser." ets un ".$rolUser."</h2><br>";
    $linksCA= "<a href='mostraInfo.php?user_id=".$idUser."'>Mostra informació</a> <a href='logout.php'>Desconectar</a>";

    $holaES= "<h2>Hola ". $nomUser." eres un ".$rolUser."</h2><br>";
    $linksES="<a href='mostraInfo.php?user_id=".$idUser."'>Mostrar información</a> <a href='logout.php'>Desconectarse</a>";

    $holaEN= "<h2>Hi ". $nomUser." you are a ".$rolUser."</h2><br>";
    $linksEN= "<a href='mostraInfo.php?user_id=".$idUser."'>More information</a> <a href='logout.php'>Disconnect</a>";


    $linkIdiomaCA ="<a href='idioma.php?lang=ca'>Cat</a> ";
    $linkIdiomaES ="<a href='idioma.php?lang=es'>Es</a> ";
    $linkIdiomaEN ="<a href='idioma.php?lang=en'>En</a> ";

    //AMB AQUESTA CONDICIO COMPROVEM SI S'HA FET LOGIN

    if(isset($_COOKIE["idioma"])){
        if($_COOKIE["idioma"]=="ca"){
            echo $holaCA;
            echo "<a href='idioma.php?lang=ca' style='color:red'>Cat</a> ";
            echo $linkIdiomaES;
            echo $linkIdiomaEN;
            echo "<a href='delete.php?lang=eliminar'>Eliminar</a><br>";
            echo "<br>";
            echo $linksCA;
        } else if($_COOKIE["idioma"]=="es"){
            echo $holaES;
            echo $linkIdiomaCA;
            echo "<a href='idioma.php?lang=es' style='color:red'>Es</a> ";
            echo $linkIdiomaEN;
            echo "<a href='delete.php?lang=eliminar'>Eliminar</a><br>";
            echo "<br>";
            echo $linksES;
        } else if($_COOKIE["idioma"]=="en"){
            echo $holaEN;
            echo $linkIdiomaCA;
            echo $linkIdiomaES;
            echo "<a href='idioma.php?lang=en' style='color:red'>En</a> ";
            echo "<a href='delete.php?lang=eliminar'>Eliminar</a><br>";
            echo "<br>";
            echo $linksEN;
        }
    } else {
        echo "<h2>Hola ". $nomUser." ets un ".$rolUser."</h2>";
    
        echo "<a href='idioma.php?lang=ca' style='color:red'>Cat</a> ";
        echo "<a href='idioma.php?lang=es'>Es</a> ";
        echo "<a href='idioma.php?lang=en'>En</a> ";
        echo "<a href='delete.php?lang=eliminar'>Eliminar</a><br>";
        echo "<br>";
    
        echo "<a href='mostraInfo.php?user_id=".$idUser."'>Mostra informació</a> <a href='logout.php'>Desconectar</a>";
    }
    
    //CONNEXIÓ BBDDH 
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    //CODI PER VERIFICAR LA CONNEXIÓ
    if(!$connect)
    {
        echo"Error de connexio: ".mysqli_connect_error();
    }

    else if($rolUser=="professorat"){
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