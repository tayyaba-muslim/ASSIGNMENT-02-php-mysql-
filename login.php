<?php
include('conn.php');

if(isset($_POST['submit'])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM inform WHERE Email = '$email'AND password = '$password'";
    $result = $connect->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row['password'] === $password) { 
            session_start();
            $_SESSION["email"] = $email;
            header("Location: http://localhost:82/Registered%20Form/sucessfully.php");
            exit();
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "Invalid email or password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="loginstyle.css">
    <title>Log in</title>
</head>
<body>

    <div class="container">
        <form method="post" action="login.php" class="form-group">
            <h1>Login</h1>
            <label for="email">Email</label>
            <input type="Email" name="email" class="form-control" placeholder="Enter Email" required>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            <br>
            <input type="submit" value="Login" class="btn btn-success">
        </form>
    </div>

</body>

</html>