<?php
//UTILITZEM EL GET PER AGAFAR LA COOKIE DEL IDIOMA I VEURE SI ES ELIMINAR O ESTA BUIDA
if (isset($_GET["lang"]) && $_GET["lang"] === "eliminar") {
    // SI ES COOMPLEIX LA CONDICIÓ LA ELIMINEM
    if (isset($_COOKIE["idioma"])) {
        setcookie("idioma", "", time() - 1);
    }
}

// FEM REDIRECCIO AL INDEX.PHP
header('Location: index.php');
exit; // I SORTIM PER EVITAR QUE ES QUEDI TREBALLANT
?>