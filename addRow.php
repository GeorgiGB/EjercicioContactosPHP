<?php
require_once("classes.php");
session_start();
if(!isset($_SESSION['table'])) {
    header("location:tables.php");
}
if(!$_POST) {
    header("location:newRow.php");
}
else {
    $name=strip_tags($_POST['firstname']);
    $surname=strip_tags($_POST['lastname']);
    $email=strip_tags($_POST['email']);
    $phone=strip_tags($_POST['phone']);
    $contact=new Contact($name,$surname,$email,$phone);
    $_SESSION['table']->addRow($contact);
    header("location:tables.php");
}
?>