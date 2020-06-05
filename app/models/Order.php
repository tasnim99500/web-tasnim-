<?php


class Order
{
    private $id_article;
    private $quantity;
    private $prix;

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
    public function getAllOrder() : array {
        $conn = new db();
        $conn = $conn->connexion();
        $req = $conn->prepare("SELECT * FROM commande");
        $req->execute();
        return $req->fetchAll();
    }

    /**
     * Save the instance in bdd
     */
    public function save(){
        $conn = new db();
        $conn = $conn->connexion();
        $req = $conn->prepare("INSERT INTO commande (id_article, quantite, prix, date_commande) VALUES (:id_article, :quantite, :prix, now())");
        $req->bindParam(':id_article', $this->id_article);
        $req->bindParam(':quantite', $this->quantity);
        $req->bindParam(':prix', $this->prix);
        $req->execute();
    }
}
