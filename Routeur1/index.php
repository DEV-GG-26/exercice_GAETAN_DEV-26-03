<?php
try{
    //1) Se connecter à la BDD en créant l'objet PDO
    $pdo = new PDO('mysql:host=localhost;dbname=ticket','root','root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    //2) Préparer la requête SELECT pour récupérer le nom des produits et leur catégorie
    $requestProduit = $pdo->prepare('SELECT p.nom_produit, c.nom_categorie FROM produit p INNER JOIN categorie c ON p.id_categorie = c.id_categorie;');
    $requestVendeur = $pdo->prepare('SELECT v.id_vendeur, v.nom_vendeur, v.prenom_vendeur, v.email_vendeur FROM vendeur v');
    //3) Envoyer la requête à la BDD
    $requestProduit->execute();
    $requestVendeur->execute();

    //4) Récupérer la réponse de la BDD
    // PDO::FETCH_ASSOC : permet de récupérer la réponse uniquement sous forme de tableaux associatifs
    $dataProduit = $requestProduit->fetchAll(PDO::FETCH_ASSOC);
    $dataVendeur = $requestVendeur->fetchAll(PDO::FETCH_ASSOC);
}catch(EXCEPTION $error){
    die($error->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Liste de Produits :</h1>
        <ul>
            <?php 
                foreach($dataProduit as $produit){
                    echo("<li>{$produit["nom_produit"]} : {$produit["nom_categorie"]}</li>");
                }
            ?>
        </ul>
        <h1>Liste des Vendeurs :</h1>
        <ul>
            <?php 
                foreach($dataVendeur as $vendeur){
                    echo("<li>{$vendeur["nom_vendeur"]}, {$vendeur["prenom_vendeur"]}, {$vendeur["email_vendeur"]}</li>");
                }
            ?>
        </ul>
    </main>
</body>
</html>