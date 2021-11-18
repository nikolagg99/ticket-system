<?php
session_start();

if(isset($_POST["createTicketBtn"]) && isset($_FILES["image"])) {

    //Prepare image
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $temp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    if($error === 0) {
        if($image_size > 125000) {
            $errorMsg = "Your file i too large!!!!";
            header("location: ../Dashboard.php?error=$errorMsg");
        } else {
            $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_extension_lower_case = strtolower($image_extension);

            $allowed_extensions = array("jpg", "jpeg", "png");

            if(in_array($image_extension_lower_case, $allowed_extensions)) {
                $new_image_name = uniqid("IMG-", true) . '.' . $image_extension_lower_case;
                $image_upload_path = '../uploads/' . $new_image_name;
                move_uploaded_file($temp_name, $image_upload_path);
            } else {
                $errorMsg = "You can't upload files of this type!!!!";
                header("location: ../Dashboard.php?error=$errorMsg");
            }
        }

    } else {
        $errorMsg = "Unknown error occured!";
        header("location: ../Dashboard.php?error=$errorMsg");
    }

    // Grab the data
    $userID = $_SESSION["userid"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $image = $new_image_name;
    $visibility = $_POST["visibility"];
    $ticketFor = $_POST["ticketFor"];

    // Instatiate addTicket controller class
    include "../classes/Dbh.php";
    include "../classes/ticket.php";
    include "../classes/controllers/addTicketController.php";

    $addTicket = new AddTicketController($userID, $title, $content, $image, $visibility, $ticketFor);

    // Running error handlers and addTicket function
    $addTicket->addTicket();

    // Going back to dashboard page
    header("location: ../Dashboard.php?error=none");
}