<?php 
include('../connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <title>Add Content</title>
</head>
<body>
    <h1>Add Content</h1>
    <form action="add-action.php" method="POST">
        <div class="form-group">
            <label class="form-label" for="">Content Name</label>
            <input class="form-control"  type="text" name="name" placeholder="name" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="">Video Link</label>
            <input class="form-control"  type="text" name="links" placeholder="Video Link" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="">Type</label>
            <input class="form-control"  type="text" name="types" placeholder="Type" required>
        </div>
        <div  class="form-group">
            <label class="form-label" for="">Course</label>
            <select  class="form-control"  name="course" id="" required>
            <option style="display:none">Choose Course</option>
            <?php 
            $query = "SELECT * FROM course";
            $sql = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($sql)) {
                echo "<option value='".$row['id']."'>".$row['name']."</option>";
            }
            ?>
        </select>
        </div>
        <div class="form-group">
            <input class="btn btn-primary form-group" type="submit" name="submit">
        </div>
    </form>
    
    <a class="btn btn-danger"  href="../index.php">Back</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>