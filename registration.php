<?php
    if(isset($_POST['register-submit'])){

        require "config.php";

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if(empty($username) || empty($email) || empty($password1) || empty($password2)){
            header("Location: register.php?error=empty_fields&username=".$username."&email=".$email);
            exit();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/".$username)){
            header("Location: register.php?error=invalid_email_and_username");
            exit();

        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: register.php?error=invalid_email&username=".$username);
            exit();
        }
        else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: register.php?error=invalid_username&email=".$email);
            exit();
        }
        else if($password1 !== $password2){
            header("Location: register.php?error=password_check&username=".$username."&email=".$email);
            exit();
        }
        else {

            $sql= "SELECT username FROM users WHERE username=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: register.php?error=sql_error");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);
                if($result > 0){
                    header("Location: register.php?error=user_taken&email=".$email);
                    exit();
                }
                else{
                    $sql= "INSERT INTO users (username, email, password, created_at, updated_at) VALUES ('$username', '$email', '$password1', now(), now())";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: register.php?error=sql_error");
                        exit();
                    }
                    else {
                        $hash_pass = password_hash($password1, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt,"sss",$username,$hash_pass,$email);
                        mysqli_stmt_execute($stmt);
                        header("Location: register.php?success=signup");
                        exit();
                    }
                }
            }
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
    }
    else{
        header("Location: register.php");
        exit();
    }
