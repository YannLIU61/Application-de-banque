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
    <title>Messagerie</title>
    <link rel="stylesheet" type="text/css" media="all" href="css/mystyle.css" />
</head>

<body>
    <header>
        <h2>Messagerie</h2>
    </header>

    <section>
        <article>
            <form method="POST" action="myController.php">
                <input type="hidden" name="action" value="sendmsg">
                <div class="fieldset">
                    <div class="fieldset_label">
                        <span>Envoyer un message</span>
                    </div>
                    <div class="field">
                        <label>Destinataire : </label>
                        <select name="to">
                            <!-- un employé peut envoyer un message à n’importe qui, un client ne peut envoyer un message qu’à un employé -->
                            <?php if ($_SESSION['connected_user']['profil_user'] == "CLIENT") :
                                foreach ($_SESSION['listClients'] as $id => $user) {
                                    echo '<option value="' . $id . '">' . $user['nom'] . ' ' . $user['prenom'] . '</option>';
                                } else :
                                foreach ($_SESSION['listeUsers'] as $id => $user) {
                                    echo '<option value="' . $id . '">' . $user['nom'] . ' ' . $user['prenom'] . '</option>';
                                }
                            endif; ?>
                        </select>
                    </div>
                    <div class="field">
                        <label>Sujet : </label><input type="text" size="20" name="sujet">
                    </div>
                    <div class="field">
                        <label>Message : </label><input type="text" size="40" name="corps">
                    </div>
                    <button class="form-btn">Envoyer</button>
                    <?php
                    if (isset($_REQUEST["msg_ok"])) {
                        echo '<p>Message envoyé avec succès.</p>';
                    }
                    ?>
                    <p><a href="myController.php?action=msglist&userid=<?php echo $_SESSION["connected_user"]["id_user"]; ?>">Mes messages reçus</a></p>
                </div>
            </form>
        </article>

    </section>

</body>

</html>