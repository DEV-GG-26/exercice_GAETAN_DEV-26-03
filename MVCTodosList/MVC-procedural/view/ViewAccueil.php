<?php

function display($title,$userList,$message){
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo(htmlentities($title)) ?></title>
</head>
<body>
    <main>
        <h1>Page d'Accueil</h1>
        <section>
            <h2>Inscription</h2>
            <form action="" method="post">
                <label for="prenom">Prenom <input type="text" name="prenom" id="prenom"></label>
                <label for="nom">Nom <input type="text" name="nom" id="nom"></label>
                <label for="email">Email <input type="text" name="email" id="email"></label>
                <label for="password">Mot de Passe <input type="text" name="password" id="password"></label>
                <input type="submit" name="submit">
            </form>
            <h2>Liste des utilisateurs</h2>
            <p>
                <?php echo($message) ?>
            </p>
        </section>
    </main>
</body>
</html>
<?php
}
?>