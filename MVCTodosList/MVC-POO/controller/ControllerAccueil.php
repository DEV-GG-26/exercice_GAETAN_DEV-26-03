<?php
require_once '../model/ModelInscription.php';
require_once '../model/ModelUtilisateur.php';
require_once '../view/ViewAccueil.php';

class ControllerAccueil{
    //ATTRIBUT
    private ModelUtilisateur $modelUtilisateur;
    private ModelInscription $modelInscription;
    private ViewAccueil $viewAccueil;

    //CONSTRUCTEUR
    public function __construct(ModelUtilisateur $modelUtilisateur, ModelInscription $modelInscription, ViewAccueil $viewAccueil){
        $this->modelUtilisateur = $modelUtilisateur;
        $this->modelInscription = $modelInscription;
        $this->viewAccueil = $viewAccueil;
    }

//GETTER ET SETTER
    /**
     * Get the value of modelUtilisateur
     *
     * @return ModelUtilisateur
     */
    public function getModelUtilisateur(): ModelUtilisateur {
        return $this->modelUtilisateur;
    }

    /**
     * Set the value of modelUtilisateur
     *
     * @param ModelUtilisateur $modelUtilisateur
     *
     * @return self
     */
    public function setModelUtilisateur(ModelUtilisateur $modelUtilisateur): self {
        $this->modelUtilisateur = $modelUtilisateur;
        return $this;
    }

    /**
     * Get the value of modelInscription
     *
     * @return ModelInscription
     */
    public function getModelInscription(): ModelInscription {
        return $this->modelInscription;
    }

    /**
     * Set the value of modelInscription
     *
     * @param ModelInscription $modelInscription
     *
     * @return self
     */
    public function setModelInscription(ModelInscription $modelInscription): self {
        $this->modelInscription = $modelInscription;
        return $this;
    }

    /**
     * Get the value of viewAccueil
     *
     * @return ViewAccueil
     */
    public function getViewAccueil(): ViewAccueil {
        return $this->viewAccueil;
    }

    /**
     * Set the value of viewAccueil
     *
     * @param ViewAccueil $viewAccueil
     *
     * @return self
     */
    public function setViewAccueil(ViewAccueil $viewAccueil): self {
        $this->viewAccueil = $viewAccueil;
        return $this;
    }
    //  METHOD
public function render(): void{
        $data = $this->modelUtilisateur->findAll();

        //2. Vérifier les data pour savoir si je reçois un tableau de donnée ou un message d'erreur
        switch(gettype($data)){
            case "string" :
                //Cas où on reçoit un message d'erreur
                $this->viewAccueil->setMessage($data);
                $this->viewAccueil->display();
                break;
            case "array" :
                //Cas où on reçoit nos données
                $this->viewAccueil->setUserList($data);
                $this->viewAccueil->display();
                break;
        }
    }
}
?>
