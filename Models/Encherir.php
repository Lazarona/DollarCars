<?php

namespace Models;

include_once __DIR__ . "/../models/Database.php";

use Models\Database;
use PDO;

class Encherir
{
    protected int $id;
    protected int $userId;
    protected int $annonceId;
    protected float $enchere;
    protected string $date_enchere;
    protected $dbh;

    public function __construct($id, $userId, $annonceId, $enchere, $date_enchere, $dbh)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->annonceId = $annonceId;
        $this->enchere = $enchere;
        $this->date_enchere = $date_enchere;
        $this->dbh = $dbh;
    }

    public function __get($property)
    {
        if ($property !== "dbh") {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if ($property !== "dbh") {
            $this->$property = $value;
        }
    }

    public function insert()
    {
        $dbh = Database::createDBConnection();
        $query = $this->dbh->prepare("INSERT INTO encherir (userId, annonceId, enchere, date_enchere) VALUES (?,?,?,?)");
        return $query->execute([$this->userId, $this->annonceId, $this->enchere, $this->date_enchere]);
    }

    public static function fetchArticles($dbh)
    {
        $query = $dbh->prepare("SELECT * FROM encherir");
        $query->execute();

        $auctions = [];

        if (is_a($query, "PDOStatement")) {
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $result) {
                array_push($encheres, new Encherir($result['id'], $result['userId'], $result['annonceId'], $result["enchere"], $result["date_enchere"], $dbh));
            }
        }

        return $encheres;
    }

    // public function displayAuction()
    // {
    //     echo "<p> Author : " . $this->author . "</p>";
    //     echo "<p> Résumé : " . $this->description . "</p>";
    // }
}