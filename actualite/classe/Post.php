<?php
namespace classe;

use DateTime;
require_once 'classe/Bdd.php';
require_once 'classe/Createur.php';
class Post extends Bdd {

    protected static string $table = 'posts';
    protected static string $model = self::class;

    public int $id;
    public string $titre;
    public string $contenu;
    public int $createur_id;
    public DateTime $date_creation;
    public DateTime $date_modif;

    public function __construct(array $values) {
        $this->id = intval($values['id']);
        $this->titre = $values['titre'];
        $this->contenu = $values['contenu'];
        $this->createur_id = intval($values['createur_id']);
        $this->date_creation = DateTime::createFromFormat('Y-m-d', $values['created_at']);
        $this->date_modif = DateTime::createFromFormat('Y-m-d', $values['updated_at']);
    }

    public static function afficheNombreArticle(int $limite): array {
        $post_stockee = [];
        $temp = self::limit($limite);
        foreach ($temp as $resultat) {
            $createur = Createur::find($resultat['createur_id']);
            $post = new Post(['id' => $resultat['id'], 'titre' => $resultat['titre'], 'contenu' => $resultat['contenu'], 'createur_id' => $resultat['createur_id'], 'created_at' => $resultat['created_at'], 'updated_at' => $resultat['updated_at']]);
            $post_stockee[] = $post;
            echo "<div>";
            echo "<h1>" . $post->titre . "</h1>";
            echo "<h2>" . $createur['prenom'] . ' ' . $createur['nom'] . "</h2>";
            echo "<p>" . $post->contenu . "</p>";
            echo "</div>";
            echo "<a href='./article_details.php?id={$post->id}'>";
            echo "Voir les détails";
            echo "</a>";
        }
        echo "<p class='total_article'>Nombre total d'articles : " . self::count();
        return $post_stockee;
    }

    public static function afficheDetailArticle(int $id) {
        $resultat = self::find($id);
        $createur = Createur::find($resultat['createur_id']);
        $post = new Post(['id' => $resultat['id'], 'titre' => $resultat['titre'], 'contenu' => $resultat['contenu'], 'createur_id' => $resultat['createur_id'], 'created_at' => $resultat['created_at'], 'updated_at' => $resultat['updated_at']]);
        echo "<div>";
        echo "<h1>" . $post->titre . "</h1>";
        echo "<h2>" . $createur['prenom'] . ' ' . $createur['nom'] . " (" . $createur['mail'] . ")</h2>";
        echo "<a href='" . $createur['linkedin'] . "'target='_blank'>LinkedIn de " . $createur['prenom'] .  "</a>";
        echo "<p>" . $post->contenu . "</p>";
        echo "</div>";
    }
}
?>