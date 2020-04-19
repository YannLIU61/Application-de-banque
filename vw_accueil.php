<?php
require_once("header.php");
require_once("menu.php"); ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mon Compte</title>
    <link rel="stylesheet" type="text/css" media="all" href="/css/mystyle.css" />
</head>

<body>
    <header>
        <h2>Login USER: <?php echo $_SESSION["connected_user"]["prenom"]; ?> <?php echo $_SESSION["connected_user"]["nom"]; ?></h2>
    </header>

    <section>

        <article>
            <div class="fieldset">
                <div class="fieldset_label">
                    <span>Vos informations personnelles</span>
                </div>
                <div class="field">
                    <label>N° compte : </label> <span><?php echo $_SESSION["connected_user"]["nom"]; ?></span>
                </div>
                <div class="field">
                    <label>Solde : </label><span><?php echo $_SESSION["connected_user"]["prenom"]; ?></span>
                </div>
                <div class="field">
                    <label>Login : </label><span><?php echo $_SESSION["connected_user"]["login"]; ?></span>
                </div>
                <div class="field">
                    <label>Profil : </label><span><?php echo $_SESSION["connected_user"]["profil_user"]; ?></span>
                </div>
            </div>
        </article>
        <br>
        <article>
            <div class="fieldset">
                <div class="fieldset_label">
                    <span>Votre compte</span>
                </div>
                <div class="field">
                    <label>N° compte : </label><span><?php echo $_SESSION["connected_user"]["numero_compte"]; ?></span>
                </div>
                <div class="field">
                    <label>Solde : </label><span><?php echo $_SESSION["connected_user"]["solde_compte"]; ?> &euro;</span>
                </div>
            </div>
        </article>
    </section>

</body>

</html>