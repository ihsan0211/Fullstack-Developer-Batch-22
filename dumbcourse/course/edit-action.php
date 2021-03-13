<?php 
include('../connection.php');

$id = $_POST['id'];
$name = $_POST['name'];
$img = $_FILES['image']['name'];
$author = $_POST['author'];
$duration = $_POST['duration'];
$description = $_POST['description'];


if(isset($_POST['submit'])) {
    //
    if($_FILES['image']['name']) {

        $allowed = array('png', 'jpg','jpeg');
        $x = explode('.', $img);
        $extention = strtolower(end($x));
        $file_tmp = $_FILES['image']['tmp_name'];
        $angka_acak = rand(1,999);
        $newImgName = $angka_acak.'-'.$img;
        
        if(in_array($extention, $allowed)){
            //
            move_uploaded_file($file_tmp, '../pictures/'.$newImgName);
            $query = "UPDATE course SET name = '$name', thumbnail = '$newImgName', id_author = '$author', duration = '$duration' , description =  '$description'  WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
            if(!$result) {
                //
                die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
            } else {
                //
                echo "<script>alert('Edited'); window.location='../index.php';</script>";
            }
        } else {
            //
            echo "<script>alert('Only jpg or png'); window.location = '../index.php';</script>";
        }
    
    
    } else {
        $query = "UPDATE course SET name = '$name', id_author = '$author', duration = '$duration' , description =  '$description' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            //
            die("Query failed".mysqli_errno($conn)." - ".mysqli_error($conn));
        } else {
            //
            echo "<script>alert('Edited'); window.location='../index.php';</script>";
        }

    }
}

?>