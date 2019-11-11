
<?php
$folderPath = "/";

$image_parts = explode(";base64,", $_POST['imagebase64']);

$image_type_aux = explode("/", $image_parts[0]);

$image_type = $image_type_aux[1];

$image_base64 = base64_decode($image_parts[1]);

$file = $folderPath . uniqid() . '.png';

file_put_contents($file, $image_base64);

/*
if (isset($_POST["submit"])) {
session_start();
include 'dbh.php';
if (!empty($_POST['username']) && !empty($_POST['']) && !empty($_POST['']) && !empty($_POST[''])) {
$username = mysqli_real_escape_string($conn, trim($_POST['username']));
$user_password = mysqli_real_escape_string($conn, trim(md5($_POST['password'])));
$user_email = mysqli_real_escape_string($conn, trim($_POST['email']));
$user_image = $_FILES['arquivo']['name'];

$sql_search = "SELECT count(*) as total from users where user_name = '$username'";
$result = mysqli_query($conn, $sql_search);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {
$_SESSION['erro_signin'] = "Nome de usuario já existente!";
header('location: ../signin.php');
exit();
}

$sql_insert = "INSERT INTO users (user_name, user_password, user_email, user_image, user_level) VALUES ('$username', '$user_password', '$user_email', '$user_image',1);";
$result_search = mysqli_query($conn, $sql_insert);

$dir = '../database/profiles/user/' . $username . '/';
mkdir($dir, 0777);

if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir . $user_image)) {
$conn->close();
header('location: ../login.php');
exit();
}
}
} else {
header("Location: ../signin.php");
exit();
}
