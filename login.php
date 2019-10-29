<?php
include_once 'tools/head.php';
?>
<style>
html,
body {
  height: 100%;
}

body {
  font-family: 'Raleway', sans-serif;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 420px;
  padding: 15px;
  margin: auto;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group > input,
.form-label-group > label {
  height: 3.125rem;
  padding: .75rem;
}

.form-label-group > label {
  font-family: 'Raleway', sans-serif;
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0; /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  pointer-events: none;
  cursor: text; /* Match the input under the label */
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: 1.25rem;
  padding-bottom: .25rem;
}

.form-label-group input:not(:placeholder-shown) ~ label {
  padding-top: .25rem;
  padding-bottom: .25rem;
  font-size: 12px;
  color: #777;
}

/* Fallback for Edge
-------------------------------------------------- */
@supports (-ms-ime-align: auto) {
  .form-label-group > label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */
@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
  .form-label-group > label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}
</style>

<body>
        <form class="form-signin border border-black rounded shadow">
            <div class="text-center mb-4">
                <h1 class="h3 mb-5 border-bottom border-black "><span class="text-danger">M</span><span class="text-success">KAMP</span></h1>
                <h3 class="">Login</h3>
                <p class="">Para continuar use sua conta</p>
            </div>

            <div class="form-label-group">
                <input type="email" id="inputEmail" name='username' class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Nome de Usuario</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label name='password' for="inputPassword">Senha</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <a href="signin.php">Crie sua conta</a>
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" name='submit' type="submit">Sign in</button>
        </form>
</body>
</html>
