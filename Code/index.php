<html>
    <head>
        <title>Login</title>
        <link link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body class="d-flex flex-column align-items-center justify-content-center bg-light vh-100">
        <div class="container text-center" style="max-width:1000px;">
            <h1>Student Information Registration System</h1><br>
        </div>
        <div class="container" style="max-width:400px;">
            <div class="card p-2 shadow-lg">
                <div class="card-body text-center">
                    <h3>Login</h3><br>
                    <form action="index.php" method="POST">
                        <label for="name" class="form-label">Name:</input>
                        <input type="text" id="name" name="username" class="form-control"><br>

                        <label for="password" class="form-label">Password:</input>
                        <input type="password" id="password" name="password" class="form-control"><br>

                        <input type="submit" class="btn btn-primary" value="Login">
                    </form>
                </div>
            </div>
            <p class="text-center mt-4 text-muted">Please contact faculty for account registration.</p>
        </div>
    </body>
</html>

<?php
    session_start();
    include "db.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];
    
        $sql = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                header("Location: main.php");
                exit();
            } else {
                echo "<script>alert('Invalid username or password')</script>";
            }
        } else {
            echo "<script>alert('No user found with the username.')</script>";
        }
    }
?>