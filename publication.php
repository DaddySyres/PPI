<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.css" integrity="sha256-M8o9uqnAVROBWo3/2ZHSIJG+ZHbaQdpljJLLvdpeKcI=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.js" integrity="sha256-u/CKfMqwJ0rXjD4EuR5J8VltmQMJ6X/UQYCFA4H9Wpk=" crossorigin="anonymous"></script>
<script src="assets/js/exif.js"></script>
<?php
include_once 'tools/head.php';
include_once 'tools/header.php';
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
}
?>
<style>
    .card .card-title{
        font-size:35px !important;
    }
    button{
        font-size:18px !important;
    }
    img {
      max-width: 80%;
    }
</style>

        <div class="row">
            <div class="card center-aling col s8 offset-s2 hoverable">
                <div class="card-content">
                    <span class="card-title">Cadastrar</span>
                    <br>
                    <form action="includes/publication.php" id='form1' method='POST' enctype='multipart/form-data'>

                        <div class="row">
                            <div class="col s12">
                                <label style='font-size:16px;' for="title">Título</label>
                                <input style='font-size:20px;' name='title' id='title' type="text" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <label style='font-size:16px;' for="textarea1">Descrição</label>
                                <textarea style='font-size:20px;' name='description' id="textarea1" class="materialize-textarea validate"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col s12">
                                <label style='font-size:16px;' for="textarea2">Texto Principal</label>
                                <textarea style='font-size:20px;' name='text' id="textarea2" class="materialize-textarea validate"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s6">
                                <div class="file-field input-field" style='padding-top:9px;'>
                                    <div class="btn">
                                        <span>Imagem principal</span>
                                        <input type="file" name="upload_image" id="upload_image" />
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col s2">

                                <label style='font-size:16px;' for="obj">Ano do Objeto</label>
                                <input style='font-size:20px;' name='obj'  min="1969" max="2019" value='2019' id='title' type="number" required>
                            </div>
                        </div>



                        <div class="row" >
                            <div class="col s4"  style='height:750px'>
                            <label style='font-size:24px;' for="">Foto Principal</label>
                                <div id="thefuck">
                                    <div id="image_demo" style="width:350px; margin-top:30px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row"></div>
                            <div class="col s4 offset-s4" style='height:200px' >
                                <div class="center-align" style='margin-top:60px;'>
                                    <input type="hidden" name='OOF' id='imagebase64'>
                                    <button class="btn-large waves-effect waves-heavy hoverable" id='crop_image' name="action">Salvar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $image_crop = $('#image_demo').croppie({
                    enableExif: true,
                    viewport: {
                        width:900,
                        height:600,
                        type:'square' //circle
                    },
                    boundary:{
                        width:1000,
                        height:700
                    }
                });

                $('#upload_image').on('change', function(){
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        $image_crop.croppie('bind', {
                            url: event.target.result
                        }).then(function(){
                            console.log('jQuery bind complete');
                        });
                    }
                    reader.readAsDataURL(this.files[0]);
                });


                $('#crop_image').click(function(event){
                    $image_crop.croppie('result', {
                        type: 'canvas',
                        size: 'viewport'
                    }).then(function(response){
                        $('#imagebase64').val(response);
                    })
                });


            });
</script>

</body>
</html>
