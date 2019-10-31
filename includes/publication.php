<?php
if (isset($_POST['submit'])) {
    session_start();
    include_once "dbh.php";

    if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['text'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $text = mysqli_real_escape_string($conn, $_POST['text']);

    } else {
        $_SESSION['erro_publication'] = "Campos obrigatorios não foram preenchidos";
        header('Location: ../create_publication.php');
        exit();
    }

} else {
    header('Location: ../create_publication.php');
    exit();
}
