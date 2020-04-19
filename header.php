<?php
session_start();
ini_set('session.gc_maxlifetime', 3600);
if (!isset($_SESSION["connected_user"]) || $_SESSION["connected_user"] == "") {
    // utilisateur non connect�
    header('Location:vw_login.php');
  } 