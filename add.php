<?php
require 'config.php';
if ($_POST) {
    $title = $_POST['title'];
    $dec = $_POST['description'];
    
    $sql = "INSERT INTO todo (title, description) VALUES (:title, :description)";
    $pdoStatment = $conn->prepare($sql);
    $result = $pdoStatment->execute([
        ':title' => $title,
        ':description' => $dec
    ]);
    if ($result) {
        echo "<script>alert('Success');window.location.href='index.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Page</title>
    <!-- css Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create To Do New</h2>
            <form action="add.php" method="post">
                <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" id="" class="form-control" require>
                </div>
                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="" class="form-control" require></textarea>
                </div>
                <div class="form-group mb-3">
                    <input type="submit" value="Submit" class="btn btn-danger">
                    <a href="index.php" class="btn btn-danger" type="button">Home Page</a>
                </div>
            </form>
        </div>
    </div>
</body>
<!-- css js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>