<?php
    session_unset();
    session_destroy();
    header('Location: Login.html');
    
?>
