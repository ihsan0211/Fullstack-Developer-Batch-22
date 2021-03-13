<?php 
include("../connection.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM content WHERE id = '$id'";
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
    <title>Add Content</title>
</head>
<body>
    <form action="edit-action.php" method="POST">
        <div>
            <label class="form-label" for="">Content Name</label>
            <input class="form-control"  type="text" name="name" value="<?php echo $row['name'];?>" required>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>" >
        </div>
        <div>
            <label class="form-label" for="">Video Link</label>
            <input class="form-control"  type="text" name="links" value="<?php echo $row['video_link'];?>" required>
        </div>
        <div>
            <label class="form-label" for="">Type</label>
            <input class="form-control"  type="text" name="types" value="<?php echo $row['type'];?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Course</label>
            <select  class="form-control"  name="course" id="" value="<?php echo $row['id_course'];?>" required>
            <option style="display:none">Choose Course</option>
            <?php 
            $id_course = $row['id_course'];

            $query1 = "SELECT * FROM course";
            $sql = mysqli_query($conn, $query1);

            
            $query11 = "SELECT * FROM course WHERE id = $id_course";
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
        <input class="btn btn-primary" type="submit" name="submit">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>