<?php
require_once("../Class.Tools.php");
Tools::printSuccess("Logout Successfully");
session_start();
unset($_SESSION['login']);
session_destroy();
header("Location:../index.php");
?>