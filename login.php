<?php session_start();?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>login</title>
</head>
<body>
<header>
    <div id="logo"><img src="./img/logo.png" ></div>
    <div id="home"><a href="home.html" role="button">Главная</a></div>
    <div id="inf"><a href="inf.html" role="button">О нас</a></div>
    <div id="menu"><a href="index.php" role="button">Меню</a></div>
    <div id="contacts"><a href="basket_basket.php" role="button">Корзина</a></div>
    <div id="log"><a  href="#"><img src="./img/log.jpg"></a></div>
    <div id="entrance"><a  href="login.php" role="button">Вход</a></div>
</header>

<a class="exit" href='index.php'>&#8592; Назад</a>

<div class="vse">

    <div class="reg">
        <h1>Фoрма регистрации</h1>

        
        <form name="myForm1"  onsubmit="return validateForm1()" action="check.php" method="POST">

        
            <p>Введите свой логин:</p>
            <input type="text" minlength=3 maxlength=90 name="login" placeholder="login" autocomplete="off" class='input'><br>
            <p>Введите свое имя:</p>
            <input type="text" minlength=3 maxlength=90 name="name" placeholder="name" autocomplete="off"><br>
            <p>Введите пароль:</p>
            <p>*Пароль не должен быть меньше 8 символов</p>
            <div class="password">
                <input minlength=8 type="password" maxlength=90 id="password-input1" name="password" placeholder="password" autocomplete="off">
                <a href="#" class="password-control" onclick="return show_hide_password1(this);"></a>
            </div><br>
            <p>Подтвердите пароль:</p>
            <div class="password">
            <input type="password" minlength=8 maxlength=90 id="password-input2" name="pass" placeholder="password" autocomplete="off">
            <a href="#" class="password-control" onclick="return show_hide_password2(this);"></a>
            </div><br><br>
            <button type="submit" class="button">Зарегистрироваться</button>
        </form>
        <?php
        if (isset($_GET['str'])){
            $str=$_GET['str'];
            echo "<p >${str}</p>";
        } 
        ?>
    </div>


    <div class="auth">
        <h1>Фoрма авторизации</h1>
        <form name="myForm2" onsubmit="return validateForm2()" action="auth.php" method="POST">
            <p>Введите свой логин:</p>
            <input type="text" name="login" placeholder="login" autocomplete="off"><br>
            <p>Введите свой пароль:</p>
            <div class="password">
            <input type="password" id="password-input3" name="password" placeholder="password" autocomplete="off">
            <a href="#" class="password-control" onclick="return show_hide_password3(this);"></a>
            </div><br><br>
            <button type="submit" class="button">Войти</button>
        </form>
        <?php
        if (isset($_GET['warning'])){
            $warning=$_GET['warning'];
            echo "<p >${warning}</p>";
        } 
        ?> 
         <?php
                if($_COOKIE['login'] != ''){
            ?>
            <br><button class="button" onclick="document.location='exit.php'" >Выйти</button><br><br>
            <br><button class="button" onclick="document.location='delete.php'" >Удалить аккаунт</button><br><br>
            <?php } ?>
            <?php
          if($_SESSION['admin'] == 1 and $_COOKIE['login'] != ''){
            ?>
            <button class="button" onclick="document.location='admin_menu1.html'" >Добавить блюдо</button>

            <?php } ?>
    </div>

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
    <link rel="stylesheet" href="login_style.css">
    <script src="login_script.js" type="text/javascript"></script>
</body>
</html>