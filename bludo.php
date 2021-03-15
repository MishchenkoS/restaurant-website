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
        <div id="contacts"><a href="basket_basket.php" role="button">Корзина</a></div>
        <div id="log"><a  href="login.php"><img src="./img/log.jpg"></a></div>
        <div id="entrance"><a  href="login.php" role="button">Вход</a></div>
    </header>


  <?php
  $id = $_GET['id'];
  $link = mysqli_connect(
    'localhost',  /* Хост, к которому мы подключаемся */
    'root',       /* Имя пользователя */
    '',   /* Используемый пароль */
    'restaurant');     /* База данных для запросов по умолчанию */

  if (!$link) {
    printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
    exit;
  }

  /* Посылаем запрос серверу */
    if ($result = mysqli_query($link, 'SELECT * FROM `menu` WHERE `id` = '.$id.'' )) {
      while( $row = mysqli_fetch_assoc($result) ){ 
        $id = $row['id'];
        $photo = $row['photo'];
        $name = $row['name'];
        $money = $row['money'];
        $ingredients = $row['ingredients'];
        $weight = $row['weight'];   
        echo "
        <div class='table'>
          <div class='top_head'>
            <div class='exit'><a href='index.php'>&#8592; Назад</a></div>
            <div class='name'>${name}</div>
          </div>
          <div id='text1'>
            <div class='photo'><img class='img' src='${photo}'></div>
            <div id='text2'>
              <div class='ingredients'><ul>Ингредиенты: <li>";
                $ingridients = trim($ingridients);
                for($i=0; $i<strlen($ingredients)-2; $i++){
                  if($ingredients[$i]!=';'){
                    echo $ingredients[$i];
                  } else echo"</li><li>";
                }
                echo "</li></ul></div>
              <div id='text3'>
                <div class='text4'>
                  <div class='weight'><b>Порция: </b><br><i>${weight} грамм</i></div>
                  <div class='money'><b>Стоимость: </b><br><i>${money} грн</i></div>
                </div>
                <div class='text5'>";
                if ($_COOKIE['login'] != ''){
                  echo"
                  <div class='basket'><button onclick='document.location=`basket.php?id=${id}`' class='button1'> Добавить в корзину</button></div>
                  <div class='basket'><button onclick='document.location=`basket_basket.php?id=${id}`' class='button1'>Просмотреть корзину</button></div>
                  <div class='basket'><button onclick='document.location=`basket_delete.php?id=${id}`' class='button1'>Очистить всю корзину</button></div>";
                };
                echo"
                </div>
              </div>  
            </div>
          </div>   
        </div>";
      }  
     }
  ?>
<script>
     if ( document.body.clientWidth >= '481' && document.body.clientWidth <= '1024' ) {
      text1.after(text3); // берёт #text2 и после него вставляет #text3
      
  }
  </script>
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

  <link rel="stylesheet" href="bludo_style.css">

</body>
</html>