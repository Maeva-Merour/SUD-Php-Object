<?php

class Utilisateur
{
    private string $lastname;
    private string $firstname;
    private string $email;
    private bool $activated;

    // Les classes qui possèdent une méthode constructeur appellent cette méthode à chaque création d'une nouvelle instance de l'objet, ce qui est intéressant pour toutes les initialisations dont l'objet a besoin avant d'être utilisé.
    // Cette fonction spéciale est appelée automatiquement quand on crée un nouvel objet Utilisateur.
    // Elle reçoit 3 valeurs : nom, prénom et email.
    public function __construct($lastname, $firstname, $email)
    {
        // permet de filtrer le format d'email à minima
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email invalide !");
        }

        // $this->lastname = $lastname; veut dire : “le nom de cet utilisateur est égal à la valeur reçue”
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        // La ligne $this->activated = true; signifie que l’utilisateur est actif par défaut.
        $this->activated = true;

        // Informe l'état de la création de l'objet
        echo "Utilisateur créé avec l'email $email. <br>";
    }

    public function getInfos()
    {
        return "Utilisateur :" . $this->lastname . " " . $this->firstname;
    }

    public function __destruct()
    {
        echo "Destruction de l'utilisateur." . $this->lastname . " " . $this->firstname;
    }
}

try {
    $userOne = new Utilisateur("MEROUR", "Maéva", "contact@contact.fr");
    echo $userOne->getInfos()."<br>";

} catch (Exception $e) {
    echo "Erreur :" . $e->getMessage();
}
