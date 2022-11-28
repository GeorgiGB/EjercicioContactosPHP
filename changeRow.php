<?php
require_once("classes.php");
session_start();
if(!isset($_POST['firstname'])) {
    header("location:tables.php");
}
else {
    $row=strip_tags($_POST['row']);
    $name=strip_tags($_POST['firstname']);
    $surname=strip_tags($_POST['lastname']);
    $email=strip_tags($_POST['email']);
    $phone=strip_tags($_POST['phone']);
}
$contacte=new Contact($name,$surname,$email,$phone);
$_SESSION['table']->updateRow($row,$contacte);
header("location:tables.php")
?>