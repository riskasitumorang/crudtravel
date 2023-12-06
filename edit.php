<?php
$id_wisata = $_GET ["id_wisata"];
include  "koneksi.php";
$query = "select * from tour where id_wisata = '$id_wisata'";
$query_run = mysqli_query($con, $query);
$tour = mysqli_fetch_array($query_run);

$nama = $tour ["nama"];
$lokasi =$tour ["lokasi"];
$jam_buka =$tour ["jam_buka"];
$jam_tutup =$tour["jam_tutup"];
$deskripsi =$tour["deskripsi"];
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>WISATA EDIT</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>WISATA EDIT 
                            <a href="tampilan.php" class="btn btn-dark float-end">BACK TO DETAILS</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id_wisata']))
                        {
                            $id_wisata = mysqli_real_escape_string($con, $_GET['id_wisata']);
                            $query = "SELECT * FROM tour WHERE id_wisata='$id_wisata' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $tour = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="id_wisata" value="<?= $tour['id_wisata']; ?>">

                                    <div class="mb-3">
                                <label>Name Tour</label>
                                <input type="text" name="nama" value ="<?=$nama ;?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Location</label>
                                <input type="text" name="lokasi"value ="<?=$lokasi ;?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Opening</label>
                                <input type="text" name="jam_buka" value ="<?=$jam_buka ;?>"class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Closing</label>
                                <input type="text" name="jam_tutup" value ="<?=$jam_tutup ;?>"class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <input type="text" name="deskripsi"value ="<?=$deskripsi ;?>" class="form-control">
                            </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_wisata" class="btn btn-primary">
                                            Update Tour
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>