<?php
require_once("header.php");
require_once("menu.php"); ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Fiche Client</title>
    <link rel="stylesheet" type="text/css" media="all" href="css/mystyle.css" />
</head>

<body>
    <header>
        <h2>Fiche Client</h2>
    </header>
    <section>

        <article>
            <div class="fieldset">
                <div class="fieldset_label">
                    <span>Informations personnelles</span>
                </div>
                <div class="field">
                    <label>N° compte : </label> <span><?php echo $_SESSION["infoClient"]["nom"]; ?></span>
                </div>
                <div class="field">
                    <label>Solde : </label><span><?php echo $_SESSION["infoClient"]["prenom"]; ?></span>
                </div>
                <div class="field">
                    <label>Login : </label><span><?php echo $_SESSION["infoClient"]["login"]; ?></span>
                </div>
                <div class="field">
                    <label>Profil : </label><span><?php echo $_SESSION["infoClient"]["profil_user"]; ?></span>
                </div>
            </div>
        </article>
        <br>
        <article>
            <div class="fieldset">
                <div class="fieldset_label">
                    <span>Compte</span>
                </div>
                <div class="field">
                    <label>N° compte : </label><span><?php echo $_SESSION["infoClient"]["numero_compte"]; ?></span>
                </div>
                <div class="field">
                    <label>Solde : </label><span><?php echo $_SESSION["infoClient"]["solde_compte"]; ?> &euro;</span>
                </div>
            </div>
        </article>
        <br>
        <article>
        <form method="GET" action="vw_virement.php">
            <input type="hidden" name="tfmode" value="client">
            <div class="fieldset">
                <div class="fieldset_label">
                    <span> Effectuer un virement</a></span>
                </div>
                <button class="form-btn">Transférer</button>
            </div>
        </form>
        </article>
    </section>

</body>

</html>