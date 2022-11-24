<?php



class Product extends CoreModel
{

    protected $example;

    /**
     * Récupérer tous les produits
     *
     * @return Array $result
     *
     */
    public function findAll()
    {
        // On se connecte à la BDD
        $pdo = Database::getPDO();

        // On fait notre requête SQL
        $sql = 'SELECT * FROM `product`';

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // On récupère les résultats
        // https://www.php.net/manual/fr/pdostatement.fetchall.php
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');

        // La fonction retourne les résultats
        return $result;
    }

    public function findById($id)
    {
        // On se connecte à la BDD
        $pdo = Database::getPDO();

        // On stocke la requête sous forme de string dans une variable
        $sql = "
        SELECT *
        FROM `product`
        WHERE id = $id";

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // On récupère le résultat (NB : l'id est unique, et donc un seul produit sera retourné par la requête)
        $result = $pdoStatement->fetch(PDO::FETCH_DEFAULT, 'Product');

        // On retourne le résultat
        return $result;
    }

    public function findByCategoryId($categoryId)
    {
        // Connexion à la BDD
        $pdo = Database::getPDO();

        // Requête SQL (en string pour plus tard)
        $sql = 'SELECT * from `product` WHERE category_id = ' . $categoryId;

        // On requête en BDD
        $pdoStatement = $pdo->query($sql);

        // On récupère tous les résultats
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');

        // On retourne les résultats
        return $results; 
    }


}