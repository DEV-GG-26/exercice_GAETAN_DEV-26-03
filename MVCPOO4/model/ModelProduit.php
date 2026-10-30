<?php

class ModelVendeur{
    //ATTRIBUT
    private int $idProduit;
    private string $nomProduit;
    private PDO $pdo;

    //CONSTRUCTEUR
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getIdProduit(): int {
        return $this->idProduit;
    }

    public function setIdProduit(int $idProduit): self {
        $this->idProduit = $idProduit;
        return $this;
    }

    public function getNomProduit(): string {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self {
        $this->nomProduit = $nomProduit;
        return $this;
    }

    public function getPdo(): PDO {
        return $this->pdo;
    }

    public function setPdo(PDO $pdo): self {
        $this->pdo = $pdo;
        return $this;
    }

    //METHODS
    public function findAll(){
        try{
            $request = $this->pdo->prepare("SELECT p.id_produit, p.nom_produit FROM produit p");
            $request->execute();
            return $request->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $error){
            return $error->getMessage();
        }
    }
    /*

    public function addVendeur(){
        try{
            $request = $this->pdo->prepare("INSERT INTO produit (nom_produit) VALUES (?)");

            $request->bindParam(1,$this->nomProduit,PDO::PARAM_STR);
            $request->execute();
            return ['code'=>200, "message"=>"$nom a été enregistré avec succès"];

        }catch(Exception $error){
            return $error->getMessage();
        }
    }*/

}