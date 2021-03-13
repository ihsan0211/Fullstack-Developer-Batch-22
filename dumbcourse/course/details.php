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

    <title>Course Details</title>
</head>
<body style="background-color: black;">
<div class="container " style="background-color: black;">
    <?php 
    if(isset($_GET['id'])) {
        $id_course = $_GET['id'];
        $sql = "SELECT content.id, 
        content.name, 
        content.video_link AS link, 
        content.type,
        content.id_course,
        course.name AS course 
        FROM content
        LEFT JOIN course ON content.id_course = course.id
        WHERE id_course = '$id_course'
        ";
    
        
        $result = mysqli_query($conn, $sql);
            
            
        if(!$result) {
            die ("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
        }
        $query = "SELECT * FROM course where id = '$id_course'";
        $result1 = mysqli_query($conn, $query);
        if ($row1 = mysqli_fetch_assoc($result1)) {
            ?>
            <nav class="navbar navbar-dark bg-dark" >
                <div class="container-fluid">
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $row1['id']; ?>">Delete Course</a>
                    <a class="btn btn-warning" href="edit.php?id=<?php echo $row1['id']; ?>">Edit Course</a>
                    <a class="btn btn-info" href="../content/add.php">Add Content</a>
                </div>
            </nav>
            <h1 class="text-white"><?php echo $row1['name']; ?></h1>
             <?php 
        }
        

        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="p-3 row  d-grid gap-2 container">
                <div class="card bg-dark border border-danger border-5 rounded-3">
                    <div class="row">
                        <ul>
                            <span class="card-title text-white"><?php echo $no ?></span>
                            <p class="card-title text-white">Name: <?php echo $row['name']; ?></p>
                            <p class="card-title text-white">Video: <a href="<?php echo $row['link']; ?>" target="_blank">link</a></p>
                            <p class="card-title text-white">Type: <?php echo $row['type'];  ?></p>
                            <a class="btn btn-warning" href="../content/edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a class="btn btn-danger" href="../content/delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </ul>
                    </div>

                </div>

            </div>
            <?php 
            $no++;
        }
    }
        ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        
</body>
</html>