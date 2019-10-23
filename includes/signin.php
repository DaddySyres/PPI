<?php
    if(!isset($_POST['submit'])){
        header('Location: ../login_register.php');
        exit();
    }
    else{
        if(empty($_POST['username']) ||empty($_POST['email']) || empty($_POST['pass1']) || empty($_POST['pass2'])){
            header('Location: ../login_register.php');
            exit();
        }
        else{
            if(!empty($_POST[]))

        }
    }