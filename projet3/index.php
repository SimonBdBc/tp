<?php session_start(); ?>
<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
  require_once 'admin.php';
} else {
  require_once 'form_login.php';
} 
