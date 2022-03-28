<?php
if(isset($_GET['id'])){
  require_once "connect.php";
  $sql = "delete from users where id=$_GET[id];";
  if($connect->query($sql)){
    header("location: ./admin_panel.php?info=Udało się usunąć użytkownika o id: $_GET[id]");
  } else {
    header("location: ./admin_panel.php?info=Nie udało się usunąć użytkownika o id: $_GET[id]");
  }
} else {
  header("location: ./admin_panel.php?info=Coś poszło nie tak");
}

 ?>
