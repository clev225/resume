<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';
// print_r($_POST);

if($_POST) {

  $post=$_POST;

  if($post['otp']) {

    $otp=$post['otp']; 

    if($fn->getSession('otp')==$otp) {
      $fn->setAlert('Email is verified.');
      $fn->redirect('../change-password.php');
    }
    else {
      $fn->setError('Incorrect OTP. Please try again.');
      $fn->redirect('../verification.php');
    }
  }
  else {
    $fn->setError('Please enter the 6 Digits Code sended to your email');
    $fn->redirect('../verification.php');
  }
}
else {
  $fn->redirect('../verification.php');
}