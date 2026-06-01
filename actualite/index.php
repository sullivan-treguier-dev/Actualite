<?php

use classe\Post;
$title = "Accueil";
$selected_accueil = true;
require_once 'pdo/pdo.php';
require_once 'layout/layout_debut.php';
?>
<div>
    <?php
    if (!isset($e)) {
        Post::afficheCinqArticle();
    }
    ?>
</div>
<?php
require_once 'layout/layout_fin.php';
?>