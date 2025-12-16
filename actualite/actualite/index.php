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
        $sql = "SELECT * FROM createurs";
        $createur = new Createur($resultat['nom'], $resultat['prenom'], $resultat['linkedin'], $resultat['mail'], $resultat['telephone']);
    }
    ?>
</div>
<?php
require_once 'layout/layout_fin.php';
?>