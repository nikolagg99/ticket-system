<?php

class Signup extends Dbh {

    protected function setUser($username, $password, $firstName, $lastName, $role) {
        $sql = 'INSERT INTO users (username, user_password, firstName, lastName, role) VALUES (?, ?, ?, ?, ?);';
        $stmt = $this->connect()->prepare($sql);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $hashedPassword, $firstName, $lastName, $role))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($username) {
        $sql = 'SELECT username FROM users WHERE username = ?;';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($username))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}