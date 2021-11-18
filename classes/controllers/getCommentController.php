<?php

class GetCommentController extends Comment {
    private $ticket_id;

    public function __construct($ticket_id) {
        $this->ticket_id = $ticket_id;
    }

    public function printComments() {
        $this->getComments($this->ticket_id);
    }
}