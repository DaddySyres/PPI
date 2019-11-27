<?php
include_once 'tools/head.php';
include_once 'tools/header.php';
?>

<title>HOME</title>

<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<link href="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/gallery-materialize.min.opt.css?0" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/prism.css?0" rel="stylesheet">

<style>
img {
    max-width:400px;
}

.gj{
    font-size:20px; !important
    margin-top:0; !important
}
</style>

<div id="documentation" class="cx gray">
    <div class="db">
        <div class="">
            <div class="d gu hz">
                <div id="gallery-expand" class="scrollspy">
                    <h3>Ultimas postagens</h3>
                    <p class="ef">Encontre as ultimas postagens dessa incrível comunidade.</p>
                    <div class="b e">

                    <?php
                        $query = 'SELECT * from publication ORDER BY publication_datetime DESC';
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $post[] = array($row['publication_id'], $row['user_id'], $row['publication_title'], $row['publication_datetime'], $row['publication_description'], $row['publication_main_image'], $row['object_date']);
                        }
                        foreach ($post as $value) {
                            $path_publication = "database/publication/" . $value[0] . "/" . $value[5];
                            if (true): 
                    ?>
                        <div class="d hf gu gallery-expand" style='margin-top:25px;'>
                            <div class="gallery-curve-wrapper">
                                <a class="gallery-cover gray">
                                    <img  class="responsive-img"  src="<?=$path_publication?>" crossOrigin="anonymous" alt="placeholder">
                                </a>
                                <div class="gallery-header">
                                    <span><?=$value['2']?></span>
                                </div>
                                <div class="gallery-body">
                                    <div class="title-wrapper">
                                        <h3><?=$value['2']?></h3>
                                        <span class="gj"><?=$value['6']?></span><br>
                                    </div>
                                    <p class='fi'>
                                        <?=$value['4']?>
                                    </p>
                                </div>
                                <div class="gallery-action">
                                <a  class=" btn-large pink " style='font-size: 16px' id='f<?=$value[0]?>'>
                                <?php
                                    $sql = "SELECT count(*) as suck from `likes` where `publication_id` = $value[0];";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo "$row[suck]";
                                ?>
                                </a>

                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <a  class="btn btn-large red hoverable" id='<?=$value[0]?>' onclick="like(this.id, <?=$_SESSION['user_id']?>)"><i class="large material-icons">favorite</i></a>
                                <?php endif;?>
                                <a class="btn-float btn-large green hoverable"  id='<?=$value[0]?>' onclick="goaway(this.id)" type='submit' ><i class="large material-icons">add</i></a>
                                </div>
                            </div>
                        </div>
                    <?php endif;}?>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container -->
    <script>
        function goaway(id){
            window.location.href = "object.php?id=" +id ;
        }
        function like(post_id, user_id){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var fuck  = this.responseText;
                    var posh_cunt = "f" + post_id;
                    document.getElementById(posh_cunt).innerHTML = fuck;
                }
            };
            xhttp.open("GET", "tools/like.php?p=" + post_id + "&u="+user_id, true);
            xhttp.send();
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/materialize/0.98.0/js/materialize.min.js"></script>
    <script src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/gallery-docs.min.opt.js?0" crossOrigin="anonymous"></script>
</body>
</html>
