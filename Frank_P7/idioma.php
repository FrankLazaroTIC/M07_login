<?php
    //INCLOUREM ELS ARXIUS AMB LES DADES DE CONNEXIO
    
    setcookie("idioma",$_GET["lang"],time()+(60*10));

    header('Location: index.php');

?>