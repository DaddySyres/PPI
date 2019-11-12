
<?php

session_start();
include_once 'dbh.php';

if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $user_password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $user_email = mysqli_real_escape_string($conn, trim($_POST['email']));

    $sql_search = "SELECT count(*) as total from users where user_name = '$username'";
    $result = mysqli_query($conn, $sql_search);
    $row = mysqli_fetch_assoc($result);

    if ($row['total'] > 0) {
        $_SESSION['erro_signin'] = "Nome de usuario já existente!";
        header('location: ../signin.php');
        exit();
    }

    $dir = '../database/profiles/user/' . $username . '/';
    mkdir($dir, 0777);

    $data = $_POST["OOF"];
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $imageName = uniqid() . '.png';
    file_put_contents($imageName, $data);

    $image_path = $imageName;
    $image_true = $dir . $imageName;

    $sql_insert = "INSERT INTO users (user_name, user_password, user_email, user_image, user_level) VALUES ('$username', '$user_password', '$user_email', '$imageName',1);";
    $result_search = mysqli_query($conn, $sql_insert);

    rename($image_path, $image_true);
    header('location: ../login.php');
    exit();
} else {
    header("Location: ../signin.php");
    exit();
}
