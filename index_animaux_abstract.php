<?php

abstract class Animal
{
    public string $nom;
    public string $espece;
    public string $race;


    public function __construct($nom, $espece, $race)
    {
        $this->nom = $nom;
        $this->espece = $espece;
        $this->race = $race;
    }

    abstract public function crier();

    abstract public function courir();

    abstract public function dormir();

    public function presenter()
    {
        echo "Je suis un " . $this->espece . " de la race " . $this->race . ". <br>";
    }
}

class Chien extends Animal
{
    public function crier()
    {
        echo "Le " . $this->espece . " " . $this->nom . " aboie. <br>";
    }

    public function dormir()
    {
        echo "Le " . $this->espece . " " . $this->nom . " dort. <br>";
    }
    public function courir()
    {
        echo "Le " . $this->espece . " " . $this->nom . " court. <br>";
    }
}

class Cheval extends Animal
{
    public function crier()
    {
        echo "Le " . $this->espece . " " . $this->nom . " hennit. <br>";
    }
    public function dormir()
    {
        echo "Le " . $this->espece . " " . $this->nom . " dort. <br>";
    }
    public function courir()
    {
        echo "Le " . $this->espece . " " . $this->nom . " galope. <br>";
    }
}

$philae = new Chien("Philae", "chien", "galgo");
$philae->presenter();
$philae->crier();
$philae->dormir();

$spirit = new Cheval("Spirit", "cheval", "mustang");
$spirit->presenter();
$spirit->crier();
$spirit->courir();
