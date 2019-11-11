<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['username']) or !empty($_POST['password'])) {
        start_session();
        include_once 'dbh.php';
        $user = mysqli_real_escape_string($_POST[username]);
        $pass = mysqli_real_escape_string($_POST[password]);

        $query = "SELECT * from users where user_name = $pass;";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) < 1) {
            $_SESSION[erro_login] = "Usuario não cadastrado!";
            header('Location: ../login.php');
            exit();
        } else {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_password'] == md5($pass)) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_image'] = $row['user_image'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_level'] = $row['user_level'];
                header("location: index.php;");
                exit();
            } else {
                $_SESSION[erro_login] = "Senha incorreta!";
                header('Location: ../login.php');
                exit();
            }
        }
    } else {
        $_SESSION[erro_login] = "Campos requeridos não preenchidos!";
        header('Location: ../login.php');
        exit();
    }
} else {
    header('Location: ../login.php');
    exit();
}
