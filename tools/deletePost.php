<?php
    session_start();
    $id = $_GET['id'];
    $conn = mysqli_connect('localhost', 'dar', 'usbw', 'PPI');

    if(!empty($id)){
        $sql ="DELETE FROM `publication` WHERE publication_id = '$id';";
        mysqli_query($conn, $sql);
?>
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
            <?php endif;}}?>