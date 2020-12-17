<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta name="author" content="Anjo Eijeriks">
        <meta charset="UTF-8">
        <title>gar-update-klant3.php </title>
    </head>
    <body>
    <h1> garage update klant 3 </h1>
<p>klantgegevens wijzigen in de tabel 
    klant van de database garage 
</p>
<?php 
            $klantid= $_POST["klantidvak"];
            $klantnaam= $_POST["klantnaamvak"];
            $klantadres= $_POST["klantadresvak"];
            $klantpostcode= $_POST["klantpostcodevak"];
            $klantplaats= $_POST["klantplaatsvak"];

        require_once "gar-connect-klant.php";

        $sql = $conn->prepare 
        ("
          update klant set   klantnaam  = :klantnaam,
                             klantadres  = :klantadres,
                            klantpostcode  = :klantpostcode,
                            klantplaats    = :klantplaats 
                            where klantid = :klantid") ;

        $sql->execute 
        ([ 
            "klantid" => $klantid,
            "klantnaam" => $klantnaam,
            "klantadres"  => $klantadres,
           "klantpostcode" => $klantpostcode,
           "klantplaats"   => $klantplaats 
        ]) ;

        echo "De klant is gewijzigd . <br/>";
        echo "<a href='../gar-menu.php'> terug naar het menu </a>";
        ?>
        </body>
</html>
