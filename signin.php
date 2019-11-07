<?php
include_once 'tools/head.php';
include_once 'tools/header.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js" integrity="sha256-EuV9YMxdV2Es4m9Q11L6t42ajVDj1x+6NZH4U1F+Jvw=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.css" integrity="sha256-cZDeXQ7c9XipzTtDgc7DML5txS3AkSj0sjGvWcdhfns=" crossorigin="anonymous" />

<style>
    .card .card-title{
        font-size:35px !important;
    }
    button{
        font-size:18px !important;
    }
    img {
      max-width: 100%;
    }

</style>
        <div class="row">
            <div class="card center-aling col s8 offset-s2 hoverable">
                <div class="card-content">
                    <span class="card-title">Cadastrar</span>
                    <br>
                    <form action="includes/login.php">

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
                            <div class="col s6  ">
                                <div>
                                    <label style='font-size:16px;' for="email">Email </label>
                                    <input style='font-size:20px;' name='email' id='email' type="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="image-container">
                        <form runat="server">
                            <h1>Image File Reader</h1>
                            <div>
                                Select an image file:
                                <input type="file" id="fileInput">
                            </div>
                            <div id="fileDisplayArea"></div>
                        </div>
                        <div class="center-align" style='margin-top:30px;'>
                            <button class="btn-large waves-effect waves-heavy hoverable" type="submit" name="action">Entrar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

</body>
<script>
window.onload = function() {

var fileInput = document.getElementById('fileInput');
var fileDisplayArea = document.getElementById('fileDisplayArea');


fileInput.addEventListener('change', function(e) {
    var file = fileInput.files[0];
    var imageType = /image.*/;

    if (file.type.match(imageType)) {
        var reader = new FileReader();

        reader.onload = function(e) {
            fileDisplayArea.innerHTML = "";

            var img = new Image();
            img.src = reader.result;

            fileDisplayArea.appendChild(img);
        }

        reader.readAsDataURL(file);
    } else {
        fileDisplayArea.innerHTML = "File not supported!"
    }
});
}

</script>

</html>
