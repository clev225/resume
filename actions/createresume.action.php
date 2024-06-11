<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_POST) {

  $post = $_POST;

  // Check mandatory fields except middlename
  $requiredFields = ['surname', 'firstname', 'age', 'nationality', 'contact_no', 'email_id', 'province', 'municipality', 'barangay', 'street', 'house_no'];

  $isValid = true;
  foreach ($requiredFields as $field) {
    if (empty($post[$field])) {
      $isValid = false;
      break;
    }
  }

  if ($isValid) {

    $columns = '';
    $values = '';

    foreach ($post as $index => $value) {
      $value = $db->real_escape_string($value);
      $columns .= $index . ',';
      $values .= "'$value',";
    }

    // Add additional required columns and values
    $authid = $fn->Auth()['id'];
    $columns .= "slug,updated_at,user_id";
    $values .= "'" . $fn->randomstring() . "'," . time() . "," . $authid;

    try {
      $query = "INSERT INTO resumes ($columns) VALUES ($values)";

      // Execute query
      $db->query($query);
      $fn->setAlert('Resume Successfully Added.');
      $fn->redirect('../index.php');
    } catch (Exception $error) {
      $fn->setError($error->getMessage());
      $fn->redirect('../register.php');
    }

  } 
  else {
    $fn->setError('Please fill in all required fields!');
    $fn->redirect('../createresume.php');
  }
} else {
  $fn->redirect('../createresume.php');
}
?>
