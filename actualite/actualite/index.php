<?php
$title = "Accueil";
$selected_accueil = true;
require_once 'pdo/pdo.php';
require_once 'layout/layout_debut.php';
require_once 'class/Createur.php';
require_once 'class/Post.php';
?>
<div>
    <?php
    if (!isset($e)) {
        $post->afficheCinqArticle("SELECT * FROM posts");
    }
    ?>
</div>
<?php
require_once 'layout/layout_fin.php';
?>