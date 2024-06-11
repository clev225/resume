<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';
// print_r($_POST);

if($_POST) {

  $post=$_POST;

  if($post['full_name'] && $post['username'] && $post['email_id'] && $post['password'] && $post['confirmpw']) {

    $full_name = $db->real_escape_string($post['full_name']);
    $username = $db->real_escape_string($post['username']);
    $email_id = $db->real_escape_string($post['email_id']);
    $password = md5($db->real_escape_string($post['password']));
    $confirmpw = md5($db->real_escape_string($post['confirmpw']));
    
    $result = $db->query("SELECT COUNT(*) as user FROM users WHERE (email_id='$email_id')");
    $result = $result->fetch_assoc();
    // print_r($result->fetch_assoc());

    if($result['user']) {
      $fn->setError($email_id.' is already registered!');
      $fn->redirect('../register.php');
      die();
    }

    try {
      $db->query("INSERT INTO users(full_name,username,email_id,password,confirmpw) VALUES('$full_name','$username','$email_id','$password','$confirmpw')");
      $fn->setAlert('Successfully Registered.');
      $fn->redirect('../login.php');
    }
    catch(Exception $error) {
      $fn->setError($error->getMessage());
      $fn->redirect('../register.php');
    }
    
  }
  else {
    $fn->setError('Please fill the form!');
    $fn->redirect('../register.php');
  }
}
else {
  $fn->redirect('../register.php');
}