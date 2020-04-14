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
    <header>
        <h2>Fiche Client</h2>
    </header>

    <section>
        <article>
            <form method="POST" action="myController.php">
                <input type="hidden" name="action" value="ficheclient">
                <div class="fieldset">
                    <div class="fieldset_label">
                        <span>Fiche Client</span>
                    </div>
                    <div class="field">
                        <label>Client : </label>
                        <select name="idclient">
                            <!-- un employé peut envoyer un message à n’importe qui, un client ne peut envoyer un message qu’à un employé -->
                            <?php
                            foreach ($_SESSION['listClients'] as $id => $user) {
                                echo '<option value="' . $id . '">' . $user['nom'] . ' ' . $user['prenom'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button class="form-btn">Valider</button>
                </div>
            </form>
        </article>
    </section>

</body>

</html>