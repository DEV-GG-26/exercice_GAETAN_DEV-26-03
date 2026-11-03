<?php
class ViewVendeur {
    //ATTRIBUT
    private array $data;

    //CONSTRUCTEUR

    //GETTER ET SETTER
    public function getData():array{
        return $this->data;
    }
    public function setData(array $newData):self{
        $this->data = $newData;
        return $this;
    }

    //METHODS
    public function display(){
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
                        foreach($this->getData() as $vendeur){
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