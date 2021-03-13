<?php 
include('../connection.php');

$name = $_POST['author'];

if(isset($_POST['submit'])) {
    $query = "INSERT INTO author (name) VALUES ('$name')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else {
        echo "<script>alert('Added'); window.location='../index.php';</script>";
    }
}

?>