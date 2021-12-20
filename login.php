<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="login.css"/>
</head>
<body>

<ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="autotoevoegen.php">Auto Toevoegen</a></li>
    <li style="float:right"><a class="active" href="login.php">Login</a></li>
</ul>


<button class="open-button" onclick="openForm()">Open Form</button>

<div class="form-popup" id="myForm">
    <form class="form-container" method="POST">
        <h1>Login</h1>

        <label for="email"><b>Gebruikersnaam</b></label>
        <input type="text" placeholder="" name="gebruikersnaam" required>

        <label for="psw"><b>Wachtwoord</b></label>
        <input type="password" placeholder="" name="wachtwoord" required>

        <button type="submit" name="login" class="btn">Login</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>







<?php
require("config.php");
if(isset($_POST['login'])){

    $gebruikersnaam = $_POST["gebruikersnaam"];
    $wachtwoord = $_POST['wachtwoord'];

    if ($gebruikersnaam != "" && $wachtwoord != ""){

        //data ophalen uit database
        $sql_query = "select * from login where gebruikersnaam='".$gebruikersnaam."' and wachtwoord='".$wachtwoord."'";
        //inlezen query
        $stm = $conn->prepare($sql_query);
        // statement uitvoeren
        $stm->execute();
        $login = $stm->fetch(PDO::FETCH_OBJ);
        //je voert uit op een object
        //als je op de login button klikt dan gaat hij iets doen omdat het niet gelijk is aan nul
        if($login != null){
            $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            header('Location: overzicht2.php');
        }else{
            echo "Ongeldige gebruikersnaam en/of wachtwoord";
        }

    }

}
?>

</body>
</html>
