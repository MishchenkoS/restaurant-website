<?php
    setcookie('login', $user['login'], time() - 3600*24, "/");
    setcookie('id', $user['id'], time() - 3600*24, "/");
    header("Location: login.php");
?>