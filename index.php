<?php

// Chaque objet a unnom qui commence par une majuscule
// class permet de déclarer un objet
// une variable peut êre protégée, publique ou privée - une fonction déclarée également
class Voiture {
    public $marque;
    public $modele;

    public function demarrer(){
        // pour récupérer les variables en dehors de ma classe dans l'objet je fais $this qui fait référence à l'objet lui-même
        echo "La voiture ". $this->marque ." ". $this->modele . " démarre.";
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

