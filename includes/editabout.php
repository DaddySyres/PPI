<?php

session_start();
include_once 'dbh.php';

if ( !empty($_POST['text'])) {
    $text = mysqli_real_escape_string($conn, $_POST['text']);


    $data = $_POST["OOF"];
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $imageName = uniqid() . '.png';
    file_put_contents($imageName, $data);

    $sql_UPDATE = "UPDATE `aboutIffar` SET `about_image` = '$imageName',`about_text`= '$text' where about_id = 1;";
    mysqli_query($conn, $sql_UPDATE);
    var_dump($sql_UPDATE);

    $sql_get_id = "SELECT about_id from aboutIffar where about_id = 1";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql_get_id));
    var_dump($row);
    $dir = '../database/aboutiffar/' . $row['about_id'] . '/';
    mkdir($dir, 0777, true);
    $path = $dir . $imageName;
    rename($imageName, $path);

    header('location: ../about.php');
    exit();
} else {
    header("Location: ../aboutiffar.php");
    exit();
}
