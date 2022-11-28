<?php
require_once("classes.php");
session_start();
if(!isset($_GET['row'])) {
    header("location:tables.php");
}
$row=strip_tags($_GET['row']);
$_SESSION['table']->deleteRow($row);
header("location:tables.php")
?>