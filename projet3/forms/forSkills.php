<?php
require_once '../templates/head.html';
require_once '../templates/foot.html';
require_once '../dbs/dbSkills.php';

if(isset($_POST['submit'])){
$data['label'] = strtolower($_POST['label']);
$data['level'] = strtolower($_POST['level']);
$result = insertUser($data);
};
?>

<form action="" method="POST">
  <label for="label">Label</label>
  <input id="label" type="text" name="label">
  <br>
  <label for="level">Level</label>
  <input id="level" type="number" name="level">
  <br>
<input type="submit" name="submit">
</form>
