<?php
class Seance{
    //ATTRIBUT
    private string $date;
    private string $heure;
    private string $film;
   
    //CONSTRUCTEUR
    public function __construct(string $newDate, string $newHeure, string $newFilm){
        $this->date = $newDate;
        $this->heure = $newHeure;
        $this->film = $newFilm;    
    }

    //GETTER 
      public function getDate():string{
        return $this->date;
    }
       public function getHeure():string{
        return $this->heure;
    }

    public function getFilm():string{
        return $this->film;
    }
    
    //SETTER

    public function setDate(string $newDate):void{
        $this->date = $newDate;
    }
 
    public function setHeure(string $newHeure):void{
        $this->heure = $newHeure;
    }

    public function setFilm(string $newFilm):void{
            $this->film = $newFilm;
        }

    //METHODE 
}
?>