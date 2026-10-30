<?php
class BilletPleinTarif extends Seance{
    //ATTRIBUT
    private int $numero;
    private float $prix;
   
    //CONSTRUCTEUR
    public function __construct(string $newDate, string $newHeure, string $newFilm, int $newNumero, float $newPrix){
          parent::__construct($newDate, $newHeure, $newFilm);
        $this->numero = $newNumero;
        $this->prix = $newPrix;    
    }

    //GETTER 
      public function getNumero():int{
        return $this->numero;
    }
       public function getPrix():float{
        return $this->prix;
    }
    
    //SETTER

    public function setNumero(int $newNumero):void{
        $this->numero = $newNumero;
    }
 
    public function setPrix(float $newPrix):void{
        $this->prix = $newPrix;
    }

    //METHODE 
     public function calculerPrix():float{
        return $this->getPrix();
    }
     public function imprimerDetail():void{
        echo("Billet ADULTE N°{$this->getNumero()} <br/> Tarif : {$this->getPrix()}€ <br/> Film : {$this->getFilm()} <br/> Séance du {$this->getDate()}, à {$this->getHeure()}." );
    }
}
?>