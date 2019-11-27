<?php
include_once 'tools/head.php';
include_once 'tools/header.php';

if (!isset($_SESSION['user_id'])) {
    header('location: index.php');
    exit();
}

?>
<div class="container">
        <ul class="collapsible" id="agh">
            <?php
                $query = "SELECT * from publication where user_id = " . $_SESSION['user_id'] . " ORDER BY publication_datetime DESC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $post[] = array($row['publication_id'], $row['publication_title'],  $row['publication_description'], $row['publication_text'], $row['object_date']);
                }
                foreach ($post as $value) { 
                if (true): ?>
                <li>
                    <div class="collapsible-header" id="">
                        <h6><?= $value[1]?></h6>
                    </div>
                    <div class="collapsible-body white" id="">
                            <table class="table striped">
                                <tr>
                                    <th>Título</th>
                                    <td><input type="text" id="title<?=$value[0]?>" value="<?= $value[1]?>"></td>
                                </tr>
                                <tr>
                                    <th>Descrição</th>
                                    <td><textarea class="materialize-textarea" id="description<?=$value[0]?>" ><?= $value[2]?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Texto</th>
                                    <td><textarea class="materialize-textarea" id="text<?=$value[0]?>"> <?= $value[3]?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Data do Objeto</th>
                                    <td><input type="number" id="obj_date<?=$value[0]?>" value="<?= (int)$value[4]?>"></td>
                                </tr>
                                <br>
                            </table>
                            <div class="row" style='padding-top:20px;'>
                                <div class="col s12">
                                    <a  class="btn" onclick='alterPost(<?=$value[0]?>)'>Alterar Postagem</a>
                                    <a  class="btn red" onclick="deletePost(<?=$value[0]?>)">Excluir postagem </a>
                                </div>
                            </div>
                    </div>
                </li>
            <?php endif;}?>
        </ul>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const options = {};
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems, options);
        });

        function deletePost(id) {
            var xhttp = new XMLHttpRequest();
            alert("tools/deletePost.php?id=" + id);
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('agh').innerHTML = this.responseText;
                }   
            };
            xhttp.open("GET", "tools/deletePost.php?id=" + id, true);
            xhttp.send();
        }
        function alterPost(id) {
            var title = document.getElementById('title' + id).value;
            var description = document.getElementById('description' + id).value;
            var text = document.getElementById('text' + id).value;
            var obj_date = document.getElementById('obj_date' + id).value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('agh').innerHTML = this.responseText;
                }   
            };
            xhttp.open("GET", "tools/update_post.php?id=" + id + "&title=" + title + "&description=" + description + "&text=" + text + "&obj_date=" + obj_date , true);
            xhttp.send();
        }
    </script>
</body>

</html>