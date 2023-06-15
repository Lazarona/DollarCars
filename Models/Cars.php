<?php

namespace Models;

include_once __DIR__ . "\DollarCars\Accueil\indexHome.php";

use PDO;

class Car

{
    protected int $id;
    protected string $typeVoiture;
    protected string $marque;
    protected int $puissance;
    protected int $annee;
    protected string $description;
    protected float $prix;


    public function __construct(
        $id,
        $typeVoiture,
        $marque,
        $puissance,
        $annee,
        $description,
        $prix
    ) {

        $this->id = $id;
        $this->setTypeVoiture($typeVoiture);
        $this->setMarque($marque);
        $this->setPuissance($puissance);
        $this->setAnnee($annee);
        $this->setDescritpion($description);
        $this->setPrix($prix);
    }



    public function getId()
    {
        return $this->id;
    }


    public function getTypeVoiture()
    {
        return $this->typeVoiture;
    }
    public function setTypeVoiture($typeVoiture)
    {
        $this->typeVoiture = $typeVoiture;
    }



    public function getmarque()
    {
        return $this->marque;
    }
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }



    public function getPuissance()
    {
        return $this->puissance;
    }

    public function setPuissance($puissance)
    {
        $this->id = $puissance;
    }



    public function getAnnee()
    {
        return $this->annee;
    }
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    }



    public function getDescription()
    {
        return $this->description;
    }
    public function setDescritpion($description)
    {
        $this->description = $description;
    }



    public function getPrix()
    {
        return $this->prix;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }


    public function showAll()
    {
        echo "<p>" . $this->getPrix() . "</p>";
        echo "<p>" . $this->getTypeVoiture() . "</p>";
        echo "<p>" . $this->getMarque() . "</p>";
        echo "<p>" . $this->getPuissance() . "</p>";
        echo "<p>" . $this->getAnnee() . "</p>";
        echo "<p>" . $this->getDescription() . "</p>";
        echo "<p>" . $this->getPrix() . "</p>";
    }
}
