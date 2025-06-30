<?php
// Objet compte bancaire

class CompteBancaire
{

    // PROPRIETES
    // on peut typer les propriétés
    private string $numeroCompte;
    private string $typeCompte;
    private string $titulaireCompte;
    private float $solde = -1000;
    // il faut initialiser le solde pour le crédit et le débit

    // METHODES

    // Mets une méthode en public si elle doit être appelée de l’extérieur.
    // Mets-la en private si elle est strictement interne à la classe.
    // Mets-la en protected si elle doit être utilisée ou modifiée dans les classes filles mais pas visible de l'extérieur.

    // Numéro de compte
    // On peut aussi typer une fonction en amont (ex: string)
    public function getNumeroCompte(): string
    // str_repeat génère autant d’astérisques que nécessaire.
    // strlen calcule combien de caractères doivent être masqués.
    // substr extrait les 4 derniers caractères du numéro de compte.
    {
        return str_repeat("*", strlen($this->numeroCompte) - 4) .
            substr($this->numeroCompte, -4);
    }

    public function setNumeroCompte($numeroCompte)
    {
        // REGEX IBAN International
        if (preg_match('/^(?:((?:IT|SM)\d{2}\s?[A-Z]{1}\d{3}\s?(\d{4}\s?){4}\d{3})|(NL\d{2}\s?[A-Z]{4}\s?(\d{4}\s?){2}\d{2})|(LV\d{2}\s?[A-Z]{4}\s?(\d{4}\s?){3}\d{1})|((?:BG|GB|IE)\d{2}\s?[A-Z]{4}\s?(\d{4}\s?){3}\d{2})|(GI\d{2}\s?[A-Z]{4}\s?(\d{4}\s?){3}\d{3})|(RO\d{2}\s?[A-Z]{4}\s?(\d{4}\s?){4})|(MT\d{2}\s?[A-Z]{4}\s?(\d{4}\s?){5}\d{3})|(NO\d{2}\s?(\d{4}\s?){2}\d{3})|((?:DK|FI|FO)\d{2}\s?(\d{4}\s?){3}\d{2})|((?:SI)\d{2}\s?(\d{4}\s?){3}\d{3})|((?:AT|EE|LU|LT)\d{2}\s?(\d{4}\s?){4})|((?:HR|LI|CH)\d{2}\s?(\d{4}\s?){4}\d)|((?:DE)\d{2}\s?(\d{4}\s?){4}\d{2})|((?:CZ|ES|SK|SE)\d{2}\s?(\d{4}\s?){5})|(PT\d{2}\s?(\d{4}\s?){5}\d)|((?:IS)\d{24})|((?:BE)\d{2}\s?(\d{4}\s?){3})|((?:FR|MC|GR)\d{2}\s?([0-9A-Z]{4}\s?){5}\d{3})|((?:PL|HU|CY)\d{2}\s?(\d{4}\s?){6}))$/', strtoupper($numeroCompte))) {
            $this->numeroCompte = strtoupper($numeroCompte);
            // pour rappel strtoupper — Renvoie une chaîne en majuscules
        } else {
            throw new Exception(" Format de compte invalide.");
        }
    }

    // Type de compte
    public function getTypeCompte(): string
    {
        return $this->typeCompte;
    }

    public function setTypeCompte(string $typeCompte)
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

    // Créditer le compte
    // ATTENTION ne pas confondre une propriété et un paramètre appelé dans une variable
    public function credit(float $montant)
    {
        // vérifier si le solde est < 35 000
        if ($this->solde < 35000 && ($this->solde + $montant) < 35000) {
            // si montant est un nombre positif
            if ($montant > 0 && $montant <= 35000) {
                // alors on ajoute ce montant au solde
                $this->solde += $montant;
            } else {
                throw new Exception("Le montant à créditer doit être positif.");
            }
            
        } else {
            throw new Exception("Le montant total du compte ne peut pas excéder 35 000 &euro;.");
        }
    }

    // Débiter le compte
    public function debit(float $montant)
    {
        // si montant est un nombre positif et que le débit ne ferait pas descendre le solde en dessous de -1000 €
        if ($montant > 0 && ($this->solde - $montant) >= -1000) {

            // alors ôter le montant au solde
            // solde -= montant est équvalent à solde = solde - montant
            $this->solde -= $montant;

        } else {
            throw new Exception("Débit impossible : montant invalide ou solde insuffisant (découvert autorisé : 1000 €).");
        }
    }

    // Affichage
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
    // $monCompte->setSolde(-800);
    // $monCompte->credit(20000);
    $monCompte->debit(120);
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
