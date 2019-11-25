<?php

session_start();
include_once 'dbh.php';

if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['text']) && !empty($_POST['obj'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $text = mysqli_real_escape_string($conn, $_POST['text']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $ano_obj = mysqli_real_escape_string($conn, $_POST['obj']);

    $sql_search = "SELECT count(*) as total from publication where publication_title = '$title'";
    $result = mysqli_query($conn, $sql_search);
    $row = mysqli_fetch_assoc($result);

    if ($row['total'] > 0) {
        $_SESSION['erro_publication'] = "Publicação já existente!";
        header('location: ../publication.php');
        exit();
    }

    $data = $_POST["OOF"];
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $imageName = uniqid() . '.png';
    file_put_contents($imageName, $data);

    $sql_insert = "INSERT INTO `publication`( `publication_title`, `publication_text`, `publication_datetime`, `publication_description`, `publication_main_image`, `object_date`, `user_id`) VALUES ('$title','$text',NOW(),'$description','$imageName','$ano_obj','" . $_SESSION['user_id'] . "' );";
    $result = mysqli_query($conn, $sql_insert);

    $sql_get_id = "SELECT publication_id from publication where publication_title = '$title'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql_get_id));

    $dir = '../database/publication/' . $row['publication_id'] . '/';
    mkdir($dir, 0777, true);
    $path = $dir . $imageName;
    rename($imageName, $path);

    header('location: ../index.php');
    exit();
} else {
    header("Location: ../publication.php");
    exit();
}
