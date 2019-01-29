<?php
if (isset($_POST['login-submit'])) {
        require 'config.php';

		$username = ($_POST['username']);
		$password = ($_POST['password']);

		if (empty($username)) { 
            header("Location: index.php?error=empty_username");
            exit(); }
		if (empty($password)) {
            header("Location: index.php?error=empty_password");
            exit(); }
        if(empty($username) || empty($password)){
            header("Location: login_form.php?error=empty_fields");
            exit();
        }
		else{
			$sql = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";

			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				// get id of created user
				$reg_user_id = mysqli_fetch_assoc($result)['id']; 

				// put logged in user into session array
				
				$_SESSION['user'] = getUserById($reg_user_id); 
				session_start();
				// if user is admin, redirect to admin area
				if ( in_array($_SESSION['user']['role'], ["admin", "Admin"])) {
					$_SESSION['message'] = "You are now logged in";
					// redirect to admin area
					header('location: ' . BASE_URL . '/admin/dashboard.php');
					exit(0);
				} else {
					header("Location: comment.php?success=You_are_now_logged_in");				
					exit(0);
				}
			} else {
				header("Location: login_form.php?error=wrong_credentials");				
				exit(0);
			}
		}
    }
    function getUserById($id)
	{
		global $conn;
		$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		// returns user in an array format: 
		// ['id'=>1 'username' => 'Awa', 'email'=>'a@a.com', 'password'=> 'mypass']
		return $user; 
	}