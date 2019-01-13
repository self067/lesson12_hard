<?php
session_start();
ini_set('session.gc.maxlifetime', 3600);

//var_dump($_POST);
//var_dump($_SESSION);

if( $_SESSION['login'] && $_SESSION['pass'] ){
  header("Location: admin.php");
  die();
}

if( $_POST['login']){
  $connection = new PDO('mysql:host=jktu.ru; dbname=selto149_php; charset=utf8', 'selto149_php', 'AcademyPHP2@');
  $login = $connection->query('select * from `login`;');
  foreach ( $login as $log){
    if($_POST['login']== $log['user']  && md5($_POST['pass']) == $log['pass']){
      $_SESSION['login'] = $_POST['login'];
      $_SESSION['pass'] = md5($_POST['pass']);
      $_SESSION['bgcolor'] = $_POST['bg'];
      $_SESSION['role'] = $log['role'];
      setcookie('bg', $_POST['bg'], time()+3600);
      header('Location: admin.php');
      die();
    }
  }
  message("Неверный логин или пароль");
}


//if( $_POST['newlogin']) {
//  if ($_POST['newpass'] != $_POST['verify-newpass']) {
//    message( "Пароли не совпадают");
//
//  } else {
//    $connection = new PDO('mysql:host=jktu.ru; dbname=selto149_php; charset=utf8', 'selto149_php', 'AcademyPHP2@');
//    $newlogin = $_POST['newlogin'];
//    $email = $_POST['email'];
//    $login = $connection->prepare('select user from `login` where user=:newlogin or email=:email;');
//    $login->execute(array(':newlogin' => $newlogin,':email' => $email ));
//
//    if ($login->rowCount()) {
//      message( "Такой пользователь или e-mail уже есть");
//    } else {
//        $confirmcode = ''. rand(0,9).rand(0,9).rand(0,9).rand(0,9);
//        $_SESSION['confirmcode'] = $confirmcode;
//        $_SESSION['newlogin'] = $newlogin;
//        $_SESSION['email'] = $email;
//        $_SESSION['newpass'] = md5($_POST['newpass']);
//        if( sendConfirm($confirmcode)) message( "На адрес $email отправлен код подтверждения");
//        else message("Ошибка отправки кода подтверждения на адрес $email");
//    }
//  }
//}
//
//if( $_POST['confirmcode']) {
//  $cc = $_POST['confirmcode'];
//  if($_SESSION['confirmcode']) $confirmcode = $_SESSION['confirmcode'];
//  if( $cc != $confirmcode) message("Неверный код подтверждения"); //  $cc != $confirmcode" );
//  else {
//    $connection = new PDO('mysql:host=jktu.ru; dbname=selto149_php; charset=utf8', 'selto149_php', 'AcademyPHP2@');
//    $login = $connection->prepare("insert into `login` (`user`, `pass`, `email`) values (:user, :pass, :email);");
//      if ($login->execute(array(':user' => $_SESSION['newlogin'],
//                                ':pass' => $_SESSION['newpass'],
//                                ':email' => $_SESSION['email']))) message('Учетная запись создана');
//      else {message( 'Error '. $login->errorCode()); var_dump( $login->errorInfo());}
//
//    unset($_SESSION['confirmcode']);
//  }
//}

$connection = null;
$login = null;

function message(string $mes){
    echo "<div class='message'>$mes</div>";
}




?>
  <style>
    body  {
      margin: 100px 200px;
    }
    input, p, select, span {
      font-size: 20px;
      margin: 10px;
    }
    .regform {
        margin-top: 30px;
    }
    .confirmform{

    }

      .message {
          font-size: 20px;
          color: #ff246c;
      }

  </style>

  <form class="logform" method="POST">
    <p>Авторизоваться</p>
    <input type="text" name="login" required placeholder="Логин"><br>
    <input type="password" name="pass" required placeholder="Пароль"><br>
<!--      <p>Укажите цвет фона: <input type="color" name="bg" value="#ff0000"></p>-->
    <input type="submit" value="Вход">

  </form>

<!--    <form class="regform" method="POST">-->
<!--        <p>Зарегистрироваться</p>-->
<!--        <input type="text" name="newlogin" required placeholder="Логин"><br>-->
<!--        <input type="email" name="email" required placeholder="e-mail"><br>-->
<!--        <input type="password" name="newpass" required placeholder="Пароль"><br>-->
<!--        <input type="password" name="verify-newpass" required placeholder="Повторите пароль"><br>-->
<!--        <input type="submit" value="Регистрация">-->
<!--   </form>-->
<!---->
<!--    <form class="confirmform" method="POST">-->
<!--        <p>Ввести код подтверждения</p>-->
<!--        <input type="text" name="confirmcode" required placeholder="Код"><br>-->
<!--        <input type="submit" value="Подтвердить регистрацию">-->
<!--    </form>-->


<?php

