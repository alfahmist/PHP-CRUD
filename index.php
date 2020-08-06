<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css"
        integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php require_once 'process.php'; ?>
    <?php 
    
    if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?php echo $_SESSION['msg_type']?>">

    <?php echo $_SESSION['message'];
            unset($_SESSION['message']);
    ?>

    </div>
    <?php endif ?>

    
    <div class="container">
    <?php 
        $mysqli = new mysqli('localhost','root','','CRUD')  or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data ORDER BY id ASC") or die($mysqli->error);
    ?>
        <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name"
                value="<?php echo $name;?>">
            </div>
            <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="text" class="form-control" id="location" name="location"
                value="<?php echo $location;?>">
            </div>
            <?php if($update ==true):?>
            <button type="submit" class="btn btn-warning" name="update">Update</button>
            <?php else: ?>
            <button type="submit" class="btn btn-primary" name="save">save</button>
            <?php endif?>
        </form>

        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Location</th>
                    <th scope="col" colspan="2">action</th>
                </tr>
            </thead>
           
            <tbody>
            <?php while ($row = $result->fetch_assoc()):?>
                <tr>
                    <th scope="row">1</th>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['location'] ?></td>
                    <td>
                        <a class="btn btn-primary" href="index.php?edit=<?php echo $row['id'];?>">Edit</a>
                        <a class="btn btn-danger" href="index.php?delete=<?php echo $row['id'];?>">Delete</a>
                    </td>
                </tr>
                    <?php endwhile; ?>
            </tbody>
        </table>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"
        integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous">
    </script>
</body>

</html>