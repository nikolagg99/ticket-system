<?php

class SignupController extends Signup {

    private $username;
    private $password;
    private $confirmPassword;
    private $fname;
    private $lname;
    private $role;

    public function __construct($username, $password, $confirmPassword, $fname, $lname, $role) {

        $this->username = $username;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->role = $role;
    }

    public function signupUser() {
        if($this->emptyInput() == false) {
            header("location: ../Register.php?error=emptyInput");
            exit();
        }

        if($this->invalidUsername() == false) {
            header("location: ../Register.php?error=username");
            exit();
        }

        if($this->passwordMatch() == false) {
            header("location: ../Register.php?error=passwordmatch");
            exit();
        }

        if($this->usernameTakenCheck() == false) {
            header("location: ../Register.php?error=usernametaken");
            exit();
        }

        $this->setUser($this->username, $this->password, $this->fname, $this->lname, $this->role);
      
    }

    // Checks if there is an empty input
    private function emptyInput() {
        $result;
        if(empty($this->username) || empty($this->password) || empty($this->confirmPassword) || empty($this->fname) || empty($this->lname) || empty($this->role)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Checks if the username contains signs that are not allowed
    private function invalidUsername() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Checks if the passwords match
    private function passwordMatch() {
        $result;
        if($this->password !== $this->confirmPassword) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function usernameTakenCheck() {
        $result;
        if(!$this->checkUser($this->username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}