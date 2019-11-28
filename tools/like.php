<?php
session_start();

include_once"../includes/dbh.php";
if (isset($_GET['p']) && !empty($_GET['p']) && isset($_GET['u']) && !empty($_GET['u'])) {
    $id_post = $_GET['p'];
    $id_user = $_GET['u'];

    $sql = "SELECT count(*) as count from likes where  `publication_id` = $id_post and user_id = $id_user;";
    $fuck = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($fuck);
    if ($result["count"] == 0) {
        $sql = "INSERT INTO `likes`(`user_id`, `publication_id`) VALUES($id_user,$id_post);";
        mysqli_query($conn, $sql);

    } else {
        $sql = "DELETE FROM `likes` where `user_id` = $id_user AND `publication_id` = $id_post;";
        mysqli_query($conn, $sql);
    }

    $sql = "SELECT count(*) as suck from `likes` where `publication_id` = $id_post;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo "$row[suck]";
    exit();

}
