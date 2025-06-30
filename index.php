<?php

class Employe
{

    public string $nom;

    // seule la classe Employe et ses classes filles peuvent y accéder.
    protected int $salaire;

    // construct
    public function __construct($nom, $salaire)
    {
        $this->nom = $nom;
        $this->salaire = $salaire;
    }

    // Tu peux override une méthode si :
    // Elle est public ou protected
    // Et que tu es dans une classe enfant (extends)
    // C’est utile pour changer ou adapter le comportement d’une méthode dans une classe spécialisée (comme un Manager qui se comporte différemment d’un Employe).
    public function travailler()
    {
        echo $this->nom . " travaille";
    }
    public function afficherRole()

    // ovveride - Quand tu fais ça dans Manager : 

    // public function afficherRole(){
    // echo "Je suis un manager";
    //}

    // Tu écrases (remplaces) la version d’Employe, même si Employe avait déjà une méthode afficherRole().
    // Donc, quand tu appelles afficherRole() sur un objet de type Manager, PHP utilisera celle du Manager, pas celle de Employe.

    {
        echo "Je suis un employé. <br>";
    }
}

class Manager extends Employe
// via extends, class Manager est une classe qui hérite de la classe Employe.
//elle hérite automatiquement de toutes les propriétés et méthodes publiques ou protégées de la classe Employe.
// Donc, un objet de type Manager pourra utiliser la méthode travailler() et accéder à $nom.
// Combines le comportement de la classe de base et celui du manager.
{
    public function afficherRole()
    {
        // :: signifie hériter de - Cela appelle la méthode afficherRole() de la classe Employe, donc ça va exécuter echo $this->nom . " travaille";.
        parent::afficherRole();
        echo "Je suis un manager.";
    }
}

$managerOne = new Manager("Jean", 2100);
$managerOne->afficherRole();
