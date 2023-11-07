<?php
    session_start();

    session_unset();

    session_destroy();

    if($_SESSION["LoggedIn"] == false){
        header('Location: login.html');
    };

?>