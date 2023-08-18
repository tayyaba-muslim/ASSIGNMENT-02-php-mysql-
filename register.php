<?php

include('conn.php');
$idErr = $nameErr = $ageErr = $genderErr = $emailErr = $passwordErr = "";
$id = $name = $age = $gender = $email = $password = "";

if(isset($_POST['submit'])) {
    $name = ($_POST["name"]);
    $age = ($_POST["age"]);
    $gender = ($_POST["gender"]);
    $email = ($_POST["email"]);
    $password = ($_POST["password"]);

    if (empty($name)) {
        $nameErr = "Name is required";
    }

    if (empty($age)) {
        $ageErr = "Age is required";
    }

    if (empty($gender)) {
        $genderErr = "Gender is required";
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    }

    if (empty($password)) {
        $passwordErr = "Password is required";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT); 
    }

    if (empty($nameErr) && empty($ageErr) && empty($genderErr) && empty($emailErr) && empty($passwordErr)) {
        $query = "INSERT INTO `register` (`name`, `age`, `gender`, `email`, `password`) 
                  VALUES ('$name', '$age', '$gender', '$email', '$password')";
        
        $result = mysqli_query($connect, $query);
        if ($result) {
            header("Location: http://localhost:82/Registered%20Form/login.php");
            exit();
        } else {
            echo "Query failed";
        }
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
 <link rel="stylesheet" href="registerstyle.css">
    <title>Form handling </title>
</head>
<body>
    
<div class="container">
<h1><span class="error1">Indicates required field </span></h1>
<form action="register.php" class="form-group" method="post">
<label for="id"> id </label>
<input type="number" name="id" class="form-control">
<span class="error">* <?php echo $idErr; ?></span>
<br>
<label for="name"> Name </label>
<input type="text" name="name" class="form-control" placeholder="Enter Your Name">
<span class="error">* <?php echo $nameErr; ?></span>
<br>
<label for="age"> Age </label>
<input type="number" name="age" class="form-control"placeholder="Enter Your Age">
<span class="error">* <?php echo $ageErr; ?></span>
<br>
<label for="gender"> gender </label>
<input type="text" name="gender" class="form-control"placeholder="Please Your Gender">
<span class="error">* <?php echo $genderErr; ?></span>
<br>
<label for="email"> email </label>
<input type="email" name="email" class="form-control" placeholder="Please Enter Email">
<span class="error">* <?php echo $emailErr; ?></span>
<br>
<label for="password"> password </label>
<input type="password" name="password" class="form-control" placeholder="Enter Password">
<span class="error">* <?php echo $passwordErr; ?></span>
<br>
<input type="submit" name = "submit" value="Register" class="btn btn-primary">



</form>

</div>

</body>
</html>