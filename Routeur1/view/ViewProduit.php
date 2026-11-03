<?php
class ViewProduit {
    //ATTRIBUT
    private array $dataProduit;

    //CONSTRUCTEUR

    //GETTER ET SETTER
    public function getDataProduit():array{
        return $this->dataProduit;
    }
    public function setDataProduit(array $newDataProduit):self{
        $this->dataProduit = $newDataProduit;
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
            <title>Produit</title>
        </head>
        <body>
            <main>
                <h1>Liste de Produits :</h1>
                <ul>
                    <?php 
                        foreach($this->getDataProduit() as $produit){
                            echo("<li>{$produit["nom_produit"]} : {$produit["nom_categorie"]}</li>");
                        }
                    ?>
                </ul>
            </main>
        </body>
        </html>
<?php
    }
}