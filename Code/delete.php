<?php

include "db.php"; 

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result){
        echo "<script>alert('Record deleted successfully'); window.location='view.php';</script>";
    } else {
        echo "<script>alert('Error deleting record'); window.location='view.php';</script>";
    }

}

?>