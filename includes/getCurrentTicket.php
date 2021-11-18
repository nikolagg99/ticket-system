<?php

if(isset($_POST['view']) && $_POST['ticketID']) {
    // Grab the data
    $ticketID = $_POST['ticketID'];
    $_SESSION['ticket_id'] = $ticketID; 
    // Instatiate get ticket controller class
    include "classes/Dbh.php";
    include "classes/ticket.php";
    include "classes/controllers/getTicketByIdController.php";

    $currentTicket = new GetTicketByIdController($ticketID);

    // Running error handlers and get Ticket function
    $currentTicket->printCurrentTicket();

    // Going to Ticket page
    header("location: ./Ticket.php?error=none");
}