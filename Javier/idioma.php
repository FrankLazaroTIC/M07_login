<?php
    //INCLOUREM ELS ARXIUS AMB LES DADES DE CONNEXIO
    
    setcookie("idioma",$_GET["lang"],time()+(60*10));//60 es segong,* per 10 es son 10 min,i -1 es borra cookie

    header('Location: index.php');

?>