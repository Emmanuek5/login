<?php
session_start();
include('./connection.php');
include('./functions.php');

$user_data = check_login($con);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $oldpass = $_POST['pass'];
    $newpass = $_POST['pass1'];
    $newpass1 = $_POST['pass2'];
    if ($newpass === $newpass1) {

        if ($oldpass === $user_data['password']) {
            $id = $user_data['user_id'];

            $sql = "UPDATE `users` SET `password` = '$newpass' WHERE `user_id` = '$id'";
            $query = mysqli_query($con, $sql);
            $msg['success'] = "Your Password Has Been Updated Successfully ✔✔👍";
        } else {
            $msg['error'] = " Password Incorrect";
        }
    } else {
        $msg['error'] = "Passwords Do Not Match";
    }
}








?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/w3.css/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        
    </style>
</head>

<body>
    <header class="w3-container w3-teal">
        <h1> Profile</h1>
        <li class="w3-dropdown-hover">

            <a href="#" class="w3-btn">Options</a>
            <div class="w3-dropdown-content w3-white w3-card-4">
                <a href="./index.php">Home</a>
                <a href="./upload/">Upload</a>
                <a href="./profile.php">Profile</a>
                <a href="./sendmail.php">Mailer</a>
                <a href="./logout.php" class="w3-red">Logout</a>
            </div>
        </li>
    </header>
    <br>
    <br>
    <div class="w3-container">

        <form method="POST" class="w3-container w3-card-4">
            <div class="w3-container w3-pale-green w3-leftbar w3-border-green">
                <?php
                if (isset($msg['success'])) {
                    # code...

                ?><p class="w3-text-green"><?php echo $msg['success']; ?></p>
                    </p><?php } ?></div>
            <div class="w3-container w3-pale-red w3-leftbar w3-border-red">
                <?php
                if (isset($msg['error'])) {
                    # code...

                ?><p class="w3-text-red"><?php echo $msg['error']; ?></p>
                    </p><?php } ?></div>
            <p>
                <label class="w3-text-grey">Current Password</label>
                <input class="w3-input" name="pass" type="password" id="pass" required=""><i class="fa fa-eye" onclick="togle()" aria-hidden="true"></i>
            </p>
            <p>
                <label class="w3-text-grey">New Password</label>
            <input class="w3-input" name="pass1" type="password" id="passw" required=""><i class="fa fa-eye" onclick="toggles()" aria-hidden="true"></i>
            </p>
            <p>
                <label class="w3-text-grey">Confirm Password</label>
                <input class="w3-input" name="pass2" type="password" id="passws" required=""><i class="fa fa-eye" onclick="toggle()" aria-hidden="true"></i>
            </p>
            <p><button class="w3-btn w3-padding w3-teal" style="width:120px">Send &nbsp; ❯</button></p>

            <script>
                var state = false;

                function togle() {
                    if (state) {
                        document.getElementById("pass").setAttribute("type", "password");
                        state = false;
                    } else {
                        document.getElementById("pass").setAttribute("type", "text");
                        state = true;
                    }

                }

                function toggles() {
                    if (state) {
                        document.getElementById("passw").setAttribute("type", "password");
                        state = false;
                    } else {
                        document.getElementById("passw").setAttribute("type", "text");
                        state = true;
                    }

                }

                function toggle() {
                    if (state) {
                        document.getElementById("passws").setAttribute("type", "password");
                        state = false;
                    } else {
                        document.getElementById("passws").setAttribute("type", "text");
                        state = true;
                    }

                }
            </script>

        </form>
    </div>
</body>

</html>