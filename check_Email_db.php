<?php
    require_once 'dbconfig.php';
    if (!isset($_GET["email"]))
    {
        exit;
    }
    header('Content-Type: application/json');
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $email = mysqli_real_escape_string($conn, $_GET["email"]);
    $query = "SELECT email FROM utente WHERE email = '$email'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));
    mysqli_close($conn);
?>