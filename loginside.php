<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="terminoppgave.css">
</head>
<body>
    
<?php
require_once "includes/nav.inc.php";
?>


    <!--form for innlogging, det i login.php skjer når man trykker submit--> 
<form class="userinfo" method="POST" action="includes/login.php">
<label for="username">Brukernavn:</label>
<input type="text" name="username"> <br>
<label for="pwd">Passord:</label>
<input type="password" name="pwd"> <br>

<input id="submit" type="submit" value="Logg inn" name="login">

</form> 

<h3>Ikke registrert bruker enda? Trykk <a href="createuser.php">HER</a> for å lage ny konto</h3>



</body>
</html>