<?php
// Utiliser la directive HTTPOnly
ini_set( 'session.cookie_httponly', 1 );
session_start();
ini_set('session.gc_maxlifetime', 3600);
if (!isset($_SESSION["connected_user"]) || $_SESSION["connected_user"] == "") {
    // utilisateur non connecte
    header('Location:vw_login.php');
  } 