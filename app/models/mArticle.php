<?php



class Article
{

    private $name;
    private $price;
    private $fournisseur;
    private $stock;

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
    public function getAllArticle(): array
    {
        $conn = new db();
        $conn = $conn->connexion();
        $req = $conn->prepare("SELECT * FROM article");
        $req->execute();
        return $req->fetchAll();
    }

    /**
     * gat all service by id
     * @param $id_article
     * @return array
     */
    public function getArticleById($id_article): array {
        $conn = new db();
        $conn = $conn->connexion();
        $req = $conn->prepare("SELECT * FROM article WHERE id = ".$id_article);
        $req->execute();
        return $req->fetchAll();
    }

    /**
     * update quantity by a specifique ID
     * @param $quantity
     */
    public function updateQuantityById($quantity, $id){
        $conn = new db();
        $conn = $conn->connexion();
        $actualStock = $this->getArticleById($id);
        $newStock = $actualStock[0]["stock"] + $quantity;
        $req = $conn->prepare("UPDATE article SET stock = " . $newStock . " WHERE id = ". $id);
        $req->execute();
    }

    /**
     * Save the instance in bdd
     */
    public function save()
    {
        $conn = new db();
        $conn = $conn->connexion();
        $req = $conn->prepare("INSERT INTO article (nom, prix_unit, id_fournisseur, stock) VALUES (:nom, :prix_unit, :id_fournisseur, :stock)");
        $req->bindParam(':nom', $this->name);
        $req->bindParam(':prix_unit', $this->price);
        $req->bindParam(':id_fournisseur', $this->fournisseur);
        $req->bindParam(':stock', $this->stock);
        $req->execute();
    }
}
