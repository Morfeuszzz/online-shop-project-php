<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Admin Panel</title>
</head>

<body>
  <?php
    include_once "./header.php";
  ?>
  <div id="admin-panel">
    <?php
      $sql = "select * from users;";
      //Generowanie Tabelki
      echo <<<TAB
        <table>
        <tr>
        <th>ID</th>
        <th>Nickname</th>
        <th>Password</th>
        <th>Email</th>
        <th>ROLE-ID</th>
        <th>Delete</th>
        <th>Update</th>
        </tr>
        TAB;
      $result = $connect->query($sql);
      while ($rows = $result->fetch_assoc()) {
        echo <<<D
          <tr>
          <td>$rows[id]</td>
          <td>$rows[nickname]</td>
          <td>$rows[password]</td>
          <td>$rows[email]</td>
          <td>$rows[role_id]</td>
          <td><a href="./delete.php?id=$rows[id]">Usuń</a></td>
          <td><a href="./admin_panel.php?upd=$rows[id]">Modyfikuj</a></td>
          </tr>
          D;
      }
      echo "</table>";
      //Dodawanie użytkownika
      echo <<<DODAWANIE
        <form action="admin_panel.php?add=" method="POST">
        <input type="submit" value="Dodaj użytkownika">
        </form>
        DODAWANIE;
      //Koniec dodawania użytkownika
      //Koniec Generowania Tabelki
      //Odbieranie komunikatów
      if (isset($_GET['info'])) {
        echo $_GET['info'];
      }
      //Koniec odbierania komunikatów
      //Formularz modyfikacji
      if (isset($_GET['upd'])) {
        echo <<<FORM
          <h2>Modyfikacja użytkownika o id:$_GET[upd]</h2>
          <form method="post" action="update.php?up=">
          <input type="text" placeholder="Nickname" name="nick" required><br>
          <input type="password" placeholder="Password" name="pass" required><br>
          <input type="email" placeholder="Email" name="mail" required><br>
          <input type="hidden" name="aj" value=$_GET[upd]>
          <label for="upr">Rola:</label>
          <select id="upr" name="sele">
          <option value="1">Administrator</option>
          <option value="2">Moderator</option>
          <option value="3">User</option>
          </select><br>
          <input type="submit" value="Zmodyfikuj">
          </form>
          FORM;
      }
      //Koniec formularza modyfikacji
      //Dodawanie użytkownika
      if (isset($_GET['add'])) {
        echo <<<FORM
          <h2>Dodawanie użytkownika</h2><br>
          <form method="post" action="add.php?ad=">
          <input type="text" placeholder="Nickname" name="nick2" required><br>
          <input type="password" placeholder="Password" name="pass2" required><br>
          <input type="email" placeholder="Email" name="mail2" required><br>
          <label for="upr">Rola:</label>
          <select id="upr" name="sele2">
          <option value="1">Administrator</option>
          <option value="2">Moderator</option>
          <option value="3">User</option>
          </select><br>
          <input type="submit" value="Dodaj">
          </form>
          FORM;
      }
      //Koniec dodawania użytkownika
    ?>
  </div>
  <?php
    include_once 'footer.php';
  ?>
</body>

</html>