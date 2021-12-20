<?php




class Controller
{
    private $conn;

    public function __construct($host, $dbnaam, $gebruiker, $ww)
    {

        $conn = new PDO("mysql:host=$host;dbname=$dbnaam;",
            $gebruiker, $ww);
        $this->conn = $conn;
    }

    public function geefOverzicht()
    {
        $zoek = "%" . $_POST['txtWaarde'] . "%";
        //STAP 1 - Query schrijven
        $query = "SELECT * FROM auto WHERE merk like :waarde 
				  OR kenteken like :waarde OR kleur like :waarde" ;
        //STAP 2 - Inlezen van de query
        $stm = $this->conn->prepare($query);
        //STAP 3 - Aliassen koppelen aan waarden
        $stm->bindparam(":waarde", $zoek);
        //STAP 4 - Uitvoeren van de query
        if ($stm->execute() == true) {
            //STAP 5 - Resultaten ophalen
            $result = $stm->fetchall(PDO::FETCH_OBJ);
            //STAP 6 - Doorlopen van de resultaten
            foreach ($result as $auto) {
                echo "<a class='link' href='details.php?id=$auto->id'><br>$auto->id Kenteken: " . $auto->kenteken .
                    "Merk: " . $auto->merk . "Kleur: " . $auto->kleur."</a>";
            }

        } else echo "Query mislukt!";

    }




}