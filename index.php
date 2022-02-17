<!DOCTYPE html>
<html>
    <head>
        <title>An interesting title</title>
        <meta http-equiv="refresh" content="5">
    </head>
    <body>
        <h3>Project /'rubbish bin'</h3>
    </body>

    <?php
        // PHP is superior to js

        echo "<b>Rubbish bin 01:</b><br>";
        if (isset($_POST['status']) and isset($_POST['distance']) and isset($_POST['password'])) {
            if ($_POST['password'] == file_get_contents("password.txt")) {
                $_data = array("status"=>$_POST['status'], "distance"=>$_POST['distance']);
        
                file_put_contents("data.json", json_encode($_data));
                echo file_get_contents("data.json");
            }
        } else {
            echo "&nbsp;Status: ", json_decode(file_get_contents("data.json"), true)["status"], "<br>";
            echo "&nbsp;Distance to garbage: ", json_decode(file_get_contents("data.json"), true)["distance"], " cm";
        }
    ?>

</html>
