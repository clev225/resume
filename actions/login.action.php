<?php

require '../assets/class/database.class.php';
require '../assets/class/function.class.php';

if($_POST) {
    $post = $_POST;

    if($post['username'] && $post['password']) {
        $username = $db->real_escape_string($post['username']);
        $password = md5($db->real_escape_string($post['password']));

        // Check for admin credentials
        if($username === 'admin' && $password === md5('admin123')) {
            // Set admin authentication
            $adminData = [
                'username' => 'admin',
                'role' => 'admin'
            ];
            $fn->setAuth($adminData);
            $fn->setAlert('Admin Login Success.');
            $fn->redirect('../admincopy.php'); // Redirect to admin dashboard
        } else {
            // Check database for other users
            $result = $db->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
            $result = $result->fetch_assoc();

            if($result){

                if($result['status'] == 'pending') {
                    $fn->setError('Your account is pending approval.');
                    $fn->redirect('../login.php');

                }else{
                $fn->setAuth($result);
                $fn->setAlert('Login Success.');
                $fn->redirect('../index.php');
            }
            } else {
                $fn->setError('Incorrect username or password. Please try again.');
                $fn->redirect('../login.php');
            }
        }
    } else {
        $fn->redirect('../login.php');
    }
}
?>