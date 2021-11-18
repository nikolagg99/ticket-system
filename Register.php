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
    <title>Register</title>
</head>

<body>
    <div class="container form-container">
        <form action="includes/signup.php" class="m-auto login-form p-6" method="post">
            <h2 class="text-color">Register</h2>

            <div class='form-group text-color'>
                <label for="username">Username: </label>
                <input type="=text" class="form-control" name="username" placeholder="Username" />
            </div>

            <div class='form-group text-color'>
                <label for="password">Password: </label>
                <input type="password" class="form-control" name="password" placeholder="Password" />
            </div>

            <div class='form-group text-color'>
                <label for="confPassword">Confirm Password: </label>
                <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" />
            </div>

            <div class='form-group text-color'>
                <label for="fname">First Name: </label>
                <input type="=text" class="form-control" name="fname" placeholder="First Name" />
            </div>

            <div class='form-group text-color'>
                <label for="lname">Last Name: </label>
                <input type="=text" class="form-control" name="lname" placeholder="Last Name" />
            </div>

            <div class='form-group text-color'>
                <label for="role">Role:</label>
                <select id="role-select" name="role" class="form-control">
                    <option value="junior">Programmer - Junior</option>
                    <option value="mid">Programmer - Mid-level</option>
                    <option value="senior">Programmmer - Senior</option>
                    <option value="suppOffice">Support - Office</option>
                    <option value="suppTechPart">Support - Technical part</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn register-btn m-auto text-light" name="registerBtn">Register</button>
                <a href="Login.php" class="btn login-btn text-light m-auto">Login</a>
            </div>

        </form>

    </div>
</body>

</html>