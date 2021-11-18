<?php

class AddCommentController extends Comment {
    private $ticket_id;
    private $username;
    private $image_url;
    private $content;

    public function __construct($ticket_id, $username, $image_url, $content) {
        $this->ticket_id = $ticket_id;
        $this->username = $username;
        $this->image_url = $image_url;
        $this->content = $content;
    }

    public function addComment() {
        // if($this->emptyInput() == false) {
        //     header("location: ../Ticket.php?error=emptyCommentInput");
        // }

        $this->setComment($this->ticket_id, $this->username, $this->image_url, $this->content);
    }

    // Checks if there is an empty input
    private function emptyInput() {
        $result;
        if(empty($this->ticket_id) || empty($this->username) || empty($this->image_url) || empty($this->content)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}