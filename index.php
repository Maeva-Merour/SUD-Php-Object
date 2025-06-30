<?php
// Objet compte bancaire

class CompteBancaire
{

    // PROPRIETES
    // on peut typer les propriétés
    private string $numeroCompte;
    private string $typeCompte;
    private string $titulaireCompte;
    private float $solde;

    // METHODES

    // Mets une méthode en public si elle doit être appelée de l’extérieur.
    // Mets-la en private si elle est strictement interne à la classe.
    // Mets-la en protected si elle doit être utilisée ou modifiée dans les classes filles mais pas visible de l'extérieur.

    // Numéro de compte
    // On peut aussi typer une fonction en amont (ex: string)
    public function getNumeroCompte(): string
    {
        return $this->numeroCompte;
    }

    public function setNumeroCompte($numeroCompte)
    {
        // REGEX IBAN International
        if (preg_match('/^(?:((?:IT|SM)\d{2}\s?[A-Z]{1}\d{3}\s?(\d{4}\s?){4}\d{3})|(NL\d{2}\s?[A-Z]{4}\s?(\d{4}\s?){2}\d{2})|(LV\d{2}\s?[A-Z]{4}\s?(\d{4}\s?){3}\d{1})|((?:BG|GB|IE)\d{2}\s?[A-Z]{4}\s?(\d{4}\s?){3}\d{2})|(GI\d{2}\s?[A-Z]{4}\s?(\d{4}\s?){3}\d{3})|(RO\d{2}\s?[A-Z]{4}\s?(\d{4}\s?){4})|(MT\d{2}\s?[A-Z]{4}\s?(\d{4}\s?){5}\d{3})|(NO\d{2}\s?(\d{4}\s?){2}\d{3})|((?:DK|FI|FO)\d{2}\s?(\d{4}\s?){3}\d{2})|((?:SI)\d{2}\s?(\d{4}\s?){3}\d{3})|((?:AT|EE|LU|LT)\d{2}\s?(\d{4}\s?){4})|((?:HR|LI|CH)\d{2}\s?(\d{4}\s?){4}\d)|((?:DE)\d{2}\s?(\d{4}\s?){4}\d{2})|((?:CZ|ES|SK|SE)\d{2}\s?(\d{4}\s?){5})|(PT\d{2}\s?(\d{4}\s?){5}\d)|((?:IS)\d{24})|((?:BE)\d{2}\s?(\d{4}\s?){3})|((?:FR|MC|GR)\d{2}\s?([0-9A-Z]{4}\s?){5}\d{3})|((?:PL|HU|CY)\d{2}\s?(\d{4}\s?){6}))$/', strtoupper($numeroCompte))) {
            $this->numeroCompte = strtoupper($numeroCompte);
        } else {
            throw new Exception(" Format de compte invalide.");
        }
    }

    // Type de compte
    public function getTypeCompte()
    {
        return $this->typeCompte;
    }

    public function setTypeCompte($typeCompte)
    {
        $typesValides = ["Epargne", "Courant"];

        if (in_array($typeCompte, $typesValides)) {
            $this->typeCompte = $typeCompte;
        } else {
            throw new Exception("Type de compte invalide.");
        }
    }

    // Titulaire du compte
    public function getTitulaireCompte()
    {
        return $this->titulaireCompte;
    }

    public function setTitulaireCompte($titulaireCompte)
    {
        $this->titulaireCompte = $titulaireCompte;
    }

    // Solde du compte
    public function getSolde()
    {
        return $this->solde;
    }

    public function setSolde($solde)
    {
        $this->solde = $solde;
    }

    public function display()
    {
        echo "Votre compte bancaire <br>" . "Numéro IBAN :" . $this->getNumeroCompte() . "<br>" . "Type :" . $this->getTypeCompte() . "<br>" . "Propriétaire :" . $this->getTitulaireCompte() . "<br>" . "Solde :" . $this->getSolde() .  " &euro;<br>";
    }
}

// METHODE SETTER
try {
    $monCompte = new CompteBancaire();
    $monCompte->setNumeroCompte("FR14 2004 1010 0505 0001 3M02 606");
    $monCompte->setTypeCompte("Epargne");
    $monCompte->setTitulaireCompte("Mme MEROUR Maéva");
    $monCompte->setSolde(-800);
    $monCompte->display();
} catch (Exception $e) {
    echo "Erreur :" . $e->getMessage();
};


// METHODE GETTER
try {
    echo "<br>Votre compte bancaire <br>" . "Numéro IBAN :" . $monCompte->getNumeroCompte() . "<br>" . "Type :" . $monCompte->getTypeCompte() . " <br>" . "Propriétaire :" . $monCompte->getTitulaireCompte() . " <br>" . "Solde :" . $monCompte->getSolde() . " &euro;<br>";
} catch (Exception $e) {
    echo "Erreur :" . $e->getMessage();
};
