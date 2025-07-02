<?php

interface Telechargeable {
    public function telecharger();
    // C’est une sorte de "contrat" qui dit : 
    // « Toute classe qui veut être téléchargeable doit avoir une méthode telecharger() ».
}

abstract class Media {
    abstract public function afficherInfos();
    // C’est une classe qu’on ne peut pas instancier directement, mais qui sert de base.
    // Elle impose que toute classe fille doit définir la méthode afficherInfos().
}

class LivreNumerique extends Media implements Telechargeable {
    // Hérite de Media (donc doit définir afficherInfos())
    // Implémente l’interface Telechargeable (donc doit définir telecharger())
    public function afficherInfos()
    {   // afficherInfos() affiche un message sur le livre numérique
        // implémentation ici
        echo "Infos du livre numérique";
    }

    public function telecharger()
    {   // telecharger() affiche un message pour simuler le téléchargement
        // implémentation du téléchargement ici
        echo "Téléchargement du livre numérique...";
    }
}
