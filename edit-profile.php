<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    include "db_conn.php";

    if (isset($_POST['submit'])) {

        /* function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        } */

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $address = $_POST['address'];
        $email = $_POST['email'];

        if (empty($name)) {
            header("Location:editProfile.php?error=name is required");
            exit();
        } elseif (empty($surname)) {
            header("Location:editProfile.php?error=surname is required");
            exit();
        } elseif (empty($email)) {
            header("Location:editProfile.php?error=email is required");
            exit();
        } elseif (empty($address)) {
            header("Location:editProfile.php?error=address is required");
            exit();
        } else {
            $id = $_SESSION['id'];
            $uname = $_SESSION['user_name'];

            $sqlUsername = "SELECT name, surname, address, email
                        FROM users WHERE
                        id='$id' AND user_name='$uname'";
            $result = mysqli_query($conn, $sqlUsername);
            if (mysqli_num_rows($result) === 1) {
                
                $sqlEdit = "UPDATE users 
                            SET 
                                name='$name',
                                surname='$sname',
                                address='$address',
                                email='$email', 
                            WHERE id='$id' AND user_name='$uname'";
                mysqli_query($conn, $sqlEdit);
                header("Location:editProfile.php?success=Your profile has been changed successfully");
                exit();
            } else {
                header("Location:editProfile.php?error=ERROR");
                exit();
            }
        }
    }
}