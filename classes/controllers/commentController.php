<?php

class CommentsController extends Comment {
    private $ticket_id;

    public function __construct($ticket_id) {
        $this->ticket_id = $ticket_id;
    }

    public function getComments() {
        $this->getComment($this->ticket_id);
    }
}