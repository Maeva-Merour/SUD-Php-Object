<?php

// Chaque objet a unnom qui commence par une majuscule
// class permet de déclarer un objet
// une variable peut êre protégée, publique ou privée - une fonction déclarée également

// Un objet s'écrit dans cet ordre:
// variable
// getter puis setter
// fonction supplémenaires

// public scope accessible depuis partout
// protected scope accessible class et class enfant
// private scope accessible que dans cette classe


class Voiture
{
    public $marque;
    public $modele;
    public $couleur;
    private $immatriculation;

    // get permet d'obtenir et set de définir
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

    public function demarrer()
    {
        // En PHP, le mot-clé void est utilisé pour indiquer qu'une fonction ne retourne pas de valeur. void est un type de retour.

        // pour récupérer les variables en dehors de ma classe dans l'objet je fais $this qui fait référence à l'objet lui-même
        echo "La voiture " . $this->marque . " " . $this->modele . " démarre.";
    }
}

// j'implémente une nouvelle instance. une instance d’un objet est un exemplaire concret d’une classe.
// Classe vs Objet
// Une classe, c’est comme un plan ou un modèle (par exemple, un plan de voiture).
// Une instance, ou objet, c’est une chose réelle créée à partir de ce plan (par exemple, une vraie voiture basée sur le plan).

$maVoiture = new Voiture();
$maVoiture->marque = "Lotus";
$maVoiture->modele = "Elise";
$maVoiture->demarrer();
