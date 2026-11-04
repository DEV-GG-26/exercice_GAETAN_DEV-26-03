<?php
//MODEL : class ModelProduit
class ModelVendeur{
    //ATTRIBUT
    private int $idVendeur;
    private string $nomVendeur;
    private string $prenomVendeur;
    private string $emailVendeur;
    private PDO $pdo;

    //CONSTRCUTEUR
    public function __construct(PDO $newPDO){
        $this->pdo = $newPDO;
    }

    //GETTER ET SETTER
    /**
     * Get the value of idVendeur
     *
     * @return int
     */
    public function getIdVendeur(): int {
        return $this->idVendeur;
    }

    /**
     * Set the value of idVendeur
     *
     * @param int $idVendeur
     *
     * @return self
     */
    public function setIdVendeur(int $idVendeur): self {
        $this->idVendeur = $idVendeur;
        return $this;
    }

    /**
     * Get the value of nomVendeur
     *
     * @return string
     */
    public function getNomVendeur(): string {
        return $this->nomVendeur;
    }

    /**
     * Set the value of nomVendeur
     *
     * @param string $nomVendeur
     *
     * @return self
     */
    public function setNomVendeur(string $nomVendeur): self {
        $this->nomVendeur = $nomVendeur;
        return $this;
    }

    /**
     * Get the value of prenomVendeur
     *
     * @return string
     */
    public function getPrenomVendeur(): string {
        return $this->prenomVendeur;
    }

    /**
     * Set the value of prenomVendeur
     *
     * @param string $prenomVendeur
     *
     * @return self
     */
    public function setPrenomVendeur(string $prenomVendeur): self {
        $this->prenomVendeur = $prenomVendeur;
        return $this;
    }

    /**
     * Get the value of emailVendeur
     *
     * @return string
     */
    public function getEmailVendeur(): string {
        return $this->emailVendeur;
    }

    /**
     * Set the value of emailVendeur
     *
     * @param string $emailVendeur
     *
     * @return self
     */
    public function setEmailVendeur(string $emailVendeur): self {
        $this->emailVendeur = $emailVendeur;
        return $this;
    }

    /**
     * Get the value of pdo
     *
     * @return PDO
     */
    public function getPdo(): PDO {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @param PDO $pdo
     *
     * @return self
     */
    public function setPdo(PDO $pdo): self {
        $this->pdo = $pdo;
        return $this;
    }
    

    //METHODS 
    function findAll(){
        try{
            //1) Préparer la requête SELECT pour récupérer le nom des produits et leur catégorie
            $requestVendeur = $this->getPdo()->prepare('SELECT v.id_vendeur, v.nom_vendeur, v.prenom_vendeur, v.email_vendeur FROM vendeur v ');

            //3) Envoyer la requête à la BDD
            $requestVendeur->execute();

            //4) Récupérer la réponse de la BDD
            // PDO::FETCH_ASSOC : permet de récupérer la réponse uniquement sous forme de tableaux associatifs
            return $requestVendeur->fetchAll(PDO::FETCH_ASSOC);

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }   
}



