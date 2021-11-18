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
    <title>Ticket</title>
</head>

<body>
    <?php
    if (isset($_SESSION['currentTicket'])) {
        $currentTicketResult = $_SESSION["currentTicket"];
        require "includes/getComments.php";
        $commentsResult = $_SESSION['comments'];

    ?>

        <section>
            <div class="container h-100 mt-5">
                <div class="row h-75 mb-5 justify-content-center align-items-center">
                    <div class="card border-primary bg-transparent col-sm m-2" style="width: 40rem; height:35rem; overflow:auto;">
                        <?php
                        foreach ($currentTicketResult as $key => $value) {
                            foreach ($value as $x => $x_value) {
                                if ($x == 'ticket_id') {
                        ?>
                                    <input type="hidden" name="ticketID" value="<?php echo $x_value; ?>" />
                                <?php
                                }
                                if ($x == 'image_url') {
                                ?>
                                    <div class="text-center">
                                        <img class="card-img-top mx-auto" src="uploads/<?= $x_value ?>" style="width: 20rem;" alt="Ticket image" />
                                    </div>
                                    <br>
                                <?php
                                }
                                if ($x == 'title') {
                                ?>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h3 class="card-title text-color"><?php echo $x_value; ?></h5>
                                        </div>
                                    <?php
                                }
                                if ($x == 'content') {
                                    ?>
                                        <p class="card-text text-color"><?php echo $x_value; ?></p>
                            <?php
                                }
                            }
                        }
                            ?>

                                    </div>
                    </div>

                    <!-- Comment field -->
                    <div class="col-sm border border-primary rounded m-3" style="width: 40rem; height:35rem; overflow:auto;">
                        <h4 class="p-2 text-color">Comments</h4>
                        <hr />
                        <form action="includes/addComment.php" method="post" enctype="multipart/form-data">
                            <h5 class="text-color">Add Comment: </h5>
                            <div class="form-group">
                                <label for="commentTextArea" class="text-color">Write comment: </label>
                                <textarea name="content" class="form-control" id="commentTextArea" rows="2"></textarea>
                                <label for="image" class='text-color'>Image for the comment: </label>
                                <input type="file" name="addCommentImage" class="form-control-file text-color" id="image">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn add-comment-button text-light" name="commentButton">Add comment</button>
                            </div>
                        </form>

                        <div class="container">
                            <?php
                            foreach ($commentsResult as $key => $value) {
                                foreach ($value as $row => $row_value) {
                                    if ($row == 'image_url') {
                            ?>
                                        <hr />
                                        <div class="p-1 row h-75">
                                            <div class="col-4">
                                                <img src="uploads/<?= $row_value ?>" style="width: 5rem;" alt="comment image" />
                                            </div>
                                        <?php
                                    }
                                    if ($row == 'content') {
                                        ?>
                                            <div class="col-8">
                                                <p class="text-color"><?php echo $row_value ?></p>
                                            </div>
                                        <?php
                                    }
                                    if ($row == 'username') {
                                        ?>
                                            <div class="col-12 d-flex flex-row-reverse">
                                                <p class="text-color"><b>By: <?php echo $row_value ?></b></p>
                                            </div>
                                        </div>
                                        <hr />
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- ------------------ -->
                </div>
                <div class="text-center mb-2">
                    <a href="./Dashboard.php" class="btn text-light to-ticket-list-button w-75">To Ticket List</a>
                </div>
            </div>
        </section>
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