<?php


include "connectpdo.php";

try {
    $stmt = $conn->prepare("INSERT INTO test (voornaam, achternaam, leeftijd) 
    VALUES (:voornaam, :achternaam, :leeftijd)");
    $stmt->bindParam(':voornaam', $voornaam);
    $stmt->bindParam(':achternaam', $achternaam);
    $stmt->bindParam(':leeftijd', $leeftijd);

    if (isset($_REQUEST['voornaam']))
 {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $leeftijd = $_POST['leeftijd'];
    $stmt->execute();

    
header('Location: pdoselect.php');
    }}
    
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>
<form method="post">
<table>
<tr><td>Voornaam</td><td><input name="voornaam" type="text" id="voornaam" value="Soumaia"></td></tr>

<tr><td>Achternaam</td><td><input name="achternaam" type="text" id="achternaam" value="Mamo"></td>

</tr><tr>
<tr><td>Leeftijd</td><td><input name="leeftijd" type="text" value="24"></td>
</tr>
</table></br>
<input type="submit" value="Verzenden"></td>
</form>    

