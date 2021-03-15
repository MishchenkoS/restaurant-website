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
$id = $_POST['id'];
$query ="DELETE FROM menu WHERE id = '${id}'";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
mysqli_close($link);
header("Location: admin_menu1.html")
?>