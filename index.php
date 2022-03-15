<!DOCTYPE html>
<html>
    <head>
        <title>An interesting title</title>
        <!--Refreshes the  website every 5 seconds-->
        <meta http-equiv="refresh" content="5">
    </head>
    <body>
        <h3>Project /'rubbish bin'</h3>
    </body>

    <?php
        // PHP is superior to js

        echo "<b>Rubbish bin 01:</b><br>";
        // Kollar om det finns en post funktion som innehåller den nödvendiga datan
        if (isset($_POST['status']) and isset($_POST['distance']) and isset($_POST['password'])) {
            // Kollar om passwordet som tas emot stämmer överens med paswordet lagrat.
            // Av säkerhetskäll är det sparade lösenordet krypterat med sha256.
            if (hash('sha256', $_POST['password']) == file_get_contents("password.txt")) {
                $_data = array("status"=>$_POST['status'], "distance"=>$_POST['distance']);
        
                // datan sparas i en json fil eftersom det är ett lätthnterat format
                file_put_contents("data.json", json_encode($_data));
                //echo file_get_contents("data.json");
            }
        } else {
            // Nästa gång någon går in på hemsidan kommer de se den inskickade datan
            echo "&nbsp;Status: ", json_decode(file_get_contents("data.json"), true)["status"], "<br>";
            echo "&nbsp;Distance to garbage: ", json_decode(file_get_contents("data.json"), true)["distance"], " cm";
        }
    ?>

</html>
