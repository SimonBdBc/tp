<?php

function connect(){
  $access = mysqli_connect('localhost', 'root', '0000', 'dwm8', 3306);
  return $access;
}

function insertUser(array $data){

$access = connect();
$label = $data['label'];
$level = $data['level'];

$sql = "INSERT INTO `skills` (`id`, `user_id`, `label`, `level`) VALUES (NULL, NULL, '$label', '$level');";

$link = mysqli_query($access, $sql);
return $link;
}
