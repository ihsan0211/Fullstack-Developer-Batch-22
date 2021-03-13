<?php 
include("../connection.php");
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
    <h1>Add Course</h1>
    <form action="add-action.php" method="POST" enctype="multipart/form-data">

        <div>
            <label class="form-label" for="">Course Name</label>
            <input class="form-control" type="text" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Thumbnail</label>
            <input  class="form-control" type="file" name="image" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Author</label>
            <select  class="form-control"  name="author" id="" required>
            <option style="display:none">Choose Author</option>
            <?php 
            $query = "SELECT * FROM author";
            $sql = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($sql)) {
                echo "<option value='".$row['id']."'>".$row['name']."</option>";
            }
            ?>
        </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Duration</label>
            <input  class="form-control" type="text" name="duration" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Description</label>
            <input  class="form-control" type="text" name="description">
        </div>
        <input class="btn btn-primary" type="submit" name="submit">
        <a class="btn btn-warning" href="../index.php">Kembali</a>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>