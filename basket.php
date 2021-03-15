<?php

$id = $_GET['id'];
$login = $_COOKIE['login'];

$mysql = mysqli_connect(
  'localhost',  /* Хост, к которому мы подключаемся */
  'root',       /* Имя пользователя */
  '',   /* Используемый пароль */
  'login');
if (!$mysql) {
  printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
  exit;
}

if ($query1 = mysqli_query($mysql, "SELECT * FROM `users` WHERE login = '$login'")){
  while($user = mysqli_fetch_assoc($query1)){
    $arr[]=$id;
    $id1 = $user['id'];
    $basket = implode(",", $arr);
    $query2= "UPDATE users SET basket = CONCAT('${basket}',',', basket)  WHERE  id = '${id1}'";
    $result = mysqli_query($mysql, $query2) or die("Ошибка" . mysqli_error($mysql));
  }
}

header("Location: basket_basket.php");











?>