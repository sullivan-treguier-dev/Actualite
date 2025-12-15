<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/actualite.css" type="text/css" media="all">
    <title><?php echo $title; ?></title>
</head>
<body>
    <header>
        <img src="img/logo_actualite.png" alt="Logo" title="Logo">
        <ul>
            <li><a href=<?php echo $selected_accueil ? "#" : "index.php"; ?> <?php echo $selected_accueil ? "class='selected'" : ""; ?>>Accueil</a></li>
            <li><a href="#">Test</a></li>
        </ul>
    </header>
</body>