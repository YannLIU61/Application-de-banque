<?php
session_start();
if (!isset($_SESSION["connected_user"]) || $_SESSION["connected_user"] == "") {
    // utilisateur non connect�
    header('Location: vw_login.php');
}
?>
<?php include("menu.php"); ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Fiche Client</title>
    <link rel="stylesheet" type="text/css" media="all" href="css/mystyle.css" />
</head>

<body>
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
        <article>
            <div class="fieldset">
                <div class="fieldset_label">
                    <span><a href="vw_virement.php"> Transférer à cet utilisateur</a></span>
                </div>
            </div>
        </article>
    </section>

</body>

</html>