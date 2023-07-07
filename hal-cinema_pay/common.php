<?php
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    header("Location: step4.html?lastName=$lastName&firstName=$firstName&email=$email&phoneNumber=$phoneNumber");
    //aaaaa
?>