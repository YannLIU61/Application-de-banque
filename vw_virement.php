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
    <title>Vivrement</title>
    <link rel="stylesheet" type="text/css" media="all" href="css/mystyle.css" />
</head>

<body>
    <header>
        <h2>Virement</h2>
    </header>
    <section>
        <article>
            <form method="POST" action="myController.php">
                <input type="hidden" name="action" value="transfert">
                <div class="fieldset">
                    <div class="fieldset_label">
                        <span>Transférer de l'argent</span>
                    </div>
                    <div class="field">
                        <label>N° compte destinataire : </label><input type="text" size="20" name="destination" value=<?php echo $_SESSION["infoClient"]["numero_compte"]; ?>>
                    </div>
                    <div class="field">
                        <label>Montant à transférer : </label><input type="number" size="10" name="montant">
                    </div>
                    <button class="form-btn">Transférer</button>
                    <?php
                    if (isset($_REQUEST["trf_ok"])) {
                        echo '<p style="color:green;">Virement effectué avec succès.</p>';
                    }
                    if (isset($_REQUEST["bad_mt"])) {
                        echo '<p style="color:red;">' . $_REQUEST["bad_mt"] . '</p>';
                    }
                    ?>
                </div>
            </form>
        </article>
    </section>

</body>

</html>