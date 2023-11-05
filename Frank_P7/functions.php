<?php
    //Funcio Consulta Usuaris
    function consultaUsuaris($connect, $query){
        $llistaResult = mysqli_query($connect, $query);
        
        return $llistaResult;
    }
?>