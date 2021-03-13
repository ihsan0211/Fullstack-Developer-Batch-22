<?php 
include("../connection.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM course WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);

    if(!count($row)) {
        echo "<script>alert('Data not found.');window.location='../index.php'</script>";
    }
} else {
    echo "<script>alert('Error ID');window.location='../index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <title>Tambah buku</title>
</head>
<body>
    
    <h1>Edit <?php echo $row['name']?> Course </h1>
    <form action="edit-action.php" method="POST" enctype="multipart/form-data">

        <div>
            <label class="form-label" for="">Course Name</label>
            <input class="form-control" type="text" name="name" value="<?php echo $row['name'];?>" required>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>" >
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Thumbnail</label>
            <img src="../pictures/<?php echo $row['thumbnail'];?>"style="width: 200px; margin: 5px;"  >
            <input  class="form-control" type="file" name="image" >
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Author</label>
            <select  class="form-control"  name="author" id="" required>
            <?php 
            $id_author = $row['id_author'];

            $query1 = "SELECT * FROM author";
            $sql = mysqli_query($conn, $query1);

            
            $query11 = "SELECT * FROM author WHERE id = $id_author";
            $sql1 = mysqli_query($conn, $query11);
            if($row11 = mysqli_fetch_array($sql1)){
                ?> <option selected style="display:none" value="<?php echo $row11['id'] ?>"><?php echo $row11['name'] ?></option>
                <?php 
            }
            while ($row1 = mysqli_fetch_array($sql)) {
                echo "<option value='".$row1['id']."'>".$row1['name']."</option>";
            }
            ?>
        </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Duration</label>
            <input  class="form-control" type="text" name="duration" value="<?php echo $row['duration'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Description</label>
            <input  class="form-control" type="text" name="description" value="<?php echo $row['description'] ?>" required>
        </div>
        <input class="btn btn-primary" type="submit" name="submit">
        <a class="btn btn-warning" href="../index.php">Kembali</a>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>