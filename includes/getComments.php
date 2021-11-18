<?php

// Grab data
$ticketID = $_SESSION['ticket_id'];

// Instantiate classes
include "classes/Dbh.php";
include "classes/comment.php";
include "classes/controllers/getCommentController.php";

// Running get comments function
$comments = new GetCommentController($ticketID);
$comments->printComments();
