<?php
include_once 'tools/head.php';
?>
<style>

</style>

<div class="container" style='padding-top:70px;'>
    <div class="row">
        <div class="col-sm-4 offset-sm-4">
        <div class="container">
        <h1 class="text-center"><span class='text-danger'>M</span><span class='text-success'>KAMP</span></h1>
        <br><br>
        <p class="text-center mb-0">Por favor,</p>
        <p class="text-center mt-0">Digite suas informações para continuar</p>
        <form class="form-signin">
            <label for="inputEmail" class="sr-only">Nome de Usuario</label>
            <input type="email" id="inputEmail" class="form-control  border border-botton-0  " placeholder="Nome de Usuario" required autofocus>
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" id="inputPassword" class="form-control rounded-botton rounded-top-0" placeholder="Senha" required>
            <a class='text-prymary mt-1 mb-1' style='font-size:11px;' href="singin.php">Não tem conta?</a>
            <br>
            <button class="btn btn-sm btn-primary btn-block mt-1" type="submit">Sign in</button>
        </form>
        </div>
    </div>

</body>
</html>
