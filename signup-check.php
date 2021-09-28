<?php 
include "languages/configuration.php"; 
include "db_conn.php";

    if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);
        $re_pass = validate($_POST['re_password']);
        $name = validate($_POST['name']);
        $surname = validate($_POST['surname']);
        $address = validate($_POST['address']);
        $email = validate($_POST['email']);

        $user_data = 'uname='. $uname. '&name='. $name;


        if (empty($uname)) {
            header("Location:signup.php?error=Escriba su nombre de usuario&$user_data");
            exit();
        } elseif (empty($pass)) {
            header("Location:signup.php?error=Password is required&$user_data");
            exit();
        } elseif (empty($re_pass)) {
            header("Location:signup.php?error=Re Password is required&$user_data");
            exit();
        } elseif (empty($name)) {
            header("Location:signup.php?error=Name is required&$user_data");
            exit();
        } elseif (empty($surname)) {
            header("Location:signup.php?error=Surname is required&$user_data");
            exit();
        } elseif ($pass !== $re_pass) {
            header("Location:signup.php?error=The confirmation password  does not match&$user_data");
            exit();
        } elseif (empty($email)) {
            header("Location:signup.php?error=Email is required&$user_data");
            exit();
        } else {

        // hashing the password
            $pass = md5($pass);

            $sql = "SELECT * FROM users WHERE user_name='$uname' ";
            $resulta = mysqli_query($conn, $sql);

            if (mysqli_num_rows($resulta) > 0) {
                header("Location:signup.php?error=The username is taken try another&$user_data");
                exit();
            } else {
                $sql2 = "INSERT INTO users(user_name, password, name, surname, address, email) VALUES('$uname', '$pass', '$name', '$surname', '$address', '$email')";
                $result2 = mysqli_query($conn, $sql2);
                if ($result2) {
                    header("Location:signup.php?success=Your account has been created successfully");
                    exit();
                } else {
                    header("Location:signup.php?error=unknown error occurred&$user_data");
                    exit();
                }
            }
        }
    } else {
        header("Location:signup.php");
        exit();
    }