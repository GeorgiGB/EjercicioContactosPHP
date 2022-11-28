<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>tables</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" type="text/css"/>
</head>
<body>
<?php
include "classes.php";
session_start();
if(!isset($_SESSION['table']) || !isset($_GET['row'])) {
    header("location:tables.php");
}
else {
    $row=strip_tags($_GET['row']);
    $contact=$_SESSION['table']->getContact($row);
    $name=$contact->getName();
    $surname=$contact->getSurname();
    $email=$contact->getEmail();
    $phone=$contact->getPhone();
}
?>
<form action='changeRow.php' method="POST">
<label>Name: </label><input type="text" name="firstname" value="<?=$name?>" required/><br/>
<label>Surname: </label><input type="text" name="lastname" value="<?=$surname?>" required/><br/>
<label>Email: </label><input type="email" name="email" value="<?=$email?>" required/><br/>
<label>Phone: </label><input type="number" name="phone" value="<?=$phone?>" required/><br/>
<input type="hidden" name="row" value="<?=$row?>"/>
<input type="submit" name="button" value="Send"/>
</form>
</body>