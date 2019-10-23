<?php
include_once 'tools/header.php';
?>

<div class="container">
    <form action='includes/login.php' method='POST'>
        <input type="email" name='email'>
        <input type="password" name='password'>
    </form>
    <br><br><br><br>
    <form action='includes/signin.php' method='POST' enctype='multipart/form-data'>
        <input type="text" name='username'>''
        <input type="email" name="email">
        <input type="password" name="pass1">
        <input type='password' name='pass2'>
        <div class="file-field input-field">
            <div class="btn">
                <span>Foto</span>
                <input type="file" name='file'>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
    </form>
</div>
</body>
</html>
