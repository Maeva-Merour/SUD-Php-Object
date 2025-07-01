<?php

class Document{

    public function afficherType(){
        echo "Ceci est un document. <br>";
    }

}

class Livre extends Document{
    private $titre;

    public function __construct($titre)
    {
        $this->titre = $titre;
    }
    public function afficherTitre()
    {
        echo "Le titre du livre est : <br>" . $this->titre;
    }

}

$livre1 = new Livre("Roger Rabbit");
$livre1->afficherType();
$livre1->afficherTitre();