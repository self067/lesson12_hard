<?php
session_start();

require 'config.php';
//var_dump($_POST);
//var_dump($_SESSION);

if( $_POST['logout']) {
//  $_SESSION = array();
//  session_write_close();
  session_destroy();
  header('Location: index.php');
  die();

}


if( !$_SESSION['login'] || !$_SESSION['pass']){
  header("Location: login.php");
  die();
}


if( count($_POST) > 0) {
    header('Location: admin.php');
  die();

}

$connection = new PDO('mysql:host='.DBHost.'; dbname='.DBName.'; charset=utf8', DBUser, DBPass);

$update = $connection->prepare("update `comments` set status=:status where id=:id");
$comments = $connection->query("select * from `comments` where status='new'");


?>
<style>

</style>

<h1>Админка</h1>
<h2>Пользователь <?=$_SESSION['login'] . ' с ролью ' . $_SESSION['role']?></h2>


<form method="POST">
<?php foreach( $comments as $comment) { ?>

  <select name="<?=$comment['id']?>" id="id<?=$comment['id']?>">
    <option value="ok">OK</option>
    <option value="rj">Reject</option>
  </select>
  <label for="id<?=$comment['id']?>">
    <?='Пользователь "'. $comment['name'] . '" оставил коментарий "' . $comment['comment'] . '"<br>' ?>
  </label>
  <?php } ?>
  <button type="submit">Модерировать</button>
</form>

<form method="POST" style="margin: 40px; font-size: 40px;">
  <input style="font-size: 30px;" type="submit" name="logout" value="Выход">
</form>



<?php

foreach ($_POST as $num=>$status){
    if(($_SESSION['role'] == 'moderator' && $status=='rj') || $_SESSION['role'] == 'admin')
        $update->execute(array('status'=>$status, 'id'=>$num));
}
?>