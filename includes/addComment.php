<?php
session_start();

if(isset($_POST['commentButton'])) {
    // Prepare image
    $img_name = $_FILES['addCommentImage']['name'];
    $img_size = $_FILES['addCommentImage']['size'];
    $temporary_name = $_FILES['addCommentImage']['tmp_name'];
    $error = $_FILES['addCommentImage']['error'];

    if($error === 0) {
        if($img_size > 1250000) {
            $errorMessage = "Your file is too large!!!";
            header("location: ../Ticket.php?error=$errorMessage");
        } else {
            $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_extension_lower_case = strtolower($img_extension);

            $allowed_extensions = array("jpg", "jpeg", "png");

            if(in_array($img_extension_lower_case, $allowed_extensions)) {
                $new_img_name = uniqid("IMG-COMM-", true) . '.' . $img_extension_lower_case;
                $img_upload_path = '../uploads/' . $new_img_name;
                move_uploaded_file($temporary_name, $img_upload_path);
            } else {
                $errorMessage = "You can't upload filers of this type!!!";
                header("location: ../Ticket.php?error=$errorMessage");
            }
        }
    } else {
        $errorMessage = "Unknown error occured!!!";
        header("location: ../Ticket.php?error=$errorMessage");
    }

    // Grab the data
    $ticketID = $_SESSION['ticket_id'];
    $username = $_SESSION['user_username'];
    $image_url = $new_img_name;
    $content = $_POST['content'];

    // Instatiate add comment controller class
    include "../classes/Dbh.php";
    include "../classes/comment.php";
    include "../classes/controllers/addCommentController.php";

    //running addComment function
    $addComment = new AddCommentController($ticketID, $username, $image_url, $content);
    $addComment->addComment();

    header("location: ../Ticket.php?error=none");
}