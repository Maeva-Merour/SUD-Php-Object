<?php

// un trait est un moyen de réutiliser du code dans plusieurs classes, sans utiliser l’héritage.
// Quand plusieurs classes ont des fonctions communes, mais qu’elles n’ont pas de lien direct entre elles (donc pas possible d'utiliser l’héritage), 
// on peut mettre ce code commun dans un trait.
// Un trait est comme un bloc de fonctions réutilisable.
// On peut utiliser plusieurs traits dans une classe.
// Il évite la duplication de code et contourne les limites de l’héritage simple (PHP ne permet pas d’héritage multiple entre classes).

trait Logger{
    public function log(string $msg):void{
        echo "Log : ". $msg . " <br>";
    }
}

trait Mailer{
    public function sendMail(string $dest, string $msg):void{
        echo "Mail envoyé à ". $dest. " : ". $msg . " <br>";
    }
}

class NotificationService{
    
    // on appelle un trait à l’intérieur d’une classe en utilisant le mot-clé use.
    use Logger, Mailer;

    public function notifierClient(string $log, string $email, string $message){
        $this->log($log);
        $this->sendMail($email, $message);
    }

}

$notif = new NotificationService();
$notif->notifierClient("Vous êtes connecté.", "contact@contact.fr","Salut !");