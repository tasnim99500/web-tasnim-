<?php

class Fournisseur
{
    private $name;
    private $phone;
    private $address;

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
    public function getAllFournisseur() : array {
        $conn = new db();
        $conn = $conn->connexion();
        $req = $conn->prepare("SELECT * FROM fournisseur");
        $req->execute();
        return $req->fetchAll();
    }

    /**
     * Save the instance in bdd
     */
    public function save(){
        $conn = new db();
        $conn = $conn->connexion();
        $req = $conn->prepare("INSERT INTO fournisseur (nom, tel, adresse) VALUES (:nom, :tel, :adresse)");
        $req->bindParam(':nom', $this->name);
        $req->bindParam(':tel', $this->phone);
        $req->bindParam(':adresse', $this->address);
        $req->execute();
    }
}
