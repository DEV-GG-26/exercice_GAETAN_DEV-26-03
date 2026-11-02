<?php
require_once '../model/ModelInscription.php';
require_once '../model/ModelUtilisateur.php';
require_once '../view/ViewAccueil.php';

function render(){
    $title = "Liste des utilisateurs";
    $list = []; 
    $messageError = "";
    $data = findAll();
    switch(gettype($data)){
        case "string" :
            $messageError = $data;
            display($title, [], $messageError);
            break;
        case "array" :
            $list = $data;
            display($title, $list, "");
            break;
        default:
            $messageError = "Type de données inattendu.";
            display($title, [], $messageError);
            break;
    }
}
render();
?>






