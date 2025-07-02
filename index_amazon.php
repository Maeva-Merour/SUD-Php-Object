<?php

abstract class Vehicule
{
    public $nom;
    public $autonomie;
    public $vitesse;

    public function __construct($nom, $autonomie, $vitesse)
    {
        $this->nom = $nom;
        $this->autonomie = $autonomie;
        $this->vitesse = $vitesse;
    }

    public function decrire()
    {
        echo "Le véhciule " . $this->nom, " a une autonomie de " . $this->autonomie . " et vole à " . $this->vitesse . " km/h. <br>";
    }

    abstract public function calculerTempsTrajet(int $tempsTrajet);
}

interface Connecte
{
    public function connecter();
    public function deconnecter();
    public function estConnecte();
}

interface Volant
{
    public function decoller();
    public function atterir();
    public function altitudeActuelle(int $altitude);
}

interface Livrable
{
    public function chargerMarchandise($produit, $quantite);
    public function livrer();
    public function estCharge();
    public function depot($temps);
}

interface Rechargeable
{
    public function niveauBatterie(int $charge);
    public function recharger();
}

// si j'implémente avec implements je DOIS implémenter l'ensemble des fonctions de l'inerface
class Drone extends Vehicule implements Connecte, Volant, Livrable, Rechargeable
{
    private int $altitude = 0;
    private bool $connecte = false;
    private bool $charge = false;
    private int $batterie = 80;

    public function calculerTempsTrajet($distance)
    {
        // $distance / $this->vitesse donne le temps en heure et *60 en min
        $temps = ($distance / $this->vitesse) * 60;
        // round(..., 2) permet d’avoir 2 décimales 
        return "Temps de trajet : " . round($temps, 2) . " min.<br>";
    }

    public function connecter()
    {
        $this->connecte = true;
        // echo $this->nom . " se connecte. <br>";
    }
    public function deconnecter()
    {
        $this->connecte = false;
        // echo $this->nom . " se déconnecte. <br>";
    }
    public function estConnecte()
    {
        return $this->connecte;
        // echo $this->nom . " est connecté. <br>";
    }
    public function decoller()
    {
        echo $this->nom . " décolle. <br>";
        // echo $this->altitude = 100;
    }
    public function atterir()
    {
        echo $this->nom . " est arrivé à destination et atterit. <br>";
        // echo $this->altitude = 0;
    }
    public function altitudeActuelle($altitude)
    {
        echo $this->nom . " est à " . $altitude . "m d'altitude. <br>";
        // return $this->altitude;
    }
    public function chargerMarchandise($produit, $quantite)
    {
        echo "Prise en charge de la marchandise : " . $produit . " - x" . $quantite . " <br>";
        $this->charge = true;
    }
    public function livrer()
    {
        if ($this->charge) {
            echo "Marchandise livrée contre signature. <br>";
            $this->charge = false;
        } else {
            echo "Drône vide. Rien à livrer. <br>";
        }
    }

    public function estCharge()
    {
        // echo "Marchandise chargée. <br>";
        return $this->charge;
    }

    public function depot($temps)
    {
        echo $this->nom . " rentre au dépôt. <br>";
        echo $this->calculerTempsTrajet($temps);
    }
    public function niveauBatterie($charge)
    {
        echo $this->nom . " est à " . $charge . "% de charge. <br>";

        if ($charge < 70) {
            echo "Veuillez mettre en charge l'appareil. <br>";
        } else {
            echo "L'appareil a une autonomie suffisante pour le trajet. <br>";
        }

        return $this->batterie;
    }
    public function recharger()
    {
        echo $this->nom . " se recharge. <br>";
        return $this->batterie = 100;
    }
}

$drone = new Drone("Amazon", "25 min", "80");
$drone->decrire();
// instanceof est un opérateur en PHP.
// Il permet de vérifier si un objet appartient à une certaine classe ou hérite de cette classe.
if($drone instanceof Connecte){
    // Si l’objet $drone est une instance de la classe Connecte ou d'une de ses classes filles, alors on exécute le bloc de code à l'intérieur des accolades.
    $drone->connecter();
    echo "Connecté : ". ($drone->estConnecte() ? "oui" :"non"). "<br>";
    // car $this->connecte = true dans la fonction connecter
}

if($drone instanceof Livrable){
    $drone->livrer();
    echo "Livré : " . ($drone->estCharge() ? "non" :"oui"). "<br>";
}

if($drone instanceof Rechargeable){
    $drone->recharger();
    $niveau = $drone->niveauBatterie(100);
    echo "Batterie : " . $niveau . " <br>";
}

// $drone->connecter();
// $drone->estConnecte();
// $drone->niveauBatterie(100);
// $drone->estCharge();
// $drone->decoller();
// $drone->altitudeActuelle(520);
// $drone->decrire();
// $drone->chargerMarchandise("crevetollas", 2);
// $drone->calculerTempsTrajet(10);
// $drone->atterir();
// $drone->livrer();
// $drone->decoller();
// $drone->altitudeActuelle(460);
// $drone->depot(15);
// $drone->atterir();
// $drone->niveauBatterie(60);
// $drone->recharger();
// $drone->deconnecter();
