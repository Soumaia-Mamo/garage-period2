<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta name="author" content="Anjo Eijeriks">
        <meta charset="UTF-8">
        <title>gar-update-auto3.php </title>
    </head>
    <body>
    <h1> garage update auto3 </h1>
<p>autogegevens wijzigen in de tabel 
    klant van de database garage 
</p>
<?php 
            $autokenteken= $_POST["autokentekenvak"];
            $autotype= $_POST["autotypevak"];
            $automerk= $_POST["automerkvak"];
            $autokmstand= $_POST["autokmstandvak"];

        require_once "gar-connect-auto.php";

        $sql = $conn->prepare
        ("  
        update auto set      autokenteken  = :autokenteken,
                             autotype  = :autotype,
                             automerk  = :automerk, 
                             autokmstand = :autokmstand
                             where autokenteken = :autokenteken") ;

        $sql->execute 
        ([ 
            "autokenteken" => $autokenteken,
            "autotype" => $autotype,
            "automerk" => $automerk,
           "autokmstand" => $autokmstand
        ]) ;

        echo "De auto is gewijzigd . <br/>";
        echo "<a href='../gar-menu.php'> terug naar het menu </a>";
        ?>
        </body>
</html>
           