<?php
   include_once 'C:\xampp\htdocs\YAZWarehouse\view\header.php';
?>

    <form  action=" http://localhost/YAZWarehouse/dataBase/Login.inc.php"  method="POST"  class="form">
      <img src="http://localhost/YAZWarehouse/style/logo.jpg" alt="">
      <h1>Veuillez vous connecter</h1>
      <div class="input-group">
        <input type="text" name="username" id="username"  required>
        <label for="username">Nom d'utilisateur ou email</label>
      </div>
      <div class="input-group">
        <input type="password" name="pwd" id="pwd"  required>
        <label for="pwd">Mot de passe</label>
      
      </div>
      <input type="submit" name="connexion" value="login" class="submit-btn">
      <a href="#forgot-pw" class="forgot-pw">Mot de passe oublié?</a>
    </form>

    <div id="forgot-pw">
      <form action="" class="form">
        <a href="#" class="close">&times;</a>
        <h2>Renitialiser le mot de passe</h2>
        <div class="input-group">
          <input type="email" name="email" id="email" required>
          <label for="email">Email</label>
        </div>
        <input type="submit" value="submit" class="submit-btn">
      </form>
      <?php 
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
          echo "<p>Remplir tous les champs!</p>";
        }
        else if ($_GET["error"] == "wronglogin") {
          echo "<p>Nom d'utilisateur incorrecte!</p>";
        }
      } 
      ?>



 <?php
    include_once 'C:\xampp\htdocs\YAZWarehouse\view\footer.php';
?>