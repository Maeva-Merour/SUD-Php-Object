<?php

class Livre
{

    private $titre;
    public static $nbLivres;
    // partagé par toutes les instances (objets) de Livre

    public function __construct($titre)
    {
        //  incrémente le compteur nbLivres
        self::$nbLivres++;

        $this->setTitre($titre);
    }
    public function getTitre(): string
    {
        return $this->titre;
    }
    public function setTitre(string $nouveauTitre)
    {
        if (!empty($nouveauTitre)) {
            $this->titre = $nouveauTitre;
        }
    }

    public function afficherTitre()
    {
        echo "Le titre du livre est : <br>" . $this->titre;
    }

    public static function afficherCompteur()
    // Méthode statique (appelée sans objet), qui affiche combien de livres ont été créés.
    {
        echo "Nombre total de livres : " . self::$nbLivres . "<br>";
    }
}

$livre1 = new Livre("The Best Seller <br>");
// $livre1->titre = "Mon livre";
$livre1->afficherTitre();

$livre1->setTitre("La saga continue");
echo $livre1->getTitre();

Livre::afficherCompteur();
// Affiche le nombre total de livres créés

