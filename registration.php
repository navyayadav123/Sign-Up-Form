<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
        <?php
        require('db.php');
        // If form submitted, insert values into the database.
        if (isset($_REQUEST['username'])) {
                // removes backslashes
                $username = stripslashes($_REQUEST['username']);
                //escapes special characters in a string
                $username = mysqli_real_escape_string($con, $username);
                $email = stripslashes($_REQUEST['email']);
                $email = mysqli_real_escape_string($con, $email);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);
                $trn_date = date("Y-m-d H:i:s");
                $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '$password', '$email', '$trn_date')";
                $result = mysqli_query($con, $query);
                if ($result) {
                        echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
                }
        } else {
        ?>
                <div class="box">
                        <div class="form">
                                <h1>Registration</h1>
                                <form name="registration" action="" method="post">

                                        <input type="text" name="username" placeholder="Username" required />

                                        <div>
                                                <input type="email" name="email" placeholder="Email" required />
                                        </div>
                                        <div>

                                                <input type="password" name="password" placeholder="Password" required />
                                        </div>

                                        <div>

                                                <input type="submit" name="submit" value="Register" />
                                        </div>

                                </form>
                        </div>
                </div>
        <?php } ?>
</body>

</html>