<?php
require_once("header.php");
require_once("menu.php"); ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Vivrement</title>
    <link rel="stylesheet" type="text/css" media="all" href="css/mystyle.css" />
</head>

<body>
    <header>
        <h2>Virement
            <?php
            if (isset($_GET["tfmode"])) {
                echo 'depuis ' . $_SESSION["infoClient"]["nom"] . ' ' . $_SESSION["infoClient"]["prenom"] . '</p>';
            } else {
                echo 'depuis mon compte';
            }
            ?>
        </h2>
    </header>
    <section>
        <article>
            <form method="POST" action="myController.php">
                <input type="hidden" name="action" value="transfert">
                <?php
                if (isset($_GET["tfmode"])) {
                    echo ' <input type="hidden" name="from" value="client">';
                }
                ?>
                <div class="fieldset">
                    <div class="fieldset_label">
                        <span>Transférer de l'argent</span>
                    </div>
                    <div class="field">
                        <label>N° compte destinataire : </label><input type="text" size="20" name="destination">
                    </div>
                    <div class="field">
                        <label>Montant à transférer : </label><input type="number" size="10" name="montant">
                    </div>
                    <div class="field">
                        <label>Saisir votre mot de passe : </label><input type="password" size="10" name="mdp">
                    </div>
                    <button class="form-btn">Transférer</button>
                    <?php
                    if (isset($_REQUEST["trf_ok"])) {
                        echo '<p style="color:green;">Virement effectué avec succès.</p>';
                    }
                    if (isset($_REQUEST["bad_mt"])) {
                        echo '<p style="color:red;">' . $_REQUEST["bad_mt"] . '</p>';
                    }
                    if (isset($_REQUEST["bad_mdp"])) {
                        echo '<p style="color:red;"> Mot de passe incorrect!!!</p>';
                    }
                    ?>
                </div>
            </form>
        </article>
    </section>

</body>

</html>