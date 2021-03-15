<?php
$link = mysqli_connect(
    'localhost',  /* Хост, к которому мы подключаемся */
    'root',       /* Имя пользователя */
    '',   /* Используемый пароль */
    'restaurant');
if (!$link) {
    printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}

$hz= $_POST['link'];
$name= $_POST['name'];
$ingredients= $_POST['ingredients'];
$money= $_POST['money'];
$weight= $_POST['weight'];
$type= $_POST['type'];

$query = "INSERT INTO menu (photo, name, ingredients, money, weight, type) VALUES ('$hz', '$name', '$ingredients', '$money',' $weight', '$type');";
$result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));

mysqli_close($link);
header("Location: admin_menu1.html")
?>
