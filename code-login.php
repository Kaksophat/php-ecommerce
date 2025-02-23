<?php
// filepath: /C:/xampp/htdocs/php-ecommerce/login.php
session_start();
include('./admin/include/dbconnection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        // Handle login
        $email = $_POST['email'];
        $password = $_POST['password'];

        $login_sql = "SELECT * FROM customer WHERE cus_email = '$email' AND cus_pass = '$password'";
        $login_result = mysqli_query($conn, $login_sql);

        if (mysqli_num_rows($login_result) > 0) {
            $_SESSION['auth'] = true;
            $data = mysqli_fetch_array($login_result);

            $id = $data['id'];
            $email = $data['cus_email'];
            $pass = $data['cus_pass'];

            $_SESSION['auth'] = [
                'cus_id' => $id,
                'cus_email' => $email,
                'cus_pass' => $pass,
            ];
            
            $_SESSION['cus_email'] = $email;
            $_SESSION['cus_pass'] = $password;

            header("Location: index.php");
            exit;
        } else {
            $login_error = "Invalid email or password.";
        }
    } elseif (isset($_POST['register'])) {
        // Handle registration
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $register_sql = "INSERT INTO customer (cus_name, cus_email, cus_pass) VALUES ('$name', '$email', '$password')";
        $register_result = mysqli_query($conn, $register_sql);

        if ($register_result) {
            $_SESSION['customer'] = $email;
            header("Location: index.php");
            exit;
        } else {
            $register_error = "Registration failed. Please try again.";
        }
    }
}
?>
