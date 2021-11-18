<?php
session_start();
if (isset($_POST['view'])) {
    require "includes/getCurrentTicket.php";
}
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
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top border-bottom">
        <div class="w-100">
            <?php
            if (isset($_SESSION['userid'])) {
                include "includes/getTickets.php";
                $result = $_SESSION["allTickets"];
            ?>
                <h3 class="float-left text-light"><?php echo $_SESSION["user_username"]; ?></h3>
                <button type="button" class="logout-btn btn float-right text-light border-light rounded"><a class="text-light" href="includes/logout.php">Logout</a></button>
            <?php
            } else {
                header('Location: Login.php');
            }
            ?>
        </div>
    </nav>

    <!-- -----Section with all visible tickets for the user----- -->
    <section class="mt-5 pb-5">

        <div class="container m-auto overflow-auto ticket-container">
            <div class="col-md-12">
                <?php
                if (($_SESSION["role"] == 'junior') || ($_SESSION["role"] == 'mid') || ($_SESSION["role"] == 'senior')) {
                ?>
                    <h1 class="text-color text-center pt-5">Tickets</h1>
                    <div class="row-fluid text-center mx-auto mb-3 ticket-view">
                        <a href="./CreateTicket.php" class="btn add-ticket-btn mt-3 mb-3 w-75 mx-auto"><b class="text-light">&plus;</b></a>
                    </div>
                <?php
                } else {
                ?>
                    <div class="row-fluid text-center mx-auto mb-3 pt-5 ticket-view">
                        <h2 class="text-color Text-center"><u>All tickets for you</u></h2>
                    </div>
                <?php
                }
                ?>

                <?php
                foreach ($result as $key => $value) {
                    foreach ($value as $x => $x_value) {
                        if ($x == 'ticket_id') {
                            $currentID = $x_value;
                        }
                        if ($x == 'title') {
                ?>
                            <div class="row-fluid view-container rounded mx-auto mb-5 overflow-auto ticket-view">
                                <div class="col-sm text-center">
                                    <h3 class="text-color mt-1"><?php echo $x_value; ?></h3>
                                </div>
                            <?php
                        }
                        if ($x == 'ticket_for') {
                            ?>
                                <div class="col-sm text-center">
                                    <p class="text-color mt-2"><?php echo $x_value; ?></p>
                                </div>

                                <div class="col-sm mx-auto text-center">
                                    <form method="POST">
                                        <input type="submit" class='btn view-ticket-btn text-light mt-1 mb-1 w-75' name="view" value="View" />
                                        <input type="hidden" name="ticketID" value="<?php echo $currentID; ?>" />
                                    </form>
                                    <hr />
                                </div>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- ---------------------------- -->

    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4 fixed-bottom border-top">
        <!-- Copyright -->
        <div class="footer-copyright text-center text-light py-3">© 2020 Copyright:
            <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>