<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }
?>

<html>
    <head>
        <title>Student List</title>
        <link link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
        <div class="container my-5">    
            <h1 class="display-5 text-center">Student List</h1><br>
            
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
        
            <table class="table table-bordered table-striped align-middle">
                <thread class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Identification Number</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Nationality</th>
                        <th>Course</th>
                        <th>Pre-University</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </tr>
                </thread>
            <?php

            include "db.php";
            $sql = "SELECT * FROM students";
            $result = mysqli_query($conn, $sql);

            $course_mapping = [
                "SE" => "Software Engineering",
                "DE" => "Computer Science (Data Engineering)",
                "Networking" => "Computer Science (Security and Networking)",
                "Bioinformatics" => "Computer Science (Bioinformatics)",
                "Graphics" => "Computer Science (Graphics and Multimedia)"
            ];

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["IC"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["nationality"] . "</td>";

                    $course_code = $row["course"];
                    $course_name = isset($course_mapping[$course_code]) ? $course_mapping[$course_code] : "Unknown Course";
                    
                    echo "<td>" . $course_name . "</td>";
                    echo "<td>" . $row["preU"] . "</td>";
                    echo "<td> <a href='update.php?id=".$row['id']."' class='btn btn-info'> Edit </a> </td>";
                    echo "<td> <a href='delete.php?id=".$row['id']."' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to delete this record?');\"> Delete </a> </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No record found</td></tr>";
            }

            ?>
        </table> </div>
    </body>
</html>
