
<style>

</style>

<nav>
    <div class="nav-wrapper green lighten-1" style="">
        <a href="index.php" class="brand-logo">MKAMP</a>
        <ul class="right hide-on-med-and-down">
            <?php if (!isset($_SESSION['user_id'])): ?>
                <li><a href="login.php">Entrar</a></li>
                <li><a href="signin.php">Cadastrar</a></li>
            <?php endif;?>
            <?php if ($_SESSION['user_id'] == 2): ?>
                <li><a href="includes/moderation.php">Moderação</a></li>
            <?php endif;?>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="#" data-target="slide-out" class="sidenav-trigger">ai e foda</a></li>
                <li><a href="publication.php">Nova Publicação</a></li>
                <li><a href="includes/logout.php">Logout</a></li>
            <?php endif;?>

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


<ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="images/office.jpg">
            </div>
            <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
            <a href="#name"><span class="white-text name">John Doe</span></a>
            <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div>
    </li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

<script>
options = { hover: true, coverTrigger: false}
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });

  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
  // var collapsibleElem = document.querySelector('.collapsible');
  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

</script>
