<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if ($_GET) {
    $post = $_GET;

    if (isset($post['id']) && !empty($post['id'])) {
        $resume_id = intval($post['id']);
        $authid = $fn->Auth()['id'];

        // Check if the user is an admin
        $user = $fn->Auth();
        if ($user['role'] !== 'admin') {
            header("Location: login.php"); // Replace with your homepage URL
            exit();
        }

        try {
            $query = "DELETE resumes, skills, education, experience FROM resumes ";
            $query .= "LEFT JOIN skills ON resumes.id=skills.resume_id ";
            $query .= "LEFT JOIN education ON resumes.id=education.resume_id ";
            $query .= "LEFT JOIN experience ON resumes.id=experience.resume_id ";
            $query .= "WHERE resumes.id=$resume_id AND resumes.user_id=$authid";

            // Execute the query
            $db->query($query);

            // Set success message and redirect
            $fn->setAlert('Resume Successfully Deleted.');
            $fn->redirect('../index.php');
        } catch (Exception $error) {
            $fn->setError($error->getMessage());
            echo $error->getMessage();
        }
    } else {
        $fn->setError('Invalid resume ID.');
        $fn->redirect('../index.php');
    }
} else {
    $fn->redirect('../index.php');
}