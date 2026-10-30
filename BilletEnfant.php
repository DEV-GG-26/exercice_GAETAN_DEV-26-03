<?php
class BilletEnfant extends BilletPleinTarif{
    //ATTRIBUT
    private int $age;
   
    //CONSTRUCTEUR
    public function __construct(string $newDate, string $newHeure, string $newFilm, int $newNumero, float $newPrix, int $newAge){
        parent::__construct($newDate, $newHeure, $newFilm, $newNumero, $newPrix);    
        $this->age = $newAge;    
    }

    //GETTER 
      public function getAge():int{
        return $this->age;
    }
    
    //SETTER

    public function setAge(int $newAge):void{
        $this->age = $newAge;
    }

    //METHODE
     public function calculerPrix():float{
        if ($this->getAge() < 18) {
        return 5.0;
        }
        else {
        return parent::calculerPrix();
    }
    }
     public function imprimerDetail():void{
        echo("Billet ENFANT N°{$this->getNumero()} <br/> Tarif : {$this->calculerPrix()}€ <br/> Film : {$this->getFilm()} <br/> Séance du {$this->getDate()}, à {$this->getHeure()}." );
    }
}
?>