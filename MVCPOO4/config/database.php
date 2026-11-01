<?php

class Database {
        public function getConnection(): PDO {
        try{
            //1) Se connecter à la BDD en créant l'objet PDO
            $pdo = new PDO('mysql:host=localhost;dbname=ticket','root','root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return $pdo;

        }catch(EXCEPTION $error){
            die($error->getMessage());
            }
        }   
    }
?>

