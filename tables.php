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
require_once("classes.php");
session_start();
if(!isset($_SESSION['table'])) {
    $table=new Table();
    $table->setCaption("CONTACTES");
    $table->setTitles(array("Name","Surname","Email","Phone"));
    $table->setData(array());
    $_SESSION['table']=$table;
}
echo "<table>";
$byname=(isset($_POST['byname'])?strip_tags($_POST['byname']):"");
$bysurname=(isset($_POST['bysurname'])?strip_tags($_POST['bysurname']):"");
$byemail=(isset($_POST['byemail'])?strip_tags($_POST['byemail']):"");
$byphone=(isset($_POST['byphone'])?strip_tags($_POST['byphone']):"");
$buttonValue=(empty($byname.$bysurname.$byemail.$byphone)?"Filter":"Show all");
if(!empty($byname)) { $filter=1;$filterString=$byname;}
elseif(!empty($bysurname)) { $filter=2;$filterString=$bysurname;}
elseif(!empty($byemail)) { $filter=3;$filterString=$byemail;}
elseif(!empty($byphone)) { $filter=4;$filterString=$byphone;}
else { $filter=0; $filterString="";}
$_SESSION['table']->drawTable($filter,$filterString);
echo "</table>";
echo "<br/>";
echo "<a href='newrow.php'>New contact</a>";
?>
<form action="tables.php" method="POST">
    <?php
    if($buttonValue=="Filter") {
      echo "<label>Find by name: </label>";
      echo "<input type='text' name='byname'/><br/>";
      echo "<label>Find by surname: </label>";
      echo "<input type='text' name='bysurname'/><br/>";
      echo "<label>Find by email: </label>";
      echo "<input type='text' name='byemail'/><br/>";
      echo "<label>Find by phone: </label>";
      echo "<input type='text' name='byphone'/><br/>";
    }
    ?>
    <input type="submit" value="<?=$buttonValue?>" name="filterButton"/>
</form>
</body>
</html> 