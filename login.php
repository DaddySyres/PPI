<?php
include_once 'tools/head.php';
include_once 'tools/header.php';
if (isset($_SESSION['user_id'])) {
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
</style>
        <div class="row">
            <div class="card center-aling col s4 offset-s4 hoverable">
                <div class="card-content">
                <span class="card-title">Entrar</span>
                <br>
                    <form action="includes/login.php" method='POST'>
                        <label style='font-size:16px;' for="user">Nome de usuario</label>
                        <input style='font-size:20px;' name='username' id='user' type="text" required>
                        <br>
                        <br>
                        <label style='font-size:16px;'   for="pass">Senha </label>
                        <input style='font-size:20px;' name='password' id='pass' type="password" required>
                        <br>
                        <?php if (isset($_SESSION['erro_login'])): ?>
                            <p style = "color:#FF0000;"><?=$_SESSION['erro_login']?></p>
                            <br>
                        <?php unset($_SESSION['erro_login']);endif;?>
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
</html>
