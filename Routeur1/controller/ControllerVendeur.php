<?php
//Importer les ressources
include_once '../model/ModelVendeur.php';
include_once '../view/ViewVendeur.php';

//Class Controller
class ControllerVendeur{
    //ATTRIBUT
    private ModelVendeur $model;
    private ViewVendeur $view;

    //CONSTRUCTEUR
    public function __construct(ModelVendeur $newModel, ViewVendeur $newView){
        $this->model = $newModel;
        $this->view = $newView;
    }

    //GETTER ET SETTER
    /**
     * Get the value of model
     *
     * @return ModelVendeur
     */
    public function getModel(): ModelVendeur {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @param ModelVendeur $model
     *
     * @return self
     */
    public function setModel(ModelVendeur $model): self {
        $this->model = $model;
        return $this;
    }

    /**
     * Get the value of view
     *
     * @return ViewVendeur
     */
    public function getView(): ViewVendeur {
        return $this->view;
    }

    /**
     * Set the value of view
     *
     * @param ViewVendeur $view
     *
     * @return self
     */
    public function setView(ViewVendeur $view): self {
        $this->view = $view;
        return $this;
    }

    //METHODS
    //Lancer le rendu de la page
    function render():{
        //1. Je demande au model de me fournir les données
        $dataVendeur = $this->getModel()->findAll();

        //2. Je passe les données à afficher à la View, puis je demande de faire l'affichage
        $this->getView()->setDataVendeur($dataVendeur)->display();
    }
}


//Exécution
//Création du Model
$model = new ModelVendeur(new PDO('mysql:host=localhost;dbname=ticket','root','root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]));

//Création de la View
$view = new ViewVendeur();

//Création du Controller
$controller = new ControllerVendeur($model, $view);

//Lancement du Rendu de la page à partir du model et de la view
$controller->render();

?>