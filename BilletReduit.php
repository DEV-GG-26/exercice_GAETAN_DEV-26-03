<?php
class BilletReduit extends BilletPleinTarif{
    //ATTRIBUT
    private string $justificatif;
   
    //CONSTRUCTEUR
    public function __construct(string $newDate, string $newHeure, string $newFilm, int $newNumero, float $newPrix, string $newJustificatif){
        parent::__construct($newDate, $newHeure, $newFilm, $newNumero, $newPrix);    
        $this->justificatif = $newJustificatif;    
    }

    //GETTER 
      public function getJustificatif():string{
        return $this->justificatif;
    }
    
    //SETTER

    public function setJustificatif(string $newJustificatif):void{
        $this->justificatif = $newJustificatif;
    }

    //METHODE
    public function calculerPrix(): float {
        if ( preg_match("/carte étudiante/i", $this->getJustificatif())) {
            return $this-> getPrix() * 0.7;
        }
        return $this->getPrix();
    }
     public function imprimerDetail():void{
        echo("Billet ETUDIANT N°{$this->getNumero()} <br/> Tarif de : {$this ->calculerPrix()}€ <br/> Film : {$this->getFilm()} <br/> Séance du {$this->getDate()}, à {$this->getHeure()}." );
    }
}
?>