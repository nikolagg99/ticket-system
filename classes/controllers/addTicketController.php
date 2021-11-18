<?php

class AddTicketController extends Ticket {
    private $user_id;
    private $title;
    private $content;
    private $image_url;
    private$visibility;
    private $ticket_for;

    public function __construct($user_id, $title, $content, $image_url, $visibility, $ticket_for) {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->content = $content;
        $this->image_url = $image_url;
        $this->visibility = $visibility;
        $this->ticket_for = $ticket_for;
    }

    public function addTicket() {
        if($this->emptyInput() == false) {
            header("location: ../CreateTicket.php?error=emptyInput");
        }

        $this->setTicket($this->user_id, $this->title, $this->content, $this->image_url, $this->visibility, $this->ticket_for); 
    }
    
    // Checks if there is an empty input
    private function emptyInput() {
        $result;
        if(empty($this->user_id) || empty($this->title) || empty($this->content) || empty($this->image_url) || empty($this->visibility) || empty($this->ticket_for)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
