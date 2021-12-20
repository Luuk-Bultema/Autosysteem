<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>

    <link rel="stylesheet" href="overzicht.css"/>
    <link rel="stylesheet" href="background.css"/>
</head>
<body>

<ul>
    <li><a class="active" href="homepage.php">Home</a></li>
    <li><a href="overzicht2.php">Auto Overzicht</a></li>
    <li style="float:right"><a class="active" href="login.php">Login</a></li>
</ul>

<form method="POST">
    <input type="text" name='txtWaarde' />
    <input type="submit" name="btnZoek" value="Zoek"/>


</form>
<?php
require("Controller.php");
if(isset($_POST['btnZoek']))
{
    //aanmaken van het object vanuit de klasse Controller
    $cl = new Controller("localhost", "autos","root", "");
    $cl->geefOverzicht();
}

?>
</body>
</html>
