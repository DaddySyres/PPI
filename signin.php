<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.css" integrity="sha256-M8o9uqnAVROBWo3/2ZHSIJG+ZHbaQdpljJLLvdpeKcI=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.js" integrity="sha256-u/CKfMqwJ0rXjD4EuR5J8VltmQMJ6X/UQYCFA4H9Wpk=" crossorigin="anonymous"></script>
<script src="assets/js/exif.js"></script>
<?php
include_once 'tools/head.php';
include_once 'tools/header.php';
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
                    <form action="includes/signin.php" id='form1' method='POST' enctype='multipart/form-data'>

                        <div class="row">
                            <div class="col s6">
                                <label style='font-size:16px;' for="user">Nome de usuario</label>
                                <input style='font-size:20px;' name='username' id='user' type="text" required>
                            </div>
                            <div class="col s6">
                                <label style='font-size:16px;' for="pass">Senha </label>
                                <input style='font-size:20px;' name='password' id='pass' type="password" required>                            </div>
                            </div>
                        <div class="row">
                            <div class="col s6">
                                <div class="file-field input-field" style='padding-top:9px;'>
                                    <div class="btn">
                                        <span>Imagem de perfil</span>
                                        <input type="file" name="upload_image" id="upload_image" />
                                    </div>
                                    <div class="file-path-wrapper" hide>
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col s6 ">
                                <div>
                                    <label style='font-size:16px;' for="email">Email </label>
                                    <input style='font-size:20px;' name='email' id='email' type="email" required>
                                </div>
                            </div>
                        </div>



                        <div class="row"  style='height:360px'>
                            <div class="col s4">
                                <div id="thefuck">
                                    <div id="image_demo" style="width:350px; margin-top:30px"></div>
                                </div>
                            </div>


                            <div class="col s4">
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
                    width:200,
                    height:200,
                    type:'square' //circle
                    },
                    boundary:{
                    width:300,
                    height:300
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
                   //    $('#form').submit();
            })
        });
    });
</script>

</body>
</html>
