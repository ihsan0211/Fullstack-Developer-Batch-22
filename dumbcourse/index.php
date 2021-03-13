<?php 
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <title>Dumb-Course</title>
</head>
<body style="background-color: black;">
<div class="container " style="background-color: black;">
    <nav class="navbar navbar-dark bg-dark" >
    <div class="container-fluid">
        <span class="navbar-brand">Dumb-<span class="" style="color: #e75300;">Course</span></span>
        <a class="btn text-white" style="background-color: #e75300;" href="course/add.php">Add Course</a>
        <a class="btn text-white" style="background-color: #e75300;" href="author/add.php">Add Author</a>
        <a class="btn text-white" style="background-color: #e75300;" href="content/add.php">Add Content</a>
    </div>
    </nav>
    <div class="row">
    </div>
    <div class="row ">
        <?php 
        $sql = "SELECT course.id, 
        course.name, 
        course.thumbnail, 
        author.name AS author, 
        course.duration, 
        course.description
        FROM course
        LEFT JOIN author ON course.id_author = author.id
        ";
        $result = mysqli_query($conn, $sql);
        
        
        if(!$result) {
            die ("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
        }
        $no = 1;

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col mt-3">
            <div class="card bg-dark p-2" style="width: 15rem;">
                <img src="pictures/<?php echo $row['thumbnail']; ?>" class="card-img-top" style="width:222px;height:222px;" alt="...">
                <div class="card-body position-relative">
                    <h5 class="card-title text-white"><?php echo $row['name']; ?></h5>
                    <span class="card-title position-absolute top-0 end-0 text-white">Author: <?php echo $row['author']; ?></span>
                    <p class="card-text text-white-50"><?php echo substr($row['description'], 0, 30); ?>...</p>
                    <p class="card-text text-white-50"><?php echo $row['duration']; ?></p>
                </div>
                <a class="btn btn-dark" style="color: blue;" href="course/details.php?id=<?php echo $row['id']; ?>">Detail</a>
            </div>
        </div>

        <?php 
        }
        ?>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>