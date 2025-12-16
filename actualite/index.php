<?php
$title = "Accueil";
$selected_accueil = true;
require_once 'pdo/pdo.php';
require_once 'layout/layout_debut.php';
require_once 'posts/posts.php';
?>
<div>
    <?php
    if (!isset($e)) {
        $sql = "SELECT * FROM posts";
        $temp = $pdo->query($sql);
        while ($resultat = $temp->fetch()) {
            $post = new Post($resultat['titre'], $resultat['contenu']);
            echo "<form action='article_details.php' method='get'>";
            echo "<div>";
            echo "<h1>" . $post->titre . "</h1>";
            echo "<p>" . $post->contenu . "</p>";
            echo "<input type='hidden' name='{$resultat['id']}'>";
            echo "<button type='submit'}'>Voir les détails</button>";
            echo "</div>";
            echo "</form>";
        }
    }
    ?>
</div>
<?php
require_once 'layout/layout_fin.php';
?>