<?php
require_once './templates/head.html';
require_once './templates/foot.html';
require_once 'validate_register.php';
require_once 'db.php';

if(isset($_POST['submit'])){
  $errors = validateRegister();
  
  if(count($error) == 0){
    $data['firstname'] = strtolower($_POST['firstname']);
    $data['lastname'] = strtolower($_POST['lastname']);
    $data['email'] = strtolower($_POST['email']);
    $data['password'] = cryptThis($_POST['password']);
    $result = insertUser($data);

    if($result != false){
      header("refresh:5;url=index.php");
      echo "Bienvenu, la redirection automatique ce déclenchera dans 5 sec";
    }
  }
}
?>

<form action="" method="POST">
  <label for="firstname">Prenom</label>
  <input id="firstname" type="text" value='<?= (isset($_POST["firstname"]))? $_POST["firstname"]: ""?>' name="firstname">
  <br>
  <?php
  if(isset($errors['firstname'])){
    echo $errors['fistname'] . "<br>";
  }
  ?>
  <label for="lastname">Nom</label>
  <input id="lastname" type="text" value='<?= (isset($_POST["lastname"]))? $_POST["lastname"]: ""?>' name="lastname">
  <br>
  <?php
  if(isset($errors['lastname'])){
    echo $errors['lastname'] . "<br>";
  }
  ?>
  <label for="email">Email</label>
  <input id="email" type="text" value='<?= (isset($_POST["email"]))? $_POST["email"]: ""?>' name="email">
  <br>
  <?php //if(isset($errors['email'])) { echo $errors['email']; } ?>
  <?= (isset($errors['email']))? $errors['email'] . "<br>": "" ?>
  <label for="password">Password</label>
  <input id="password" type="text" name="password">
  <br>
  <?php
  if(isset($errors['password'])){
    echo "<ul>";
    foreach ($errors['password'] as $value) {
      echo "<li>$value</li>";
    }
    echo "</ul>";
  };
 ?>
  <label for="repassword">Re-Password</label>
  <input id="repassword" type="text" name="repassword">
  <br>
  <?php
  if(isset($errors['repassword'])){
    echo $errors['repassword'] . "<br>";
  }
   ?>
  <input type="submit" name="submit">
</form>
