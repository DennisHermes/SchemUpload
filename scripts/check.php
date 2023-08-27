<?php
    
    session_start();

    $password = $_POST['password'];
    
    if(password_verify($password, '$2y$10$cp.cK5mU8vgQYxXxgRZQvOWBR1X225.XEqjByqILJNfdpqhrYP7Aq')) {
        $_SESSION['verified'] = true;
        header("Location: ../upload");
    } else {
        header("Location: ../index?error=1");
    }

?>