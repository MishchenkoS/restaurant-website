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
        <div id="menu"><a href="#" role="button">Меню</a></div>
        <div id="contacts"><a href="basket_basket.php" role="button">Корзина</a></div>
        <div id="log"><a  href="login.php"><img src="./img/log.jpg"></a></div>
        <div id="entrance"><a  href="login.php" role="button">Вход</a></div>
    </header>
  <div class="func">
    <form method="post" action="" class = "form">
      <select name="type1" class="select">
        <option disable value="vse">Все</option>
        <option value="Первое">Первое</option>
        <option value="Второе">Второе</option>
        <option value="Салат">Салат</option>
        <option value="Десерт">Десерт</option>
        <option value="Напитки">Напитки</option>
        <option value="Добавки">Добавки</option>
      </select>
      <input type="submit" value="Выбрать" class="input"/>
    </form>
  </div>


  <div class='table'>
  <?php
    $link = mysqli_connect(
      'localhost',  /* Хост, к которому мы подключаемся */
      'root',       /* Имя пользователя */
      '',   /* Используемый пароль */
      'restaurant');     /* База данных для запросов по умолчанию */

    if (!$link) {
      printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
      exit;
    }
    
    $type1=$_POST['type1'];
    if (!isset($_POST['type1'])){
      $result = mysqli_query($link, 'SELECT `photo`, `name`, `money`, `id`, `type` FROM `menu` LIMIT 100 ' );/* Посылаем запрос серверу */
    }else{
    $result = mysqli_query($link, "SELECT `photo`, `name`, `money`, `id`, `type` FROM `menu` WHERE type='$type1' OR '$type1'='vse' LIMIT 100 " ) ;
    } 
    if($result){
      while( $row = mysqli_fetch_assoc($result) ){ 
        $photo = $row['photo'];
        $name = $row['name'];
        $money = $row['money']; 
        $id = $row['id'];
        $type = $row['type'];
        echo "
          <div class='str'><a class='a' href='bludo.php?id=${id}'>
            <div class='img'><img class='photo' src='${photo}'></div>
            <div class='text'>
            <div class='name'>${name}</div>
            <div class='money'>${money} грн</div>
            </div></a>
          </div>"; 
      }
    } 
  ?>
  </div>


  <footer>
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
    <script src="menu_script.js" type="text/javascript"></script>
</body>
</html>