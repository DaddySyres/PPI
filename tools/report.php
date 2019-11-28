<?php
session_start();
include_once"../includes/dbh.php";
if (isset($_GET['p']) && !empty($_GET['p']) && isset($_GET['u']) && !empty($_GET['u']) && isset($_GET['t']) && !empty($_GET['t'])) {
    $id_post = $_GET['p'];
    $id_user = $_GET['u'];
    $text = $_GET['t'];

    $sql = "SELECT count(*) as suck from `report` where `publication_id` = $id_post AND user_id = $id_user AND report_reason = $text; ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['suck'] == 0) {
        $sql = "INSERT INTO report(report_reason, user_id ,publication_id) VALUES ('$text',$id_user, $id_post);";
        mysqli_query($conn, $sql);
    }
}