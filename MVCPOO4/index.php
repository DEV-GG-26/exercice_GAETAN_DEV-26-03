<?php
//Import des Ressources
require_once 'config/Database.php';
require_once 'model/ModelProduit.php';
require_once 'view/ViewAccueil.php';
require_once 'controller/ControllerAccueil.php';

// Connexion bdd ticket
$database = new Database();
$pdo = $database->getConnection();

// Création MODELE
$modelProduit = new ModelProduit($pdo);

// Création VUE
$viewAccueil = new ViewAccueil();

// CREATION CONTROLLER
$controllerAccueil = new ControllerAccueil($modelProduit,$viewAccueil);


//Lancer le rendu
$controllerAccueil->render();

?>