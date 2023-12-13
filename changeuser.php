<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="terminoppgave.css">
    <title>Endre bruker</title>
</head>

<body>
<?php
 require "includes/nav.inc.php";
?>

<h3>Change account:</h3>
        <form class="userinfo" method="POST" action="includes/userupdate.inc.php">
            <label for="oldusername"> Old username</label>
            <input type="text" name="oldusername"><br />
            <label for="pwd">Old password:</label>
            <input type="password" name="oldpwd"><br />

            <label for="username">New username:</label>
            <input type="text" name="newusername"><br />
            <label for="pwd">Password:</label>
            <input type="password" name="newpwd"><br />

            <input id="submit" type="submit" value="Update" name="submit">
        </form>

        <br><br>

        <h3>Delete account:</h3>
        <form class="userinfo" method="POST" action="includes/userdelete.inc.php">
            <label for="username">Username:</label>
            <input type="text" name="username"><br />
            <label for="password">Password:</label>
            <input type="password" name="pwd"><br />
            <input id="submit" type="submit" value="Delete" name="submit">
        </form>

        </div>
</body>

</html>