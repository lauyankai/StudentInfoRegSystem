<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }
?>

<html>
    <head>
        <title>Update User</title>
        <link link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">
            <h1 class="display-5 text-center">Update User</h1><br>

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
        <?php
        include "db.php";

        if (isset($_GET["id"])){
            $id = $_GET["id"];
            $sql = "SELECT * FROM students WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        }
        ?>
        <div class="justify-content-center">
            <div class="card p-4 shadow-sm ">
                <form action="update.php?id=<?php echo $row['id']; ?>" method="POST" class="form">
                    <div class="row">
                        <label class="col-sm-2 col-form-label" for="name"> Name: </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required><br>
                            </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="IC">Identification Number:</label>
                            <div class="col-sm-5">
                                <input type="text" name="IC" class="form-control" value="<?php echo $row['IC']; ?>" required>
                            </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-5">
                            <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-sm-2 col-form-label">Phone Number:</label>
                        <div class="col-sm-5">
                            <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Gender:</label>
                        <div class="col-sm-5">
                            <input type="radio" id="male" name="gender" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?>>
                            <label for="male" class="form-check-label me-3">Male</label>
                            <input type="radio" id="female" name="gender" value="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?>>
                            <label for="female" class="form-check-label">Female</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nationality" class="col-sm-2 col-form-label">Nationality:</label>
                        <div class="col-sm-5">
                            <select id="nationality" name="nationality" class="form-select form-select-sm">
                                <option value="Malaysian" <?php echo ($row['nationality'] == 'Malaysian') ? 'selected' : ''; ?>>Malaysian</option>
                                <option value="Non-Malaysian" <?php echo ($row['nationality'] == 'Non-Malaysian') ? 'selected' : ''; ?>>Non-Malaysian</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="course" class="col-sm-2 col-form-label">Course:</label>
                        <div class="col-sm-5">
                            <select id="course" name="course" class="form-select form-select-sm">
                                <option value="" disabled>Select your program</option>
                                <option value="SE" <?php echo ($row['course'] == 'SE') ? 'selected' : ''; ?>>Software Engineering</option>
                                <option value="DE" <?php echo ($row['course'] == 'DE') ? 'selected' : ''; ?>>CS (Data Engineering)</option>
                                <option value="Networking" <?php echo ($row['course'] == 'Networking') ? 'selected' : ''; ?>>CS (Security and Networking)</option>
                                <option value="Bioinformatics" <?php echo ($row['course'] == 'Bioinformatics') ? 'selected' : ''; ?>>CS (Bioinformatics)</option>
                                <option value="Graphics" <?php echo ($row['course'] == 'Graphics') ? 'selected' : ''; ?>>CS (Graphics and Multimedia)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="preU" class="col-sm-2 col-form-label">Pre-University:</label>
                        <div class="col-sm-5">
                            <select id="preU" name="preU" class="form-select form-select-sm">
                                <option value="" disabled>Select your pre-university</option>
                                <option value="STPM" <?php echo ($row['preU'] == 'STPM') ? 'selected' : ''; ?>>STPM</option>
                                <option value="A-level" <?php echo ($row['preU'] == 'A-level') ? 'selected' : ''; ?>>A-Level</option>
                                <option value="Foundation" <?php echo ($row['preU'] == 'Foundation') ? 'selected' : ''; ?>>Matriculation/Foundation</option>
                                <option value="Diploma" <?php echo ($row['preU'] == 'Diploma') ? 'selected' : ''; ?>>Diploma</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-info"> Update User </button>
                    </div>
                </form>
            </div>
        </div>


        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST["name"];
            $IC = $_POST["IC"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $gender = $_POST["gender"];
            $nationality = $_POST["nationality"];
            $course = $_POST["course"];
            $preU = $_POST["preU"];

            $sql = "UPDATE students SET name='$name', IC='$IC', email='$email', phone='$phone', gender='$gender', nationality='$nationality', course='$course', preU='$preU' WHERE id=$id";

            if (mysqli_query($conn, $sql)){
                echo "<script>alert('Record updated successfully'); window.location='view.php';</script>"; 
            } else {
                echo "<div class='alert alert-danger mt-3'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
            }
        }
        ?>

        </div>
</html>