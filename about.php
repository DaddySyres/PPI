<?php
include_once 'tools/head.php';
include_once 'tools/header.php';

$sql = "SELECT * FROM aboutIffar where about_id = 1";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql) );

?>

<title>Sobre</title>

<br><br>
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <div class="container">
        <div class="row">
            <div class="col s8 offset-s2">
                <div class="card-panel">
                    <img class="responsive-img" src="database/aboutiffar/1/<?=$row['about_image'] ?>">
                    <div class="row">
                        <div class="col s12">
                            <h5>Sobre o Iffar</h5>
                            <p><?= $row['about_text']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>