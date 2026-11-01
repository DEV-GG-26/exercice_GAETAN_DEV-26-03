<?php

class ViewAccueil {
    //ATTRIBUT
    //Ici je donne des valeurs par défauts aux attributs de ma class
    private string $title = "Mon Super Ticket";
    private array $list = [];
    private string $messageError = "";

    //GETTER

    public function getTitle(): string {
        return $this->title;
    }

 public function getList(): array {
        return $this->list;
    }
 public function getMessageError(): string {
        return $this->messageError;
    }

    // SETTER

    public function setTitle(string $title): self {
        $this->title = $title;
        return $this;
    }

    public function setList(array $list): self {
        $this->list = $list;
        return $this;
    }

    public function setMessageError(string $messageError): self {
        $this->messageError = $messageError;
        return $this;
    }

    //METHOD
    public function display(){
    ?>

        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo(htmlentities($this->title)) ?></title>
        </head>
        <body>
            <header>
                <h1><?php echo(htmlentities($this->title)) ?></h1>
            </header>

            <main>
                <h2>Liste des Produits</h2>
                <ul>
                    <?php 
                        foreach($this->list as $row){
                            echo("<li>".htmlentities($row['nom_produit'])." ,  ".htmlentities($row['nom_categorie'])."</li> <br/>");
                        }
                    ?>
                </ul>

                <p><?php echo(htmlentities($this->messageError)); ?></p>
            </main>

            <footer>
            </footer>
        </body>
        </html>

    <?php
    }    
}
