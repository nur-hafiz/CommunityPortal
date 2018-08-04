<?php
session_start();
isset($_SESSION['user']) ? require_once 'loginnav.php' : header('Location: login.php');
?>