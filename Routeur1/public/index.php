<?php
//Import des Ressources
include '../controller/ControllerProduit.php';
include '../controller/ControllerVendeur.php';
include '../model/ModelProduit.php';
include '../model/ModelVendeur.php';
include '../view/ViewProduit.php';
include '../view/ViewVendeur.php';

//ROUTEUR : mise en place
// 1. Configurer le fichier .htaccess

// 2. Récupérer et vérifier l'url de la requête
//Superglobale $_SERVER : conserve les données liées à la requête reçu par le server
// -> on récupère les informations de l'url avec l'étiquette ["REQUEST_URI"]
$url = $_SERVER["REQUEST_URI"];

// -> problème, cette $url prend en compte les variables GET. Or, je ne les veux pas pour vérifier quelle route est demandé. Pour cela je dois juste récupérer le path de l'url, à savoir la partie se trouvant après le nom de domaine, mais s'arrêtant avant les variables GET. Pour cela je dois décompose avec la fonction : parse_url() qui retourne un tableau associatif. La clé qui nous intéresse c'est ["path"]
$path = parse_url($url)["path"];

// 3. Vérifier le path et Lancer le controller selon l'url demandé
switch($path){
    case Exercice/exercice_GAETAN_DEV-26-03/Routeur1/controller/ControllerProduit.php:
        $model = new ModelProduit(new PDO('mysql:host=localhost;dbname=ticket','root','root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]));
        $view = new ViewProduit();
        $controller = new ControllerProduit($model, $view);
        $controller->render();
        break;
    case Exercice/exercice_GAETAN_DEV-26-03/Routeur1/controller/ControllerVendeur.php:
        $model = new ModelVendeur(new PDO('mysql:host=localhost;dbname=ticket','root','root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]));
        $view = new ViewVendeur();
        $controller = new ControllerVendeur($model, $view);
        $controller->render();
        break;
    default :
        http_response_code(404);
        echo ("<h1>Error 404 Not Found !</h1>");
        break;
}