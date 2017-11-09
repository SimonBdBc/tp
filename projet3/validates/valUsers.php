<?php

//verifie la validite du formulaire Register
//@return array | bool
  function validateRegister(){
    $errors = [];
    $error = validateRequired($_POST['firstname']);
    if($error) {
      $errors['firstname'] = $error;
    }
    $error = validateRequired($_POST['lastname']);
    if($error) {
      $errors['lastname'] = $error;
    }
    $error = validateEmail($_POST['email']);
    if($error) {
      $errors['email'] = $error;
    }
    $error = validatePassword($_POST['password']);
    if($error) {
      $errors['password'] = $error;
    }
    $error = validateIdentical($_POST['password'], $_POST['repassword']);
    if($error) {
      $errors['repassword'] = $error;
    }
    return $errors;
  }

  //verifie la validite du prenom et du nom
  //var $str chaine de caractere à valider
  //@return array | void
  function validateRequired($str){
    if(empty($str)){
      return "Element obligatoire";
    }
  }

  //verifie la validite du password
  //var $password, Password à valider
  //@return array | void
  function validatePassword($password){
    $errors = array();
     if(strlen($password) < 5){
     $errors['invalidLenght'] = "Mot de passe inférieur à 5 caractère";
    }
     if(!preg_match('/[[:digit]]/', $password)){
     $errors['invalidDigit'] = "Mot de passe ne contient pas de numérique";
    }
     if(!preg_match('/[[a-zA-Z]]/', $password)){
     $errors['invalidAlpha'] = "Mot de passe ne contient pas de lettre";
    }
     if(strtolower($password) == $password){
     $errors['invalidUpper'] = "Mot de passe ne contient pas de majuscules";
    }
     $specialAllow = ["&", "@", "#", "[", "]", "*", "%"];
     if (str_replace($specialAllow, "_", $password) == $password){
     $errors['invalidSpecial'] = "Mot de passe ne contient pas de caractere special comme" . join($specialAllow);
    }
    if(!empty($errors)){
      return $errors;
    }
  }

//verifie la validite d'un Email
//var $email, Email à valider
//@return array | void
function validateEmail($email){
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    return "Email invalide";
  }
};

//verifie l'identicité de 2 parametres'
//var $str1 string à comparer
//var $str2 string à comparer
//@return array | void
function validateIdentical($str1, $str2){
  if($str1 !== $str2){
    return "Nom identique";
  }
};

/*  if(empty($errors)){
    return true;
  } else {
    return $errors;
  }
  if(empty($errors)){
    return true;
  }
    return $errors;
*/
