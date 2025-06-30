<?php

// Chaque objet a un nom qui commence par une majuscule
// class permet de déclarer un objet
// une variable peut êre protégée, publique ou privée - une fonction déclarée également

// Un objet s'écrit dans cet ordre:
// variable
// getter puis setter
// fonction supplémenaires

// public scope accessible depuis partout
// protected scope accessible class et class enfant - Tu veux encapsuler les données (bonne pratique).
// private scope accessible que dans cette classe. En privé on va privilégier getter et setter car on ne peut plus utiliser directement les variables.


class Voiture
{
    // public $marque;
    // public $modele;
    // public $couleur;

    private $marque;
    private $modele;
    private $couleur;
    private $immatriculation;

    // les "méthodes" sont les fonctions que l'on range dans un objet
    // get permet d'obtenir et set de définir
    // Un setter est une méthode utilisée pour modifier la valeur d’une propriété privée d’un objet. 
    // Un getter est une méthode utilisée pour récupérer la valeur d’une propriété privée d’un objet. 
    public function getMarque()
    {
        return $this->marque;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    public function getModele()
    {
        return $this->modele;
    }

    public function setModele($modele)
    {
        $this->modele = $modele;
    }

    public function getColor()
    {
        return $this->couleur;
    }

    public function setColor($couleur)
    {
        $this->couleur = $couleur;
    }

    public function getImmat()
    {
        return $this->immatriculation;
    }

    public function setImmat($immatriculation)
    {
        // vérifier le format d'immat

        // strtoupper — Renvoie une chaîne en majuscules
        // preg_match — Effectue une recherche de correspondance avec une expression rationnelle standard

        // on fait un regex AVEC tiret
        if (preg_match('/^[A-Z]{2}-\d{3}-[A-Z]{2}$/', strtoupper($immatriculation))) {

            $this->immatriculation = strtoupper($immatriculation);
        // on fait un regex SANS tiret
                } else if ((preg_match('/^[A-Z]{2}\d{3}[A-Z]{2}$/', strtoupper($immatriculation)))) {

            // on divise la plaque française en 3 parties
            $partOne = substr($immatriculation, 0, 2);
            $partTwo = substr($immatriculation, 2, 3);
            $partThree = substr($immatriculation, 5, 2);
            $this->immatriculation = strtoupper($partOne."-".$partTwo."-".$partThree);

        } else {
            throw new Exception(" Format d'immatriculation invalide.");
        }
        // Au lieu d’afficher un message avec echo, on utilise throw new Exception() pour :
        // Stopper l'exécution du programme à cet endroit.
        // Indiquer qu’un problème est survenu (ici, le format de la plaque est mauvais).
        // Permettre au programme de gérer l’erreur avec un bloc try...catch.
    }

    public function demarrer()
    {
        // En PHP, le mot-clé void est utilisé pour indiquer qu'une fonction ne retourne pas de valeur. void est un type de retour.

        // pour récupérer les variables en dehors de ma classe dans l'objet je fais $this qui fait référence à l'objet lui-même
        // La raison pour laquelle on utilise $this->marque au lieu de simplement $marque dans une méthode de la classe, 
        // c'est parce que $this fait référence à l'instance actuelle de l'objet dans lequel la méthode est exécutée.
        // Tu utilises $this-> pour dire à PHP que tu veux manipuler une propriété de l'objet, pas une variable locale.
        echo "La voiture " . $this->marque . " " . $this->modele . " de couleur " . $this->couleur .  " démarre.\n";
    }
}

// j'implémente une nouvelle instance. une instance d’un objet est un exemplaire concret d’une classe.
// la variable est une propriété
// Classe vs Objet
// Une classe, c’est comme un plan ou un modèle (par exemple, un plan de voiture).
// Une instance, ou objet, c’est une chose réelle créée à partir de ce plan (par exemple, une vraie voiture basée sur le plan).

// on créé une nouvelle version/instance de l'objet avec new et on apelle DIRECTEMENT les propriétés. En private, ces données auront des variables indéfinies
// $maVoiture = new Voiture();
// $maVoiture->marque = "Lotus";
// $maVoiture->modele = "Elise";
// $maVoiture->couleur = "gris carbon";
// $maVoiture->demarrer();

// try {
//     // Methode setter
//     $secondCar = new Voiture();
//     $secondCar->setMarque("Audi");
//     $secondCar->setModele("E-Tron GT");
//     $secondCar->setColor("noire");
//     $secondCar->demarrer();

//     //Méthode getter
//     echo "La voiture " . $secondCar->getMarque() . " " . $secondCar->getModele() . " démarre.";
// } catch (Exception $e) {
//     echo "Erreur :" . $e->getMessage();
// };

try {
    // Methode setter
    $secondCar = new Voiture();
    $secondCar->setMarque("Audi");
    $secondCar->setModele("E-Tron GT");
    $secondCar->setColor("noire");
    $secondCar->setImmat("eg116hn");
    $secondCar->demarrer();

    //Méthode getter
    echo "La voiture " . $secondCar->getMarque() . " " . $secondCar->getModele() . " immatriculée " . $secondCar->getImmat() . " démarre.";
} catch (Exception $e) {
    echo "Erreur :" . $e->getMessage();
};