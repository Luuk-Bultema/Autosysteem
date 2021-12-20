<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>

    <link rel="stylesheet" href="auto.css"/>
    <link rel="stylesheet" href="background.css"/>
</head>
<body>

<ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="overzicht2.php">Auto Overzicht</a></li>
    <li style="float:right"><a class="active" href="login.php">Login</a></li>
</ul>





<?php
require("config.php");
require("AutoController.php");
$ac = new AutoController();
if(isset($_POST['btnDelete'])){
    echo "Verwijderen maar!";
    $id = $_POST['txtId'];
    $ac->verwijderen($id);

}


if(isset($_POST['btnUpdate'])){
    echo "Updaten maar!";

    //Variabelen ophalen
    $id = $_POST["txtId"];
    $merk = $_POST['txtMerk'];
    $kenteken = $_POST['txtKenteken'];
    $kleur = $_POST['txtKleur'];
    $ac = new AutoController();
    $ac->wijzigen($id, $merk, $kenteken, $kleur);



}



if(isset($_GET['id'])){

    $id = $_GET['id'];
    echo "<h1>".$_GET['id']."</h1>";

    //STAP 1 - Query schrijven
    $query = "SELECT * FROM auto WHERE id = :id";
    //STAP 2 - Query inlezen
    $stm = $conn->prepare($query);
    //STAP 3 - Aliassen koppelen aan waarden
    $stm->bindparam(":id", $id);
    //STAP 4 - Query uitvoeren op de database
    if($stm->execute() == true)
    {
        $auto = $stm->fetch(PDO::FETCH_OBJ);
        if($auto != null)
        {

            ?>

            <form method="POST">
                <input value="<?php echo $auto->id; ?>" hidden type="text" name="txtId"/>
                <input placeholder="Merk" value="<?php echo $auto->merk; ?>" type="text" name="txtMerk"/>
                <input placeholder="Kenteken" value="<?php echo $auto->kenteken; ?>" type="text" name="txtKenteken"/>
                <input placeholder="Kleur" value="<?php echo $auto->kleur; ?>" type="text" name="txtKleur"/>
                <input type="submit" name="btnUpdate" value="Update"/>
                <input type="submit" name="btnDelete" value="Delete"/>

            </form>

            <?php


            echo $auto->merk;
            echo $auto->kenteken;
            echo $auto->kleur;

        } else Header("Location: overzicht2.php");

    }else { echo "Query kan niet uitgevoerd worden. Controleer de query!";}

}
?>

</body>
</html>