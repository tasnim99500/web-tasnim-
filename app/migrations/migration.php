<?php
/**
 *
 * for run migration(on terminal) -> php app/migrations/migrations.php
 *
 */
$servname = 'localhost';
$dbname = 'tp4';
$user = 'root';
$pass = '';

try{
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql[0] = "CREATE TABLE article(
                        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        nom VARCHAR(30) NOT NULL,
                        prix_unit FLOAT NOT NULL,
                        id_fournisseur INT(255) NOT NULL,
                        stock INT(255) NOT NULL)";

    $sql[1] = "CREATE TABLE fournisseur(
                        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        nom VARCHAR(30) NOT NULL,
                        tel VARCHAR(30) NOT NULL,
                        adresse VARCHAR(70) NOT NULL)";

    $sql[2] = "CREATE TABLE service(
                        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        libelle VARCHAR(30) NOT NULL,
                        COD VARCHAR(30) NOT NULL)";

    $sql[3] = "CREATE TABLE commande(
                        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        id_article INT(255) NOT NULL,
                        quantite INT(255) NOT NULL,
                        prix FLOAT NOT NULL,
                        date_commande TIMESTAMP)";

    $sql[4] = "CREATE TABLE historique_gestion(
                        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        id_article INT(255) NOT NULL,
                        COD_service VARCHAR(30) NOT NULL,
                        quantite_enleve INT(255) NOT NULL,
                        date_ TIMESTAMP)";


    for ($i=0;$i<sizeof($sql);$i++)
    {
        $dbco->exec($sql[$i]);
    }
        echo "Table bien créée !";
}

catch(PDOException $e){
    echo "Erreur : " . $e->getMessage(). "</p>";
}
?>
