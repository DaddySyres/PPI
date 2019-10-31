<?php
include_once 'tools/head.php';
include_once 'tools/header.php';
?>
        <div class="row">
            <div class="container">
                <div class="card center-aling col s6 offset-s3">
                    <form action="includes/login.php">

                        <h3>por favor de o cu</h3>

                        <div class="input-field" style=''>
                            <label style='font-size:16px;' for="user">Nome de usuario</label>
                            <input style='font-size:20px;' name='username' id='user' type="text" required>
                        </div>

                        <label style='font-size:16px;'   for="pass">Senha </label>
                        <input style='font-size:20px;' name='password' id='pass' type="text" required>

                        <br>
                        <button class="btn waves-effect waves-heavy" type="submit" name="action">Entrar
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
