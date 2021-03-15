<?php
 $mysql = mysqli_connect(
    'localhost',  /* Хост, к которому мы подключаемся */
    'root',       /* Имя пользователя */
    '',   /* Используемый пароль */
    'login');
if (!$mysql) {
    printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}

$id = $_COOKIE['id'];


$query ="DELETE FROM users WHERE id = '${id}'";
setcookie('login', $user['login'], time() - 3600*24, "/");
setcookie('id', $user['id'], time() - 3600*24, "/");
$result = mysqli_query($mysql, $query) or die("Ошибка " . mysqli_error($mysql)); 
mysqli_close($mysql);
header("Location: login.php");
?>