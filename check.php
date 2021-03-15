<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING) ; //Удаляет теги, при необходимости удаляет или кодирует специальные символы.
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING) ;
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING) ;
    $password_1 = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING) ;


    $mysql = mysqli_connect(
        'localhost',  /* Хост, к которому мы подключаемся */
        'root',       /* Имя пользователя */
        '',   /* Используемый пароль */
        'login');
    if (!$mysql) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }

    $password = md5($password."jfvdhushf5289");
    $query2 = "INSERT INTO users (login, password, name) VALUES ('$login', '$password', '$name');";
    $result = mysqli_query($mysql, $query2);

    if (!mysqli_error($mysql)){
        $str = urlencode("Вы зарегестрированы");
        mysqli_close($mysql); 
        header("Location: login.php?str=${str}"); 
    } else{
        $str = urlencode("Такой пользователь уже существует. Введите, пожалуйста, другой логин");
        mysqli_close($mysql);  
        header("Location: login.php?str=${str}"); 
    }
               
?>