<?php
    session_start();
    require 'koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>WISATA CRUD</title>
</head>
<body>
  
    <div class="container mt-3">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>DETAILS TRAVEL</h4>
                        <div class="text-end">
                            <a href="create.php" class="btn btn-success">Add Tour</a>
                            <a href="index.html" class="btn btn-dark">Back</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name Tour</th>
                                    <th>Location</th>
                                    <th>Opening</th>
                                    <th>Closing</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM tour";
                                    $query_run = mysqli_query($con, $query);
                                    $no=1;
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $tour)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $tour['nama']; ?></td>
                                                <td><?= $tour['lokasi']; ?></td>
                                                <td><?= $tour['jam_buka']; ?></td>
                                                <td><?= $tour['jam_tutup']; ?></td>
                                                <td><?= $tour['deskripsi']; ?></td>
                                                <td>
                                                    <a href="view.php?id_wisata=<?= $tour['id_wisata']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="edit.php?id_wisata=<?= $tour['id_wisata']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                    <a href="delete.php?id_wisata=<?= $tour['id_wisata']; ?>" onclick="return confirm('Are you sure you want to delete this tour?')" class="btn btn-danger btn-sm">DELETE</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php

?>
