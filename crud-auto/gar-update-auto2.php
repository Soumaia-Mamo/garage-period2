<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta name="author" content="Anjo Eijeriks">
        <meta charset="UTF-8">
        <title>gar-update-auto2.php </title>
    </head>
    <body>
        <h1> garage update auto 2 </h1>
        <p>
            <?php 

            $autokenteken= $_POST["autokentekenvak"];

            require_once "gar-connect-auto.php";

            $autos = $conn->prepare(" 
                                     select autokenteken,
                                      automerk,
                                      autotype,
                                      autokmstand,
                                       klantid
                                      from   auto
                                where   autokenteken = :autokenteken");
$autos->execute(["autokenteken" => $autokenteken]);

echo "<form action ='gar-update-auto3.php' method='post'>";
     foreach ($autos as $auto )
     {


         echo "autokenteken: <input type='text'" ;
         echo "name = 'autokentekenvak'";
         echo "value = '" .$auto["autokenteken"]. "' " ;
         echo "> </br>" ;

         echo " autotype : <input type='text' " ;
         echo "name = 'autotypevak'" ;
         echo "value = '" . $auto["autotype"]. "'" ;
         echo "> </br>" ;

         echo " automerk: <input type='text' " ;
         echo "name = 'automerkvak'" ;
         echo "value = '" . $auto["automerk"]. "'" ;
         echo "> </br>" ;

      
         echo " autokmstand : <input type='text' " ;
         echo "name = 'autokmstandvak'" ;
         echo "value = '" . $auto["autokmstand"]. "'" ;
         echo "> </br>" ;
     
     
         echo " klantid :". $auto["klantid"];
         echo " <input type='hidden' name='klantidvak' " ;
         echo "value = ' " . $auto["klantid"]."'> <br/> " ;
        }
         echo "<input type='submit'>";
         echo "</form>";
         ?>
         </body>
    </html>