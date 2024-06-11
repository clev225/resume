<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';
// print_r($_POST);

if($_POST) {

  $post=$_POST;

  // echo "<pre>";
  // print_r($post);
  // die();

  if($post['resume_id'] && $post['school_name'] && $post['educ_level'] && $post['started'] && $post['ended']) {

    $resumeid = array_shift($post);
    $post2 = $post;
    unset($post['slug']);

    $columns = '';
    $values = '';

    foreach($post as $index=>$value) {
      $value = $db->real_escape_string($value);
      $columns.=$index.',';
      $values.="'$value',";
    }

    $columns.="resume_id";
    $values.=$resumeid;

    try {
      $query = "INSERT INTO education";
      $query.= "($columns) ";
      $query.= "VALUES($values)";

      // echo $query;
      // die();

      $db->query($query);
      $fn->setAlert('Education Added.');
      $fn->redirect('../updateresume.php?resume='.$post2['slug']);
    }
    catch(Exception $error) {
      $fn->setError($error->getMessage());
      $fn->redirect('../updateresume.php?resume='.$post2['slug']);
    }
    
  }
  else {
    $fn->setError('Please fill the form!');
    $fn->redirect('../updateresume.php?resume='.$post2['slug']);
  }
}
else {
  $fn->redirect('../updateresume.php?resume='.$post2['slug']);
}