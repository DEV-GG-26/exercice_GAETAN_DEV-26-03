<?php
require_once __DIR__ . "/Seance.php";
require_once __DIR__ . "/BilletPleinTarif.php";
include_once __DIR__ . "/BilletReduit.php";
include_once __DIR__ . "/BilletEnfant.php";

// Construction d'un film =>  Séance pour le film "Dunesday" le 16 Décembre 2026 à 20h30

$film1 = new Seance("16/12/2026", "20h30", "Dunesday");

/*echo $film1->getFilm();
echo $film1->getDate();
echo $film1->getHeure();*/

// Construction du billet pour adulte avec le numéro 12, prix : 23.5 euros

$adulte1 = new BilletPleinTarif ($film1->getDate(), $film1->getHeure(), $film1->getFilm(),12,24.5);
$adulte1->imprimerDetail();

echo("<br/><br/>");

//  Construction du billet pour étudiant avec le numero 42, prix réel : 23.5 euros, justificatif "carte étudiante"

$etudiant1 = new BilletReduit ($film1->getDate(), $film1->getHeure(), $film1->getFilm(), 42, $adulte1->getPrix(),"carte étudiante");
$etudiant1->imprimerDetail();

echo("<br/><br/>");

//  Construction du billet pour enfant : numero 11, prix : 5 euros, age : 9 ans
$enfant1 = new BilletEnfant ($film1->getDate(), $film1->getHeure(), $film1->getFilm(), 11, $adulte1->getPrix(),9);
$enfant1->imprimerDetail();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>test</p>
</body>
</html>