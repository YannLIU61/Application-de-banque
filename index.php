<?php
require_once("header.php");
if (isset($_SESSION["connected_user"]) || $_SESSION["connected_user"] == "") {
  header('Location:vw_accueil.php');
}
