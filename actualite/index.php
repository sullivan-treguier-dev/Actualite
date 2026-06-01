<?php
use classe\Post;
$title = "Accueil";
$selected_accueil = true;
require_once 'pdo/pdo.php';
require_once 'layout/layout_debut.php';
require_once 'classe/Post.php';
?>
<div>
    <?php
        Post::afficheCinqArticle();
    if (!isset($e)) {
        
    } else {
        'Erreur';
    }
    ?>
</div>
<?php
require_once 'layout/layout_fin.php';
?>