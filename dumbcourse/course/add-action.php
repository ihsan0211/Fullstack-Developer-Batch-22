<?php 
include('../connection.php');

$name = $_POST['name'];
$img = $_FILES['image']['name'];
$author = $_POST['author'];
$duration = $_POST['duration'];
$description = $_POST['description'];


if(isset($_POST['submit'])) {
    //
    $allowed = array('png', 'jpg','jpeg');
    $x = explode('.', $img);
    $extention = strtolower(end($x));
    $file_tmp = $_FILES['image']['tmp_name'];
    $angka_acak = rand(1,999);
    $newImgName = $angka_acak.'-'.$img;
    
    if(in_array($extention, $allowed)){
        //
        move_uploaded_file($file_tmp, '../pictures/'.$newImgName);
        $query = "INSERT INTO course (name, thumbnail, id_author, duration, description) VALUES ('$name', '$newImgName', '$author', '$duration' ,  '$description')";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            //
            die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
        } else {
            //
            echo "<script>alert('Added'); window.location='../index.php';</script>";
        }
    } else {
        //
        echo "<script>alert('Only jpg or png'); window.location = 'add.php';</script>";
    }
}

?>