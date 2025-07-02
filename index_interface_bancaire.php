<?php

// interface ne comporte que des méthodes
interface MoyenPaiement{
    public function payer(float $montant);
}

class VirementBancaire implements MoyenPaiement{
    // la fonction à implémenter doit porter le même nom
    public function payer(float $montant){
        echo "Virement SEPA effectué pour ". $montant . " &euro; <br>";
    }
}

class ChequeBancaire implements MoyenPaiement{
    public function payer(float $montant){
        echo "Chèque déposé d'une valeur de ". $montant . " &euro; <br>";
    }
}

class EspecesBancaires implements MoyenPaiement{
    public function payer(float $montant){
        echo "Espèces d'un montant de ". $montant . " &euro; ". " déposées. <br>";
    }
}

$virement = new VirementBancaire();
$virement->payer(457.59);

$cheque = new ChequeBancaire();
$cheque->payer(56.17);

$especes = new EspecesBancaires();
$especes->payer(4885.10);