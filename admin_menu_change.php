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
$hz= $_POST['link'];
$name= $_POST['name'];
$ingredients= $_POST['ingredients'];
$money= $_POST['money'];
$weight= $_POST['weight'];
$type= $_POST['type'];


if($hz != ''){
    $query = "UPDATE menu SET photo = '$hz' WHERE  id = '${id}'";
    $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
}

if($name != ''){
    $query = "UPDATE menu SET name = '$name' WHERE  id = '${id}'";
    $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
}

if($ingredients != ''){
    $query = "UPDATE menu SET ingredients = '$ingredients' WHERE  id = '${id}'";
    $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
}

if($money != ''){
    $query = "UPDATE menu SET money = '$money' WHERE  id = '${id}'";
    $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
}

if($weight != ''){
    $query = "UPDATE menu SET weight = '$weight' WHERE  id = '${id}'";
    $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
}

if($type != ''){
    $query = "UPDATE menu SET type = '$type' WHERE  id = '${id}'";
    $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
}


mysqli_close($link);
header("Location: admin_menu1.html")
?>