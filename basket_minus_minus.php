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
    $basket = $user['basket'];
    
    $basket1 = explode(",", $basket);

    foreach($basket1 as $key => $item){
        if ($item == $id){
          unset($basket1[$key]);
        }
    }

    $basket = implode(",", $basket1);
    $query2= "UPDATE users SET basket = '${basket}'  WHERE  login = '${login}'";
    $result = mysqli_query($mysql, $query2) or die("Ошибка" . mysqli_error($mysql));
  }
}

header("Location: basket_basket.php");


?>