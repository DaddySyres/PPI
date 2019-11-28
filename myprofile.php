<?php
include_once 'tools/head.php';
include_once 'tools/header.php';
include_once 'includes/dbh.php';

if (!isset($_SESSION['user_id'])) {
    header('location: index.php');
    exit();
}
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM users where user_id = '$id';";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
$dir = "database/profiles/user/" . $row['user_name'] . "/" . $row['user_image'];

?>
<div class="container">
    <br><br><br>
    <div class="row">
        <div class="col s10  offset-s1">
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row valign-wrapper">
                    <div class="col s2">
                        <img src="<?= $dir?>" alt="" class=""> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s9 offset-s1" >
                        <div class="row">
                            <span class="black-text">
                                <h5><?= $row['user_name']?></h5>
                            </span>
                        </div>
                        <div class="row">
                            <span class="black-text">
                                <h6><?= $row['user_email']?></h6>
                            </span>
                        </div>
                        <div class="row">
                            <span class="black-text">
                                <h6>Nivel: <?= $row['user_level']?></h6>
                            </span>
                        </div>
                        <div class="row">
                            <span class="black-text">
                                <h6>Id: <?= $row['user_id']?></h6>
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>