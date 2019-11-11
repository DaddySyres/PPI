
<style>

</style>
<nav>
    <div class="nav-wrapper green lighten-1" style="">
        <a href="index.php" class="brand-logo">MKAMP</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="login.php">Entrar</a></li>
            <li><a href="signin.php">Cadastrar</a></li>
            <li class='active' style=' height:64px; '>
                <div class="row">
                    <div class="col s12">
                        <form action='' method=''>
                            <div class="input-field">
                                <input id="search" type="search" required class='transparent'>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>
                </div>
            </li>
            <li class='active'><a class="dropdown-trigger" href="#!" data-target="oof">Décadas<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        <ul id="oof" class="dropdown-content">
            <li><a href="search">2010</a></li>
            <li><a href="#!">2000</a></li>
            <li><a href="#!">1990</a></li>
            <li><a href="#!">1980</a></li>
            <li><a href="#!">1970</a></li>
            <li><a href="#!">1960</a></li>
        </ul>
    </div>
</nav>
<script>
options = { hover: true, coverTrigger: false}
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
});

</script>
