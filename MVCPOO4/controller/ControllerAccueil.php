<?php
class ControllerAccueil{
    //ATTRIBUT
    private ModelProduit $modelProduit;
    private ViewAccueil $viewAccueil;

    //CONSTRUCTEUR
    public function __construct(ModelProduit $modelProduit, ViewAccueil $viewAccueil){
        $this->modelProduit = $modelProduit;
        $this->viewAccueil = $viewAccueil;
    }

    //GETTER ET SETTER
    public function getModelProduit(): getModelProduit {
        return $this->modelProduit;
    }

    //Set the value of modelProduit
    public function setModelProduit(ModelProduit $modelProduit): self {
        $this->modelProduit = $modelProduit;
        return $this;
    }

    //Get the value of viewAccueil
    public function getViewAccueil(): ViewAccueil {
        return $this->viewAccueil;
    }

    // Set the value of viewAccueil
    public function setViewAccueil(ViewAccueil $viewAccueil): self {
        $this->viewAccueil = $viewAccueil;
        return $this;
    }

    //METHOD
    public function render(){
        //1.Récupérer les données utilisateurs
        // -> appelle à findAll() du model et stocker les données retournés dans une variable
        $data = $this->modelProduit->findAll();

        //2. Vérifier les data pour savoir si je reçois un tableau de donnée ou un message d'erreur
        switch(gettype($data)){
            case "string" :
                //Cas où on reçoit un message d'erreur
                $this->viewAccueil->setMessageError($data)->display();
                break;
            case "array" :
                //Cas où on reçoit nos données
                $this->viewAccueil->setList($data)->display();
                break;
        }
    }
}

?>