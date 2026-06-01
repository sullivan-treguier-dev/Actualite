<?php
    use classe\Post;
    $title = "Article";
    $selected_accueil = null;
    require_once "pdo/pdo.php";
    require_once "classe/Post.php";
    require_once "layout/layout_debut.php";
    Post::afficheDetailArticle($_GET['id']);
    require_once "layout/layout_fin.php";
?>
