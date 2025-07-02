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
        echo $this->nom . " travaille. <br>";
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

        public function afficherInfos()
    {
        echo "Gagne " . $this->salaire . " &euro;. <br>";
    }
}

class Manager extends Employe
// via extends, class Manager est une classe qui hérite de la classe Employe.
//elle hérite automatiquement de toutes les propriétés et méthodes publiques ou protégées de la classe Employe.
// Donc, un objet de type Manager pourra utiliser la méthode travailler() et accéder à $nom.
// Combines le comportement de la classe de base et celui du manager.
{
    private array $manage = [];

    public function afficherRole()
    {
        // :: signifie hériter de - Cela appelle la méthode afficherRole() de la classe Employe, donc ça va exécuter echo $this->nom . " travaille";.
        parent::afficherRole();
        echo "Je suis un manager. <br>";
    }

    public function ajouterEquipier(Employe $equipier)
    {
        $this->manage[] = $equipier;
    }
    public function afficherEquipe()
    {
        echo $this->nom . " manage " . count($this->manage) . " employés.";
    }
}

final class Directeur extends Manager
// final permet de faire de directeur la dernière classe d'héritage (impossible d'en créer une au-dessus - c'est le dernier maillon de notre chaîne)
{
    private array $supervision = [];

    public function ajouterManager(Manager $manager)
    {
        $this->supervision[] = $manager;
    }

    public function afficherInfos()
    {
        echo $this->nom. " supervise " . count($this->supervision) . " managers.";
    }
}

$employeOne = new Employe("Paul", 1600);
$employeOne->travailler();
$employeOne->afficherRole();
$employeOne->afficherInfos();

$employeTwo = new Employe("Gaïa", 1590);
$employeTwo->travailler();
$employeTwo->afficherInfos();
$employeTwo->afficherRole();

$employeThree = new Employe("Léa", 1400);
$employeThree->travailler();
$employeThree->afficherInfos();
$employeThree->afficherRole();

$managerOne = new Manager("Jean", 2100);
$managerOne->travailler();
$managerOne->afficherRole();
$managerOne->ajouterEquipier($employeOne);
$managerOne->ajouterEquipier($employeTwo);
$managerOne->ajouterEquipier($employeThree);
$managerOne->afficherEquipe();

$directorOne = new Directeur("Big Boss", 50000);
$directorOne->ajouterManager($managerOne);
$directorOne->afficherInfos();
