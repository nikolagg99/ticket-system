<?php
//session_start();
    // Instatiate addTicket controller class
    include "classes/Dbh.php";
    include "classes/ticket.php";
    include "classes/controllers/getAllTicketsController.php";

    $userID = $_SESSION["userid"];
    $allTickets = new GetAllTicketsController($userID);

    // Running error handlers and addTicket function
    $allTickets->printAllTickets();

   