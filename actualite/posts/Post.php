<?php
class Post {

    public string $titre;
    public string $contenu;
    public string $createur;
    public string $date_creation;
    public string $date_modif;

    public function __construct(string $titre, string $contenu) {
        $this->titre = $titre;
        $this->contenu = $contenu;
    }

    public function getDetails(string $createur, string $date_creation, string $date_modif): string {
        return "Crée par {$createur}, le {$date_creation} et modifié le {$date_modif}";
    }
}
?>