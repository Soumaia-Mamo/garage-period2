<!doctype html>
<html lang="nl">
    <head>
        <meta name="author" content="Anjo Eijeriks">
        <meta charset="UTF-8">
        <title>gar-read-klant.php</title>  
    </head>
    <body>
        <h1>garage read klant</h1>
        <p>
            Dit zijn alle gegevens uit de 
            tabel klanten van de database garage.
        </p>
        <?php
            // tabel uitlezen en netjes afdrukken -----------------
            require_once "gar-connect-klant.php";

            $klanten = $conn->prepare("SELECT klantid,
                                               klantnaam,
                                               klantadres,
                                               klantpostcode,
                                               klantplaats
                                        FROM   klant
                                    ");
            $klanten->execute();

            echo "<tabel>";
                foreach($klanten as $klant)
                {
                    echo "<tr>";
                    echo "<td>" . $klant["klantid"] . "</td>" ."<br/>";
                    echo "<td>" . $klant["klantnaam"] . "</td>"."<br/>";
                    echo "<td>" . $klant["klantadres"] . "</td>"."<br/>";
                    echo "<td>" . $klant["klantpostcode"] . "</td>"."<br/>";
                    echo "<td>" . $klant["klantplaats"] . "</td>"."<br/>"."<br/>";
                    echo "<tr>";
                }
            echo "</tabel>";
            echo "<a href='../gar-menu.php'> terug naar het menu </a>";
        ?>
    </body>
</html>

