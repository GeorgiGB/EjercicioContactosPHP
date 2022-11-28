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
<form action='addRow.php' method="POST">
<label>Name: </label><input type="text" name="firstname" required/><br/>
<label>Surname: </label><input type="text" name="lastname" required/><br/>
<label>Email: </label><input type="email" name="email" required/><br/>
<label>Phone: </label><input type="number" name="phone" required/><br/>
<input type="submit" name="button" value="Send"/>
</form>
</body>