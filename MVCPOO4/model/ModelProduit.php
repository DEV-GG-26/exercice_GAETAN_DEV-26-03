<?php

class ModelProduit{
    //ATTRIBUT
    private int $idProduit;
    private string $nomProduit;
    private int $idCategorie;
    private string $nomCategorie;
    private PDO $pdo;

    //CONSTRUCTEUR
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    //GETTER
    
    public function getIdProduit(): int {
        return $this->idProduit;
    }
    
    public function getNomProduit(): string {
        return $this->nomProduit;
    }
    
    public function getIdCategorie(): int {
        return $this->idProduit;
    }
    
    public function getNomCategorie(): string {
        return $this->nomProduit;
    }

        public function getPdo(): PDO {
        return $this->pdo;
    }

 //SETTER

    public function setIdProduit(int $idProduit): self {
        $this->idProduit = $idProduit;
        return $this;
    }

    public function setNomProduit(string $nomProduit): self {
        $this->nomProduit = $nomProduit;
        return $this;
    }

    public function setIdCategorie(int $idProduit): self {
        $this->idProduit = $idProduit;
        return $this;
    }

    public function setNomCategorie(string $nomProduit): self {
        $this->nomProduit = $nomProduit;
        return $this;
    }

    public function setPdo(PDO $pdo): self {
        $this->pdo = $pdo;
        return $this;
    }

    //METHODS
    public function findAll(){
        try{
            $request = $this->pdo->prepare("SELECT p.nom_produit, c.nom_categorie FROM produit p INNER JOIN categorie c ON p.id_categorie = c.id_categorie;");
            $request->execute();
            return $request->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    public function addProduit(){
        try{
            $request = $this->pdo->prepare("INSERT INTO produit (nom_produit), categorie (nom_categorie VALUES (?,?)");

            $request->bindParam(1,$this->nomProduit,PDO::PARAM_STR);
            $request->bindParam(2,$this->nomCategorie,PDO::PARAM_STR);
            $request->execute();
            return ['code'=>200, "message"=>"$nomProduit.$nomCategorie a été enregistré avec succès"];

        }catch(Exception $error){
            return $error->getMessage();
        }
    }

}