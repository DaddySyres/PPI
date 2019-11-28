<?php
    session_start();
    $id = $_GET['id'];
    include_once"../includes/dbh.php";

    if(!empty($id)){
        $sql ="DELETE FROM `report` WHERE report_id = '$id';";
        mysqli_query($conn, $sql);
        var_dump($sql);var_dump($sql);
    }
?>
    <?php
                $query = "SELECT * from report where 1";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) == 0){
                    echo"<h3>Nenhuma Denuncia encontrada</h3> ";
                }   
                while ($denuncia = mysqli_fetch_assoc($result)) {
                    $query = "SELECT * from publication where publication_id = " . $denuncia['publication_id'] . " ORDER BY publication_datetime DESC";
                    $row = mysqli_fetch_assoc(mysqli_query($conn, $query));
                    $post[] = array($row['publication_id'], $row['publication_title'],  $row['publication_description'], $row['publication_text'], $row['object_date'], $denuncia['report_reason'], $denuncia['report_id']);
                }
                foreach ($post as $value) { 
                    var_dump($value);
                if (true): ?>
                <li>
                    <div class="collapsible-header" id="">
                        <h6>Razão dadenuncia: <?= $value[5]?></h6>
                    </div>
                    <div class="collapsible-body white" id="">
                            <table class="table striped">
                                <tr>
                                    <th>Título</th>
                                    <td><input type="text" id="<?=$value[6]?>title<?=$value[0]?>" value="<?= $value[1]?>"></td>
                                </tr>
                                <tr>
                                    <th>Descrição</th>
                                    <td><textarea class="materialize-textarea" id="<?=$value[6]?>description<?=$value[0]?>" ><?= $value[2]?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Texto</th>
                                    <td><textarea class="materialize-textarea" id="<?=$value[6]?>text<?=$value[0]?>"> <?= $value[3]?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Data do Objeto</th>
                                    <td><input type="number" id="<?=$value[6]?>obj_date<?=$value[0]?>" value="<?= (int)$value[4]?>"></td>
                                </tr>
                                <br>
                            </table>
                            <div class="row" style='padding-top:20px;'>
                                <div class="col s12">
                                    <a  class="btn" onclick='alterPost(<?=$value[6]?><?=$value[0]?>)'>Alterar Postagem</a>
                                    <a  class="btn green" onclick="deleteReport(<?=$value[6]?> )">Excluir Denuncia </a>
                                    <a  class="btn red" onclick="deletePost(<?=$value[0]?>)">Excluir Postagem </a>
                                </div>
                            </div>
                    </div>
                </li>
            <?php endif;}?>