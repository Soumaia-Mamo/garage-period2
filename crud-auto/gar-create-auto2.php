<!doctype html>
<html lang="nl">
    <head>
        <meta name="author" content="Anjo Eijeriks">
        <meta charset="UTF-8">
        <title>gar-create-auto2.php</title>
    </head>
    <body>
        <h1>Garage create auto 2</h1>
       <p>
           Een auto toevoegen aan de tabel
           auto in de database garage.
       </p>
       
       <?php

$autokenteken  = $_POST["autokentekenvak"];
$automerk     = $_POST["automerkvak"];
$autotype  = $_POST["autotypevak"];
$autokmstand   = $_POST["autokmstandvak"];
$klantid     = NULL; 


require_once "gar-connect-auto.php";

$sql = $conn->prepare("
                         insert into auto values
                         (
                             :autokenteken, :automerk, :autotype,
                             :autokmstand, :klantid
                             )
                      ");

// manier 1 (of manier 2 gebruiken) -------------------------------
// $sql->bindParam(":klantid",            $klantid);    
// $sql->bindParam(":klantnaam",          $klantnaam);    
// $sql->bindParam(":klantadres",         $klantadres);    
// $sql->bindParam(":klantpostcode",      $klantpostcode);    
// $sql->bindParam(":klantplaats",        $klantplaats);

//  $sql-> execute ();

// manier 2 -------------------------------------------------------
$sql->execute([
                "autokenteken"         => $autokenteken,
                "autotype"             => $autotype, 
                "automerk"             => $automerk,  
                "autokmstand"          => $autokmstand,  
                "klantid"              => $klantid,       
              ]);

// $sql->execute(array('autokenteken' => $_GET['autokenteken'] , 'autotype' => $_GET['autotype'] ,  'automerk' => $_GET['automerk'] , 'autokmstand' => $_GET['autokmstand'] ,'klantid' => $_GET['klantid']));
echo "De auto is toegevoegd <br />";
echo "<a href='../gar-menu.php'> terug naar het menu </a>";              
?>
    </body>
    </html>

