<?php
require_once('myModel.php');
session_start();
// URL de redirection par défaut (si pas d'action ou action non reconnue)
$url_redirect = "index.php";

if (isset($_REQUEST['action'])) {

    if ($_REQUEST['action'] == 'authenticate') {
        $ip = $_SERVER['REMOTE_ADDR']; //getting the IP Address
        $t = time(); //Storing time in variable
        $diff = (time() - 600); // Here 600 mean 10 minutes 10*60
        $mysqli = getMySqliConnection();
        $result = mysqli_query($mysqli, "SELECT COUNT(*) FROM tbl_loginLimit WHERE ipAddress LIKE '$ip' 
          AND timeDiff > $diff"); //Fetching Data 
        $count = mysqli_fetch_array($result);
        if ($count[0] > 3) {
            $url_redirect = "vw_login.php?limitevalue";
        } else {
            /* ======== AUTHENT ======== */
            if (!isset($_REQUEST['login']) || !isset($_REQUEST['mdp']) || $_REQUEST['login'] == "" || $_REQUEST['mdp'] == "") {
                // manque login ou mot de passe
                $url_redirect = "vw_login.php?nullvalue";
            } else {
                $utilisateur = findUserByLoginPwd($_REQUEST['login'], $_REQUEST['mdp']);
                if ($utilisateur == false) {
                    // echec authentification
                    mysqli_query($mysqli, "INSERT INTO tbl_loginLimit VALUES (null,'$ip','$t')"); //Insert Query
                    $url_redirect = "vw_login.php?badvalue";
                } else {
                    // authentification réussie
                    //If user login successful, delete his login log
                    mysqli_query($mysqli, "DELETE FROM tbl_loginLimit WHERE ipAddress LIKE '::1'");
                    $_SESSION["connected_user"] = $utilisateur;
                    $_SESSION["listeUsers"] = findAllUsers();
                    $_SESSION["listClients"] = findAllClients();
                    $url_redirect = "vw_accueil.php";
                }
            }
        }
        $mysqli->close();
    } else if ($_REQUEST['action'] == 'disconnect') {
        /* ======== DISCONNECT ======== */
        unset($_SESSION["connected_user"]);
        $url_redirect = $_REQUEST['loginPage'];
    } else if ($_REQUEST['action'] == 'transfert') {
        /* ======== CHECK ======== */
        if ($bad_mt = transfertValidator($_REQUEST['destination'], $_REQUEST['montant'])) {
            $url_redirect = "vw_virement.php?bad_mt=" . $bad_mt;
        } else {
            /* ======== TRANSFERT ======== */
            $bad_mt = transfert($_REQUEST['destination'], $_SESSION["connected_user"]["numero_compte"], $_REQUEST['montant']);
            if ($bad_mt == null) {
                $_SESSION["connected_user"]["solde_compte"] = $_SESSION["connected_user"]["solde_compte"] -  $_REQUEST['montant'];
                $url_redirect = "vw_virement.php?trf_ok";
            } else {
                $url_redirect = "vw_virement.php?bad_mt=" . $bad_mt;
            }
            unset($_SESSION['infoClient']);
        }
    } else if ($_REQUEST['action'] == 'sendmsg') {
        /* ======== MESSAGE ======== */
        addMessage($_REQUEST['to'], $_SESSION["connected_user"]["id_user"], $_REQUEST['sujet'], $_REQUEST['corps']);
        $url_redirect = "vw_messagerie.php?msg_ok";
    } else if ($_REQUEST['action'] == 'msglist') {
        /* ======== MESSAGE ======== */
        $_SESSION['messagesRecus'] = findMessagesInbox($_REQUEST["userid"]);
        $url_redirect = "vw_showmessagerie.php";
    } else if ($_REQUEST['action'] == 'ficheclient') {
        $_SESSION['infoClient'] = $_SESSION['listClients'][$_REQUEST["idclient"]];
        $url_redirect = "vw_showficheclient.php";
    }
}

header("Location: $url_redirect");