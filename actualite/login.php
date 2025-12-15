<?php
    $title = "Se connecter";
    $selected_accueil = null;
    require_once "layout/layout_debut.php";
?>
<form action="index.php" method="post">
    <div class="card">
        <div>
            <label for="user">Utilisateur</label>
            <input class="login" type="text" id="user" name="user">
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input class="login" type="password" id="password" name="password">
        </div>
        <button id="button_login">Connexion</button>
    </div>
</form>
<?php
require_once 'layout/layout_fin.php';
?>