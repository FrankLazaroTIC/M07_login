
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Informacio detallada de l'usuari</h1>
    <?php
    
    include "dbconf.php";

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

    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
    session_start();
     
    $user_id = $_GET["id"];

    $query = "SELECT * FROM `user` WHERE `user_id` = '$user_id' ";
    $result = mysqli_query($connect, $query);

    foreach ($result as $prod) {
        echo "user_id : " . $prod['user_id'] . "</br>";
        echo "Nom : " . $prod['name'] . "</br>";
        echo "Cognom : " . $prod['surname'] . "</br>";
        echo "Email : " . $prod['email'] . "</br>";
        echo "Rol :" .$prod['rol'] . "</br>";
        echo "Actiu :" .$prod['active'] . "</br>";
    }


    echo "</br><a href = 'index.php'><b>TORNAR</b></a>";
    ?>
</body>
</html>
