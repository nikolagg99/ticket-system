<?php

class GetAllTicketsController extends Ticket {
    private $user_id;

    public function __construct($user_id) {
        $this->user_id = $user_id;
    }

    public function printAllTickets() {
        $this->getAllTickets($this->user_id);
    }
}