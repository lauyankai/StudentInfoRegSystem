<html>
    <head>
        <title>Admin Registration</title>
        <link link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    
    <body class="d-flex flex-column align-items-center justify-content-center bg-light vh-100">
        <div class="container text-center" style="max-width:1000px;">
            <h2>Admin Registration</h2><br>
        </div>
        
        <div class="container" style="max-width:400px;">
            <div class="card p-2 shadow-lg">
                <div class="card-body text-center">
                    <form action="register-admin.php" method="POST">
                        <label for="name" class="form-label">Name:</input><br>
                        <input type="text" id="name" name="username" class="form-control"><br>
                        <label for="password" class="form-label">Password:</input><br>
                        <input type="password" id="password" name="password" class="form-control"><br>
                        <input type="submit" class="btn btn-primary" value="Register-admin"><br>
                    </form>
                </div>
            </div>
        </div>
        <p class="text-center mt-4 text-muted">Already have an account? </p>
        <a href="index.php">Login here.</a>

    </body>
</html>

<?php
    include "db.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
        $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
    
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>