<?php

    foreach ($_GET as $key => $value) {
        # code..
        // print("$key<br/>");
        // print("$value<br/>");
        // print("<br/>");

        setcookie($key, $value);

    }    

    header("Location: ../2.券種/step2.php");
    exit;

?>