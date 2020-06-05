<?php


class Service
{
    private $name;
    private $code;

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
     * get all service table
     * @return array
     */
    public function getAllService(): array
    {
        $conn = new db();
        $conn = $conn->connexion();
        $req = $conn->prepare("SELECT * FROM service");
        $req->execute();
        return $req->fetchAll();
    }

    /**
     * Save the instance in bdd
     */
    public function save()
    {
        $conn = new db();
        $conn = $conn->connexion();
        $req = $conn->prepare("INSERT INTO service (libelle, COD) VALUES (:libelle, :COD)");
        $req->bindParam(':libelle', $this->name);
        $req->bindParam(':COD', $this->code);
        $req->execute();
    }
}
