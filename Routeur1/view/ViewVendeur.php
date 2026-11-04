<?php
class ViewVendeur {
    //ATTRIBUT
    private array $dataVendeur;

    //CONSTRUCTEUR

    //GETTER ET SETTER
    public function getDataVendeur():array{
        return $this->dataVendeur;
    }
    public function setDataVendeur(array $newDataVendeur):self{
        $this->dataVendeur = $newDataVendeur;
        return $this;
    }

    //METHODS
    public function displayVendeur(){
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Vendeur</title>
        </head>
        <body>
            <main>
                <h1>Liste des Vendeurs :</h1>
                <ul>
                    <?php 
                        foreach($this->getDataVendeur() as $vendeur){
                            echo("<li>{$vendeur["nom_vendeur"]}, {$vendeur["prenom_vendeur"]}, {$vendeur["email_vendeur"]}</li>");
                        }
                    ?>
                </ul>
            </main>
        </body>
        </html>
<?php
    }
}