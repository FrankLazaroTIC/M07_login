<?php
    //Iniciem la sessio
    session_start();

    //La tanquem
    session_unset();
    session_destroy();
    if($_SESSION["LoggedIn"]==false){
        //REDICCIONAREM A LOGIN
        header('Location: Login.html');
    }
    
    
?>
