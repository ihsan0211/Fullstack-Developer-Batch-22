<?php 
include('../connection.php');

$name = $_POST['name'];
$links = $_POST['links'];
$types = $_POST['types'];
$course = $_POST['course'];

if(isset($_POST['submit'])) {
    $query = "INSERT INTO content (name, video_link, type, id_course) VALUES ('$name', '$links', '$types', '$course')";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else {
        echo "<script>alert('Added'); window.location='../index.php';</script>";
    }
}

?>