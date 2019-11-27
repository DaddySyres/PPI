
<style>

</style>
<nav>
    <div class="nav-wrapper green lighten-1" style="">

    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <a href="index.php" class="brand-logo"><img src="assets/KAMP.png" style='height:60px;'><a href="index.php"  style='margin-left:90px;' class="brand-logo">KAMP</a></a>
        <ul class="right ">
            <?php if (!isset($_SESSION['user_id'])): ?>
                <li><a href="login.php">Entrar</a></li>
                <li><a href="signin.php">Cadastrar</a></li>
            <?php endif;?>
            <?php if ($_SESSION['user_id'] == 2): ?>
                <li><a href="includes/moderation.php">Moderação</a></li>
            <?php endif;?>
            <?php if (isset($_SESSION['user_id'])): ?>
            <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
                <li><a href="publication.php">Nova Publicação</a></li>
                <li><a href="includes/logout.php">Logout</a></li>
            <?php endif;?>

            <li class='active' style=' height:64px; '>
                <div class="row">
                    <div class="col s12">
                        <form action='search.php' method='GET'>
                            <div class="input-field">
                                <input id="search" type="search" name='search' required class='transparent'>
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
            <li><a href="search_date.php?date=2010">2010</a></li>
            <li><a href="search_date.php?date=2000">2000</a></li>
            <li><a href="search_date.php?date=1990">1990</a></li>
            <li><a href="search_date.php?date=1980">1980</a></li>
            <li><a href="search_date.php?date=1970">1970</a></li>
            <li><a href="search_date.php?date=1960">1960</a></li>
        </ul>
    </div>
</nav>


<ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view" >
            <div class="background" style ="background-color: #e9e9e9; "></div>
            <a><img class="circle" style='height:75px; width:75px;' src="<?="database/profiles/user/" . $_SESSION['user_name'] . "/" . $_SESSION['user_image'];?>"</a>
            <a><span style="font-size:24px; color:black;"  class="name"><?=$_SESSION['user_name']?></span></a>
            <a><span style=" color:black;" class="email"><?=$_SESSION['user_email']?> </span></a>
        </div>
    </li>
    <li><a href="mypublication.php" style="font-size:16px;" >Minhas Publicações<i class=" material-icons">add</i></a></li>
    <li><a href="myprofile.php" style="font-size:16px;" >Editar Perfil<i class="material-icons">account_circle</i></a></li>
    <li><div class="divider"></div></li>
    <?php if($_SESSION['user_level'] == 2):?>
    <li><a href="modarate.php" style="font-size:16px;" >Moderar Publicações<i class="material-icons">block</i></a></li>
    <li><a href="editabout.php" style="font-size:16px;" >Editar Sobre<i class="material-icons">home</i></a></li>
    <?php endif;?>

  </ul>

<script>
options = { hover: true, coverTrigger: false}
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);href="search_date.php?date=2010"
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });

</script>
