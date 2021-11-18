<?php

if(isset($_POST["registerBtn"])) {

    // Grab the data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $role = $_POST["role"];

    // Instatiate Signup controller class
    include "../classes/Dbh.php";
    include "../classes/signup.php";
    include "../classes/controllers/signupController.php";

    $signup = new SignupController($username, $password, $confirmPassword, $fname, $lname, $role);

    // Running error handlers and user signup
    $signup->signupUser();

    // Going back to front page
    header("location: ../Login.php?error=none");
}