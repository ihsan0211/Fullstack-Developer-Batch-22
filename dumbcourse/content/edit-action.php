<?php 
include('../connection.php');

$id = $_POST['id'];
$name = $_POST['name'];
$links = $_POST['links'];
$types = $_POST['types'];
$course = $_POST['course'];

if(isset($_POST['submit'])) {
    $query = "UPDATE content SET name = '$name', video_link = '$links', type = '$types', id_course = '$course' WHERE id = '$id' ";
    $result = mysqli_query($conn, $query);
    
    if(!$result) {
        die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else {
        echo "<script>alert('Edited'); window.location='../index.php';</script>";
    }
}

?>