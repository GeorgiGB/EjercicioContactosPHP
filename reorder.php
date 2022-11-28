<?php
require_once("classes.php");
session_start();
if(!isset($_GET['column'])) {
    header("location:tables.php");
}
$column=strip_tags($_GET['column']);
$_SESSION['table']->reorder($column);
header("location:tables.php")
?>