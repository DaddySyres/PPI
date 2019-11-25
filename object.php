<?php
include_once 'tools/head.php';
include_once 'tools/header.php';

if (!isset($_GET['id'])) {
    header('location: index.php');
    exit();
}
?>

<title>HOME</title>


<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

<div class="container ">
    <div class="row">
        <div class="col s10 offset-s1">

            <?php
$id = $_GET['id'];
$query = "SELECT * from publication where publication_id = $id;";
$result = mysqli_query($conn, $query);
$i = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $post[$i] = array($row['publication_id'], $row['user_id'], $row['publication_title'], $row['publication_datetime'], $row['publication_description'], $row['publication_main_image'], $row['publication_text'], $row['object_date']);
    $i++;
}

foreach ($post as $value) {
    $path_publication = "database/publication/" . $value[0] . "/" . $value[5];
    if (true): ?>

<div class="card">
    <div class="card-image waves-effect waves-block waves-light">

        <img class="activator" src="<?=$path_publication?>">
    </div>
    <div class="card-content">
        <span class="card-title activator grey-text text-darken-4" style="font-size:20px; font-family: 'Lato', sans-serif;"><?=$value[2]?><i class="material-icons right">more_vert</i></span>
        <p style="font-size:20px; font-family: 'Lato', sans-serif;"><?=$value[4]?></p>
        <br><br><br><br>
        <div class="row" style='height:60px;'>
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="col s12">
                <a  class=" btn-large pink " style='font-size: 16px' id='f<?=$value[0]?>'>
                <?php
$sql = "SELECT count(*) as suck from `likes` where `publication_id` = $value[0];";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo "$row[suck]";
    ?>
                </a>
                    <a  class="btn btn-large red hoverable waves-effect waves-light" style='font-size: 16px'  id='<?=$value[0]?>' onclick="like(this.id, <?=$_SESSION['user_id']?>)"><i class="large material-icons">favorite</i></a>
                    <a class="btn btn-large green hoverable waves-effect waves-light modal-trigger" href="#modal2">Comentar</a>
                    <a class="waves-effect waves-light btn btn-large modal-trigger" href="#modal1">Denunciar</a>
                </div>
            <?php endif;?>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <div class="col s12">
                    <a href='login.php' class="btn btn-large blue hoverable waves-effect waves-light">Faça login para Continuar</a>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="card-reveal">
        <span class="card-title grey-text text-darken-4"><?=$value[2]?><i class="material-icons right">close</i></span>
        <p style="font-size:20px; font-family: 'Lato', sans-serif;"><?=$value[6]?></p>
        </div>
  </div>

  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Denunciar</h4>
      <p>Escolha o motivo da denuncia</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-red btn-flat">Cancelar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Enviar</a>
    </div>
  </div>

  <div id="modal2" class="modal">
    <div class="modal-content">
        <h4>Comentarar</h4>
        <textarea id="textarea1" class="materialize-textarea"></textarea>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-red btn-flat">Cancelar</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Enviar</a>
    </div>
  </div>

<?php endif;}?>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.modal');
                var instances = M.Modal.init(elems, options);
            });

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
</body>
</html>
