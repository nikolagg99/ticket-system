<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_SESSION['userid'])) {
        include "includes/getTickets.php";
        $result = $_SESSION["allTickets"];
    ?>

        <form action="includes/addTicket.php" class="w-75 create-ticket-form p-3 mt-5 mx-auto" method="post" enctype="multipart/form-data">
            <h2 class="text-center text-primary text-color"><u>Create Ticket</u></h2>
            <div class="form-group">
                <label for="title" class="text-color">Title</label>
                <input type="text" name="title" class="form-control text-color" id="title" placeholder="Ticket title...">
            </div>

            <div class="form-group">
                <label for="content" class="text-color">Content: </label>
                <textarea class="form-control" name="content" id="content" rows="3" placeholder="Your content here...."></textarea>
            </div>

            <div class="form-group">
                <label for="image" class="text-color">Choose image: </label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>

            <div class="form-group">
                <label for="visibleFor" class="text-color">Visibility: </label>
                <select name="visibility" class="form-control" id="visibleFor">
                    <option value="forMe" class="text-color">For me</option>
                    <option value="forEveryone" class="text-color">For everyone</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ticketfor" class="text-color">Ticket for: </label>
                <select name="ticketFor" class="form-control" id="ticketfor">
                    <option value="suppOffice" class="text-color">Support - Office</option>
                    <option value="suppTechPart" class="text-color">Support - Technical part</option>
                </select>
            </div>

            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyInput") {
            ?>
                    <span class="text-danger">All fields are required!!!</span><br />

            <?php
                }
            }
            ?>
            <div class="form-group text-center">
                <button type="submit" name="createTicketBtn" class="btn create-ticket-btn text-light w-75 mx-auto">Create</button>
            </div>

            <div class="form-group text-center">
                <a href="Dashboard.php" class="text-color"><u>Back to dashboard</u></a>
            </div>

        </form>
    <?php
    } else {
        header('Location: Login.php');
    }
    ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>