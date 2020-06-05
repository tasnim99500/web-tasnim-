<?php


class db
{
    private $bdd;
    private $servname = 'localhost';
    private $dbname = 'tp4';
    private $user = 'root';
    private $pass = '';

    public function __construct() {
        try
        {
            $this->bdd = new PDO('mysql:host='.$this->servname.';dbname='.$this->dbname, $this->user, $this->pass);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            die('<h3>Erreur !</h3>');
        }
    }

    public function connexion() {
        return $this->bdd;
    }
}
