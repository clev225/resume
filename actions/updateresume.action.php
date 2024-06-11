<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';
// print_r($_POST);

if($_POST) {

  $post=$_POST;

  // echo "<pre>";
  // print_r($post);
  // die();

  if($post['id'] && $post['slug'] && $post['surname'] && $post['firstname'] && $post['middlename'] && $post['contact_no'] && $post['email_id'] && $post['province'] && $post['municipality'] && $post['barangay'] && $post['street'] && $post['house_no']) {

    $columns = '';
    $values = '';

    $post2 = $post;
    unset($post2['id']);
    unset($post2['slug']);

    foreach($post2 as $index=>$value) {
      $value = $db->real_escape_string($value);
      $columns.=$index."='$value',";
    }

    $columns.='updated_at'.time();

    try {
      $query = "UPDATE resumes SET ";
      $query.= "$columns ";
      $query.= "WHERE id={$post['id']} AND slug='{$post['slug']}'";

      // echo $query;
      // die();

      $db->query($query);
      $fn->setAlert('Resume Successfully Updated.');
      $fn->redirect('../updateresume.php?resume='.$post['slug']);
    }
    catch(Exception $error) {
      $fn->setError($error->getMessage());
      $fn->redirect('../updateresume.php?resume='.$post['slug']);
    }
    
  }
  else {
    $fn->setError('Please fill the form!');
    $fn->redirect('../updateresume.php?resume='.$post['slug']);
  }
}
else {
  $fn->redirect('../updateresume.php?resume='.$post['slug']);
}