<?php
session_start();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="all" href="css/mystyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .navbar {
        width: 100%;
        background-color: #555;
        overflow: auto;
    }

    .navbar a {
        float: left;
        padding: 12px;
        color: white;
        text-decoration: none;
        font-size: 17px;
    }

    .navbar a:hover {
        background-color: #000;
    }

    .active {
        background-color: #4CAF50;
    }

    @media screen and (max-width: 500px) {
        .navbar a {
            float: none;
            display: block;
        }
    }
</style>

<body>

    <header>
        <div class="navbar">
            <a class="active" href="vw_accueil.php"><i class="fa fa-fw fa-home"></i> Home</a>
            <a href="vw_virement.php"><i class="fa fa-fw fa-euro"></i> Virement</a>
            <a href="vw_messagerie.php"><i class="fa fa-fw fa-envelope"></i> Messagerie</a>
            <?php if ($_SESSION['connected_user']['profil_user'] == "EMPLOYE") :
                echo ' <a href="vw_ficheclient.php"><i class="fa fa-fw fa-user"></i> FicheClient</a>';
            endif; ?>

        </div>
        <form method="POST" action="myController.php">
            <input type="hidden" name="action" value="disconnect">
            <input type="hidden" name="loginPage" value="vw_login.php?disconnect">
            <button class="btn-logout form-btn">Déconnexion</button>
        </form>
    </header>
</body>

</html>