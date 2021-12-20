<?php


class AutoController
{
    private $conn;

    function __construct()

    {
        $host = "localhost";
        $dbnaam = "autos";
        $gebruiker = "root";
        $ww = "";

        //this verwijst naar jouw variabele
        $this->conn = new PDO("mysql:host=$host;dbname=$dbnaam;",
            $gebruiker, $ww);


    }


    function toevoegen($id, $merk, $kenteken, $kleur)
    {
        //STAP 1 - Query schrijven
        $query = "INSERT into auto VALUES (:id, 
                                                :merk, 
                                                :kenteken, 
                                                :kleur)";


        //STAP 2 - query inlezen
        $stm = $this->conn->prepare($query);
        //Stap 3 Koppelen van aliassen aan waarden
        $stm->bindparam(":id", $id);
        $stm->bindparam(":merk", $merk);
        $stm->bindparam(":kenteken", $kenteken);
        $stm->bindparam(":kleur", $kleur);
        //STAP 4 - Query uitvoeren naar de database
        if ($stm->execute() == true) {
            echo "<b>Gegevens succesvol opgeslagen!!</b>";

        } else echo "Geen gegevens verstuurd!!";

    }


    function wijzigen($id, $merk, $kenteken, $kleur)
    {

        //STAP 1 - Query schrijven
        $query = "UPDATE auto SET merk = :merk,
                 kenteken = :kenteken, kleur = :kleur
                                    WHERE id = :id";
        //STAP 2 - query inlezen
        $stm = $this->conn->prepare($query);
        //STAP 3 - Aliassen koppelen aan waarden
        $stm->bindparam(":id", $id);
        $stm->bindparam(":merk", $merk);
        $stm->bindparam(":kenteken", $kenteken);
        $stm->bindparam(":kleur", $kleur);


        //STAP 4 - Query uitvoeren naar de database
        if ($stm->execute() == true) {
            echo "Update sucessvol!!";
        }

    }

    function verwijderen($id)
    {
        //STAP 1 - Query schrijven
        $query = "DELETE FROM auto WHERE id = :id";
        //STAP2  - Query inlezen
        $stm = $this->conn->prepare($query);
        //STAP 3 - Aliassen koppelen aan waarden
        $stm->bindparam(":id", $id);
        //STAP 4 - Uitvoeren naar de database
        if ($stm->execute() == true) {
            echo "Query DELETE gelukt!!";

        }


    }
}





