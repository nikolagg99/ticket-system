<?php

class GetTicketByIdController extends Ticket {
    private $ticket_id;

    public function __construct($ticket_id) {
        $this->ticket_id = $ticket_id;
    }

    public function printCurrentTicket() {
        $this->getTicketById($this->ticket_id);
    }
        
}