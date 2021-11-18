<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="container form-container">
        <form action="includes/login.php" class="m-auto login-form p-6" method="post">
            <h2 class="text-color">Login</h2>

            <div class='form-group text-color'>
                <label for="username">Username: </label>
                <input type="=text" class="form-control" name="username" placeholder="Username" />
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "usernotfound") {
                ?>
                    <span class="text-danger">User not found!!!</span><br />

                <?php
                }
            }
                ?>
            </div>

            <div class='form-group text-color'>
                <label for="password">Password: </label>
                <input type="password" class="form-control" name="password" placeholder="Password" />
            </div>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyInput") {
            ?>
                    <span class="text-danger">All fields are required!!!</span><br />
                <?php
                }
                if ($_GET['error'] == "wrongpassword") {
                ?>
                    <span class="text-danger">Incorrect password!!!</span><br />

            <?php
                }
            }
            ?>
            <br />
            <div class="text-center">
                <span class="text-color text-center">You don't have an account yet? Register <a href="Register.php"><u>here!</u></a></span>
            </div>
            <div class="text-center">
                <button type="submit" class="btn login-btn" name="loginBtn">Login</button>
            </div>

        </form>

    </div>
</body>

</html>