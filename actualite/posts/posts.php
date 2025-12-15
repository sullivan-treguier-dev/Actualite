<?php
class Post {

    public string $titre;
    public string $slug;
    public string $contenu;

    public function __construct(string $titre, string $slug, string $contenu) {
        $this->titre = $titre;
        $this->slug = $slug;
        $this->contenu = $contenu;
    }
}
?>