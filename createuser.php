<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create user</title>
    <link rel="stylesheet" href="terminoppgave.css">
</head>

<body>

<?php
 require "includes/nav.inc.php";
?>

<h2>Create new user:</h2>
    <form class="userinfo" method="post" action="includes/formhandler.inc.php">
        <label for="firstname">First name:</label>
        <input type="text" name="firstname"><br />
        <label for="surname">Surname:</label>
        <input type="text" name="surname"><br /> 
        <label for="usename">Username:</label>
        <input type="text" name="username"><br />
        <label for="password">Password:</label>
        <input type="password" name="pwd"><br />
        <label for="email">E-mail:</label>
        <input type="text" name="email"><br />
        <input id="submit" type="submit" value="Create User" name="submit">
    </form>



</body>
</html>