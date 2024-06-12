<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';
// print_r($_POST);

if($_POST) {

  $post=$_POST;

  // echo "<pre>";
  // print_r($post);

  if($post['surname'] && $post['firstname'] && $post['middlename'] && $post['age'] && $post['nationality'] && $post['contact_no'] && $post['email_id'] && $post['province'] && $post['municipality'] && $post['barangay'] && $post['street'] && $post['house_no']) {

    $columns = '';
    $values = '';

    foreach($post as $index=>$value) {
      $value = $db->real_escape_string($value);
      $columns.=$index.',';
      $values.="'$value',";
    }

    $authid = $fn->Auth()['id'];

    $columns.="slug,updated_at,user_id";
    $values.="'".$fn->randomstring()."',".time().",".$authid;

    try {
      $query = "INSERT INTO resumes";
      $query.= "($columns) ";
      $query.= "VALUES($values)";

      // echo $query;
      // die();

      $db->query($query);
      $fn->setAlert('Resume Successfully Added.');
      $fn->redirect('../userdashboard.php');
    }
    catch(Exception $error) {
      $fn->setError($error->getMessage());
      $fn->redirect('../register.php');
    }
    
  }
  else {
    $fn->setError('Please fill the form!');
    $fn->redirect('../createresume.php');
  }
}
else {
  $fn->redirect('../createresume.php');
}