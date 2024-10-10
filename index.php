<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- css Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <?php
    $statment = $conn->prepare("SELECT * FROM todo ORDER BY id DESC");
    $statment->execute();
    $result = $statment->fetchAll();

    ?>
    <div class="card">
        <div class="card-body">
            <h2>To Do Home Page</h2>
            <div>
            <a href="add.php" type="button" class="btn btn-success">Create</a>
            </div><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i =1;
            if ($result) {
                foreach ($result as $data) {
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['title']; ?></td>
                <td><?php echo $data['description']; ?></td>
                <td><?php echo date('Y-m-d',strtotime($data['created_at'])) ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id'] ?>" type="button" class="btn btn-danger">Edit</a>
                    <a href="delete.php?id=<?php echo $data['id'] ?>" type="button" class="btn btn-warning">Delete</a>
                </td>
            </tr>
            <?php
             $i++;
            }
        }
       
            ?>

                    
                </tbody>
            </table>
        </div>
    </div>
</body>
<!-- css js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>