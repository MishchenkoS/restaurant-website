<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING) ;
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING) ;

    $password = md5($password."jfvdhushf5289");

    $mysql = mysqli_connect(
        'localhost',  /* Хост, к которому мы подключаемся */
        'root',       /* Имя пользователя */
        '',   /* Используемый пароль */
        'login');
    if (!$mysql) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }

    $query = mysqli_query($mysql, "SELECT * FROM `users` WHERE login = '$login' AND password = '$password'");
    $user = mysqli_fetch_assoc($query);
    if (count($user) == 0){
        $warning = urlencode("Такой пользователь не был найден. Проверьте, пожалуйста, свой логин и пароль");
        mysqli_close($mysql);  
        header("Location: login.php?warning=${warning}"); 
    } else{
    session_start(); 
    setcookie('login', $user['login'], time() + 3600*24, "/");
    setcookie('id', $user['id'], time() + 3600*24, "/");
    $_SESSION['auth'] = true; 
    $_SESSION['login'] = $user['login'];           
    $_SESSION['admin'] = $user['admin']; 

    mysqli_close($mysql);
    header("Location: login.php");
    }
?>