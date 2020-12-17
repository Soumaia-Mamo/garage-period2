<!doctype html>
<html lang="nl">
    <head>
        <meta name="author" content="Anjo Eijeriks">
        <meta chatset="UTF-8">
        <title>gar-delete-auto2.php</title>  
    </head>
    <body>
        <h1>garage delete auto 2</h1>
        <p>
           Op autokenteken gegevens zoeken uit de
           tabel auto van de database garage
           zodat ze verwijderd kunnen worden.
        </p>
        <?php
            $autokenteken = $_POST["autokentekenvak"];

            require_once "gar-connect-auto.php";

             $autos = $conn->prepare("
                                        select autokenteken,
                                               automerk,
                                               autotype,
                                               autokmstand,
                                               klantid
                                        from   auto
                                        where autokenteken = :autokenteken");
            $autos->execute(["autokenteken" => $autokenteken]);
        
            echo "<tabel>";
            foreach($autos as $auto)
                {
                    echo "<tr>";
                    echo "<td>" . $auto["autokenteken"] . " , "."</td>";
                    echo "<td>" . $auto["autotype"] . " , "."</td>";
                    echo "<td>" . $auto["automerk"] ." , ". "</td>";
                    echo "<td>" . $auto["autokmstand"] . " , "."</td>";
                    echo "<td>" . $auto["klantid"] . " . "."</td>";
                    echo "<tr>";
                }
            echo "</tabel><br />";

            echo "<form action='gar-delete-auto3.php' method='post'>";
                echo "<input type='hidden' name='autokentekenvak' value=$autokenteken>";
                echo "<input type='hidden'name='verwijdervak' value='0'>";
                echo "<input type='checkbox' name='verwijdervak' value='1'>";
                echo "Verwijder deze auto. <br />";
                echo "<input type='submit'>";
            echo "</form>";
        ?>
    </body>
</html>