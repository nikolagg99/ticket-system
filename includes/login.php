<?php

if(isset($_POST["loginBtn"])) {

    // Grab the data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Instatiate Login controller class
    include "../classes/Dbh.php";
    include "../classes/login.php";
    include "../classes/controllers/loginController.php";

    $login = new LoginController($username, $password);

    // Running error handlers and user signup
    $login->loginUser();
    
    // Going back to front page
    header("location: ../Dashboard.php?error=none");
}