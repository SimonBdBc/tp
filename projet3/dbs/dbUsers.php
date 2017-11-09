<?php

function connect(){
  $link = mysqli_connect('localhost', 'root', '0000', 'dwm8', 3306);
  return $link;
}

function checkLogin($email, $password){
  $email = clean($email);
  $password = cryptThis($password);

  $link = connect();
  $result = mysqli_query($link,"SELECT `id` FROM `users` WHERE `email` = '$email' AND `password` = '$password' LIMIT 1;");

  if(!$result) {
    var_dump('Aucun résultat');
  } else {
    $fetch = mysqli_fetch_row($result);
    return $fetch;
  }
}
function cryptThis($var){
  $salt = 'grainDeSel';
  return md5($var. $salt);
}
function clean($var){

  return htmlspecialchars($var);
}

function insertUser(array $data){

$link = connect();
$email = $data['email'];
$password = $data['password'];

$sql = "INSERT INTO `users` (`id`, `email`, `password`) VALUES (NULL, '$email', '$password');";

$result = mysqli_query($link, $sql);
return $result;
}
