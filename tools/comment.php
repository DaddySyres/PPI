<?php
session_start();

include_once"../includes/dbh.php";
if (isset($_GET['p']) && !empty($_GET['p']) && isset($_GET['u']) && !empty($_GET['u']) && isset($_GET['t']) && !empty($_GET['t'])) {
    $id_post = $_GET['p'];
    $id_user = $_GET['u'];
    $text = $_GET['t'];

    
    
    
    $sql = "INSERT INTO comment(`comment`, `date`, `user_id`, `publication_id`) VALUES ('$text',NOW(),$id_user, $id_post);";
    mysqli_query($conn, $sql);

    $sql = "SELECT count(*) as suck from `comment` where `publication_id` = $id_post ORDER BY date DESC;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['suck'] > 0) {
        $sql = "SELECT * FROM comment WHERE `publication_id` = $id_post ORDER BY date ASC;";
        $result = mysqli_query($conn, $sql);
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $post[$i] = array($row['comment_id'], $row['comment'], $row['date'], $row['user_id'], $row['publication_id']);
            $i++;
        }
        foreach ($post as $comm) {
            $sql = "SELECT * FROM users where user_id = '$comm[3]'"; 
            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql)); 
            $dir = "database/profiles/user/" . $row['user_name'] . "/" . $row['user_image'];
            if (true): ?>
            <div class="row">
                <div class="col s1"><img class='circle' style='height:75px;' src="<?=$dir?>"></div>
            <div class="col s10">
                <h6 style='font-weight:bold;'><?=$row['user_name']?></h6>
                <div class="col s12">              
                    <h6><?=$comm[1]?><h6>
                </div>
            </div>
        </div>








        <?php endif;}}}?>
