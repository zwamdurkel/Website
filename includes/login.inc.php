<?php
session_start();
if ( isset( $_POST['submit'] ) ) {

    require 'dbconn.php';

    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

    if ( empty($user) || empty($pass) ) {
        header('Location: ../login?error=emptyfield');
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt = mysqli_stmt_init($conn);
        if ( !mysqli_stmt_prepare($stmt, $sql) ) {
            header('Location: ../login?error=sql');
            exit(); 
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ( $resultCheck == 0) {
                header('Location: ../login?error=exist');
                exit();     
            } elseif ( $resultCheck == 1 ) {
                $_SESSION['login'] = true;
                header('Location: ../');
            }
        }
    }
}
?>