<?php
require_once("header.php");
require_once("menu.php"); ?>
<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Messages</title>
  <link rel="stylesheet" type="text/css" media="all" href="/sr03/public/css/mystyle.css" />
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 5px;
      text-align: center;
    }
  </style>
</head>

<body>

  <main>
    <article>
      <div class="liste">
        <h3><?php echo $_SESSION["connected_user"]["prenom"]; ?> <?php echo $_SESSION["connected_user"]["nom"]; ?> - Messages reçus</h3>
        <table style="width:60%; margin: 0 auto;">
          <tr>
            <th>From</th>
            <th>Sujet</th>
            <th>Contenu</th>
          </tr>
          <?php
          foreach ($_SESSION["messagesRecus"] as $cle => $message) {
            echo '<tr>';
            echo '<td>' . $message['nom'] . ' ' . $message['prenom'] . '</td>';
            echo '<td>' . $message['sujet_msg'] . '</td>';
            echo '<td>' . $message['corps_msg'] . '</td>';
            echo '</tr>';
          }
          ?>
        </table>
      </div>

    </article>
  </main>
</body>

</html>