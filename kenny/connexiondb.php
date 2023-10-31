<?php
    try{
        $pdo= new PDO("mysql:host=localhost;dbname=geopanneau","root","");
    }catch(Exception $e){
        die('Erreur de connexion :' .$e->getMessage());
    }
?>