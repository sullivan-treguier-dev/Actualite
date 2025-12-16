<?php
require_once 'Createur.php';
require_once 'pdo/pdo.php';
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

    public static function afficheCinqArticle(): array {
        $post_stockee = [];
        require_once 'pdo/pdo.php';
        $temp = self::all("SELECT * FROM posts");
        while ($resultat = $temp) {
            $sql_createur = "SELECT * FROM createurs WHERE id = {$resultat['createur_id']}";
            $createur_query = $pdo->query($sql_createur)->fetch();
            $createur = new Createur($createur_query['nom'], $createur_query['prenom'], $createur_query['linkedin'], $createur_query['mail'], $createur_query['telephone']);
            $post = new Post($resultat['titre'], $resultat['contenu'], $createur, $resultat['created_at'], $resultat['updated_at']);
            $post_stockee[] = $post;
            echo "<form action='article_details.php' method='get'>";
            echo "<div>";
            echo "<h1>" . $post->titre . "</h1>";
            echo "<p>" . $post->contenu . "</p>";
            echo "<input type='hidden' name='{$resultat['id']}'>";
            echo "<button type='submit'>Voir les détails</button>";
            echo "</div>";
            echo "</form>";
        }
        return $post_stockee;
    }
}
?>