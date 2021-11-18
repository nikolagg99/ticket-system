<?php

class Ticket extends Dbh {
    protected function setTicket($user_id, $title, $content, $image_url, $visibility, $ticket_for){
        $sql = 'INSERT INTO tickets (user_id, title, content, image_url, visibility, ticket_for) VALUES (?, ?, ?, ?, ?, ?);';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($user_id, $title, $content, $image_url, $visibility, $ticket_for))){
            $stmt = null;
            header("location: ../addTicket.php?error=addticketstmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function getAllTickets($user_id){
        $role = $_SESSION["role"];
        if($role == 'suppTechPart' || $role == 'suppOffice'){
            $sql = 'SELECT * FROM tickets WHERE user_id = ? OR ticket_for = "'. $role .'";';
        } else {
            $sql = 'SELECT * FROM tickets WHERE user_id = ? OR visibility = "forEveryone";';
        }
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($user_id))) {
            $stmt = null;
            header("location: ../Dashboard.php?error=stmtselectallticketsfailed");
            exit();
        }

        $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["allTickets"] = $tickets;

        $stmt = null;
    }

    protected function getTicketById($ticket_id){
        $sql = 'SELECT * FROM tickets WHERE ticket_id = ?;';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($ticket_id))) {
            $stmt = null;
            header("location: ../Dashboard.php?error=stmtselectallticketsfailed");
            exit();
        }

        session_start();
        $ticket = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["currentTicket"] = $ticket;

        $stmt = null;
    }
}