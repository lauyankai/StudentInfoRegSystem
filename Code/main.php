<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }
?>

<html>
    <head>
        <title>Registration</title>
        <link link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <style>
        input[type="text"] {
            text-transform: uppercase;
        }
        
    </style>
    <body>
        <div class="container my-5">
            <h1>Hi, <?php echo $_SESSION['username']; ?>!<br>Welcome to Student Information Registration System</h1><br>
            <a href="register-admin.php" class="btn btn-success">Register New Faculty Admin</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
            <br><br><br><br><br><br>
            <a href="register.php" class="btn btn-primary">Register New Student</a> 
            <a href="view.php" class="btn btn-primary">View Student List</a>
        </div>
    </body>
</html>