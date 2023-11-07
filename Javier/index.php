<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    session_start();
    include "dbconf.php";
    if(isset($_SESSION["LoggedIn"])){

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

    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

    echo "<h2>Hola " . $_SESSION["nom"]. " ets un ". $_SESSION["rol"]. "</h2>";

    echo "<a href = 'mostrainfo.php?id=".$_SESSION["user_id"]."'>Mostrar informació</a>    <a href = 'desconet.php'>Desconnectar</a>";

    if ($_SESSION["rol"] == 'professorat') {

        $lista_query = "SELECT name , surname , email FROM `user` ;";
        echo "<table><tr><th>Nom</th><th>Cognom</th><th>Email</th></tr>";
        $lista = mysqli_query($connect, $lista_query);
        foreach($lista as $prod){
            echo "<tr><td>".$prod['name']."</td><td>".$prod['surname']."</td><td>".$prod['email']."</td></tr>";
        }
        echo "</table>";
    }
}
    ?>
</body>
</html>