<?php


class Gestion
{
    private $id_article;
    private $id_service;
    private $quantity;

    public function __construct()
    {
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * get all fournisseur table
     * @return array
     */
    public function getAllGestion() : array {
        $conn = new db();
        $conn = $conn->connexion();
        $req = $conn->prepare("SELECT * FROM historique_gestion");
        $req->execute();
        return $req->fetchAll();
    }

    /**
     * Save the instance in bdd
     */
    public function save(){
        $conn = new db();
        $conn = $conn->connexion();
        $req = $conn->prepare("INSERT INTO historique_gestion (id_article, COD_service, quantite_enleve, date_) VALUES (:id_article, :COD_service, :quantite_enleve, now())");
        $req->bindParam(':id_article', $this->id_article);
        $req->bindParam(':COD_service', $this->id_service);
        $req->bindParam(':quantite_enleve', $this->quantity);
        $req->execute();
    }
}
