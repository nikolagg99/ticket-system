<?php

class Comment extends Dbh {
    protected function setComment($ticket_id, $username, $image_url, $content){
        $sql = 'INSERT INTO comments (ticket_id, username, image_url, content) VALUES (?, ?, ?, ?);';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($ticket_id, $username, $image_url, $content))) {
            $stmt = null;
            header("location: ../getCurrentTicket.php?error=addcommentstmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function getComments($ticket_id) {
        $sql = 'SELECT * FROM comments WHERE ticket_id = ?;';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($ticket_id))) {
            $stmt = null;
            header("location: ../Ticket.php?error=stmtcommentsfailed");
            exit();
        }

        //session_start();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["comments"] = $comments;

        $stmt = null;
    }
}