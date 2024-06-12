<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';
// print_r($_POST);

if($_GET) {

  $post=$_GET;

  // echo "<pre>";
  // print_r($post);

  if($post['id']) {

    $authid = $fn->Auth()['id'];

    if ($user['role'] !== 'admin') {
      // If not an admin, redirect to the homepage or show an error message
      header("Location: login.php"); // Replace with your homepage URL
      exit();
  }

    try {
      $query = "DELETE resumes,skills,education,experience FROM resumes ";
      $query.="LEFT JOIN skills ON resumes.id=skills.resume_id ";
      $query.="LEFT JOIN education ON resumes.id=education.resume_id ";
      $query.="LEFT JOIN experience ON resumes.id=experience.resume_id ";
      $query.="WHERE resumes.id={$post['id']} AND resumes.user_id=$authid";

      // echo $query;
      // die();

      $db->query($query);
      $fn->setAlert('Resume Successfully Deleted.');
      $fn->redirect('../index.php');
    }
    catch(Exception $error) {
      $fn->setError($error->getMessage());
      // $fn->redirect('../index.php');
      echo $error->getMessage();

    }
    
  }
  else {
    $fn->setError('Please fill the form!');
    $fn->redirect('../index.php');

  }
}
else {
  $fn->redirect('../index.php');
}