<?php
class ViewAccueil {
    //  ATTRIBUT
    private string $title = "Liste des utilisateurs";
    private array $userList = [];
    private string $message = "";

    //  CONSTRUCTOR

    //  GETTER

    public function getTitle():string{
        return $this->title;
    }
    public function getUserList(): array{
        return $this->userList;
    }
    public function getMessage(): string{
        return $this->message;
    }

    //  SETTER

    public function setTitle(string $newTitle):void{
        $this->title = $newTitle;
    }
    public function setUserList(array $newUserList):void{
        $this->userList = $newUserList;
    }
    public function setMessage(string $newMessage):void{
        $this->message = $newMessage;
    }

    //  METHODE 
function display(): void{
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo(htmlentities($this->title)) ?></title>
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
                <?php echo($this->message) ?>
            </p>
        </section>
    </main>
</body>
</html>
<?php
}}
?>