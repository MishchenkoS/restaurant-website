<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
</head>
<body>
<header>
        <div id="logo"><img src="./img/logo.png" ></div>
        <div id="home"><a href="home.html" role="button">Главная</a></div>
        <div id="inf"><a href="inf.html" role="button">О нас</a></div>
        <div id="menu"><a href="index.php" role="button">Меню</a></div>
        <div id="contacts"><a href="#" role="button">Корзина</a></div>
        <div id="log"><a  href="login.php"><img src="./img/log.jpg"></a></div>
        <div id="entrance"><a  href="login.php" role="button">Вход</a></div>
    </header>
<body>
<div>

<?php
if($_COOKIE['login'] != ''){
  ?>
<div class='exit'>
  <a href='index.php'>&#8592; Назад</a>
  <div ><button class='button1' onclick='document.location=`index.php`' > Добавить в корзину</button></div>
  <div id='del'><button class='button1' onclick='document.location=`basket_delete.php?id=${id}`' >Очистить всю корзину</button></div>
  
</div>
<div class='table'>
<?php
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

$link = mysqli_connect(
    'localhost',  /* Хост, к которому мы подключаемся */
    'root',       /* Имя пользователя */
    '',   /* Используемый пароль */
    'restaurant');     /* База данных для запросов по умолчанию */

if (!$link) {
    printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}


if ($query1 = mysqli_query($mysql, "SELECT `basket`, `login` FROM `users` WHERE login = '$login'")){
  while ($user = mysqli_fetch_assoc($query1)){
    $basket = $user['basket'];
    $basket1 = explode(",", $basket);
    $basket1_count = count($basket1)-1;//Подсчитывает количество всех значений массива
    $basket1_number = array_count_values($basket1);//Подсчитывает количество отдельных значений массива
  }
}
echo "<div id='count'><p>Количество: ${basket1_count}</p></div>"; 
?>
<script>

      del.after(count); // берёт #text1 и после него вставляет #text3

</script>
<?php
foreach($basket1_number as $key => $item){ 
  if($result = mysqli_query($link, 'SELECT * FROM `menu` WHERE `id` = '.$key.'  LIMIT 100' )){
    while( $row = mysqli_fetch_assoc($result) ){ //Извлекает результирующий ряд в виде ассоциативного массива
          $photo = $row['photo'];
          $name = $row['name'];
          $money = $row['money']; 
          $id = $row['id'];
          $type = $row['type'];
          echo "
            <div class='str1'>
            <p class='number'>Количество: &ensp;";
              echo $item;
              echo" &ensp;
             </p>
              <button class='plus' onclick='document.location=`basket.php?id=${id}`'>+</button>
              <button class='minus' onclick='document.location=`basket_minus.php?id=${id}`' >-</button>
              <button class='delete' onclick='document.location=`basket_minus_minus.php?id=${id}`'>Удалить из корзины</button>
            <a class = 'a' href='bludo.php?id=${id}'> <div class='img'>
              
              <img class='photo' src='${photo}'>
              </div>
              <div class='text'>
              <div class='name'>${name}</div>
              <div class='money'>${money} грн</div>
              </div></a>
            </div>"; 
            
        }
      } 
      
    };
    
  

?>
</div>
</div>

<?php if ($basket == ""){
        echo "<p class='sorry'>Ваша корзина пока пуста</p>
        <footer class= 'footer1'>";
} else {
  echo "<footer>";
}
  ?>

  <?php } else {?>

    <div class='exit'>
  <a href='index.php'>&#8592; Назад</a>
  </div>

    <div class="login"><p class="sorry">Извините, вы не вошли в свой аккаунт. 
  Для доступа к возможности добавлять в корзину любимые блюда, пожалуйста, авторизируйтесь, перейдя на страницу "Вход" </p>
<button class="button" onclick="document.location='login.php'">Вхoд</button></div>

</div>
<footer class= "footer1">
  <?php }?>


        <div class="logo" id="lifecell">
          <img src="./img/lifecell1.png">
          <p>+38 093 310 3048</p>
        </div>
          <div class="logo"  id="instagram">
            <a href="https://instagram.com/julia_dubodel?igshid=7qye2qvjtdc7"><img src="./img/instagram.png"></a> 
          </div>
          <div class="logo" id="twitter">
            <a href="https://www.google.com/"><img src="./img/twitter.png"></a>
          </div>
          <div class="logo" id="telegram">
            <p>+38 093 310 3048</p>
            <img src="./img/telegram.png">
          </div>
          <div class="logo" id="kyivstar">
            <img src="./img/kyivstar.png">
            <p>+38 067 319 2626</p>
          </div>
          <div class="logo" id="facebook">
            <a href="https://www.google.com/"><img src="./img/facebook1.png"></a>
          </div>

          <div class="logo" id="gmail">
            <a href="https://www.google.com/"> <img src="./img/gmail.png"></a>
          </div>
          <div class="logo" id="viber">
            <p>+38 093 310 3048</p>
            <img src="./img/viber1.png">
          </div>
      </footer>


    <link rel="stylesheet" href="menu_style.css">
</body>
</html>