<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>

    <link rel="stylesheet" href="auto.css"/>
    <link rel="stylesheet" href="background.css"/>
</head>
<body>

<ul>
    <li><a class="active" href="homepage.php">Home</a></li>
    <li><a href="autotoevoegen.php">Auto Toevoegen</a></li>
    <li style="float:right"><a class="active" href="login.php">Login</a></li>
</ul>



    <div>
        <form method="POST">
            <label for="fname">Merk</label>
            <input type="text" id="merk" name="txtmerk" placeholder="Merk is   ..">

            <label for="lname">Kenteken</label>
            <input type="text" id="kenteken" name="txtkenteken" placeholder="Kenteken is..">

            <label for="lname">Kleur</label>
            <input type="text" id="kleur" name="txtkleur" placeholder="Kleur is..">



            <input type="submit" name="btnVerstuur" value="Submit">
        </form>
    </div>
</form>
<?php

require("config.php");
include("AutoController.php");
if(isset($_POST['btnVerstuur'])) {
    $id = 0;
    $merk = $_POST['txtmerk'];
    $kenteken = $_POST['txtkenteken'];
    $kleur = $_POST['txtkleur'];
    //aanmaken van het object vanuit de klasse AutoController
    $ac =  new AutoController();
    $ac->toevoegen($id, $merk, $kenteken, $kleur);
}
?>

</body>
</html>

