<?php
require_once 'Createur.php';
class Post {

    public string $titre;
    public string $contenu;
    public Createur $createur;
    public string $date_creation;
    public string $date_modif;

    public function __construct(string $titre, string $contenu, Createur $createur, string $date_creation, string $date_modif) {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->createur = $createur;
        $this->date_creation = $date_creation;
        $this->date_modif = $date_modif;
    }

    public function getDetails(): string {
        return "Crée par {$this->createur->prenom} {$this->createur->nom}, le {$this->date_creation} et modifié le {$this->date_modif}";
    }

    public static function afficheCinqArticle(string $sql): array {
        $post_stockee = [];
        require_once 'pdo/pdo.php';
        $temp = $pdo->query($sql);
        while ($resultat = $temp->fetch()) {
            $post = new Post($resultat['titre'], $resultat['contenu'], $createur, $resultat['created_at'], $resultat['updated_at']);
            $post_stockee[] = $post;
            echo "<form action='article_details.php' method='get'>";
            echo "<div>";
            echo "<h1>" . $titre . "</h1>";
            echo "<p>" . $contenu . "</p>";
            echo "<input type='hidden' name='{$resultat['id']}'>";
            echo "<button type='submit'}'>Voir les détails</button>";
            echo "</div>";
            echo "</form>";
        }
        return $post_stockee;
    }
}
?>