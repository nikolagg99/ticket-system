<?php

class Login extends Dbh {

    protected function getUser($username, $pass) {
        $sql = 'SELECT user_password FROM users WHERE username = ?;';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($username))) {
            $stmt = null;
            header("location: ../Login.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../Login.php?error=usernotfound");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($pass, $passwordHashed[0]["user_password"]);

        if($checkPassword == false) {
            $stmt = null;
            header("location: ../Login.php?error=wrongpassword");
            exit();
        } 
        elseif ($checkPassword == true) {
            $sql = 'SELECT * FROM users WHERE username = ?;';
            $stmt = $this->connect()->prepare($sql);

            if(!$stmt->execute(array($username))) {
                $stmt = null;
                header("location: ../Login.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../Login.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["user_username"] = $user[0]["username"];
            $_SESSION["role"] = $user[0]["role"];
        }

        $stmt = null;
    }
}