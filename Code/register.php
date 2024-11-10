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
            <h1 class="display-5 text-center">Student Registration</h1><br>

            <nav class="navbar navbar-expand navbar-light shadow-sm" style="background-color: #e3f2fd;">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link active" href="register.php">Add New Student</a>
                            <a class="nav-item nav-link" href="view.php">View Student List</a>
                            <a class="nav-item nav-link" href="main.php">Main Page</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-text pe-3">
                    <div class="d-flex align-items-center p-2" style="background-color: #f8f9fa; border-radius: 10px; border: 1px solid #ddd;">
                        <span class="text-dark fw-bold p-2"><?php echo $_SESSION['username'];?></span>
                        <form action="logout.php" method="POST" class="m-0 p-0">
                            <button class="btn btn-outline-danger"">Logout</button>
                        </form>
                    </div>
                </div>
            </nav><br>

        <div class="card p-4 shadow-sm">
            <form action="register.php" method="POST" class="form">  
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="name">Name:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" required><br>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label" for="IC">Identification Number:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="IC" required><br>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label" for="email">Email:</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" required><br>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label" for="phone">Phone Number:</label>
                    <div class="col-sm-5">
                        <input type="tel" class="form-control" name="phone" pattern="\d+" title="Please enter only numbers" required><br>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Gender:</label>
                    <div class="col-sm-5">
                        <input type="radio" id="male" name="gender" value="Male">
                        <label for="male" class="form-check-label me-3">Male</label>
                        <input type="radio" id="female" name="gender" value="Female">
                        <label for="female" class="form-check-label me-3">Female</label><br>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nationality">Nationality:</label>
                    <div class="col-sm-5">
                        <select id="nationality" name="nationality" class="form-select form-select-sm">
                            <option value="Malaysian">Malaysian</option>
                            <option value="Non-Malaysian">Non-Malaysian</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="course">Course:</label>
                    <div class="col-sm-5">
                        <select id="course" name="course" class="form-select form-select-sm">
                            <option value="" disabled selected>Select your program</option>
                            <option value="SE">Software Engineering</option>
                            <option value="DE">CS (Data Engineering)</option>
                            <option value="Networking">CS (Security and Networking)</option>
                            <option value="Bioinformatics">CS (Bioinformatics)</option>
                            <option value="Graphics">CS (Graphics and Multimedia)</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-1">
                    <label class="col-sm-2 col-form-label" for="preU">Pre-University:</label>
                    <div class="col-sm-5">
                        <select id="preU" name="preU" class="form-select form-select-sm">
                            <option value="" disabled selected>Select your pre-university</option>
                            <option value="STPM">STPM</option>
                            <option value="A-level">A-Level</option>
                            <option value="Foundation">Matriculation/Foundation</option>
                            <option value="Diploma">Diploma</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="reset" class="btn btn-danger me-1">Reset</button>
                    <button type="submit" class="btn btn-success">Register</button>
                </div>
            </form>
        </div>
</html>

<?php

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $name = strtoupper($name);
    $IC = $_POST["IC"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $nationality = $_POST["nationality"];
    $course = $_POST["course"];
    $preU = $_POST["preU"];

    $sql = "INSERT INTO students (name, IC, email, phone, gender, nationality, course, preU) VALUES ('$name', '$IC', '$email', '$phone', '$gender', '$nationality', '$course', '$preU')";

    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('New student record created successfully')</script>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
    }
}


?>