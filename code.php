<?php
session_start();
require 'koneksi.php';

if(isset($_POST['delete_wisata']))
{
    $id_wisata = mysqli_real_escape_string($con, $_POST['delete_wisata']);

    $query = "DELETE FROM tour WHERE id_wisata='$id_wisata' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Wisata Deleted Successfully";
        header("Location: tampilan.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Wisata Not Deleted";
        header("Location: tampilan.php");
        exit(0);
    }
}

if(isset($_POST['update_wisata']))
{
    $id_wisata = mysqli_real_escape_string($con, $_POST['id_wisata']);

    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $lokasi = mysqli_real_escape_string($con, $_POST['lokasi']);
    $jam_buka = mysqli_real_escape_string($con, $_POST['jam_buka']);
    $jam_tutup = mysqli_real_escape_string($con, $_POST['jam_tutup']);
    $deskripsi = mysqli_real_escape_string($con, $_POST['deskripsi']);

    $query = "UPDATE tour SET nama='$nama', lokasi='$lokasi', jam_buka='$jam_buka', jam_tutup='$jam_tutup',deskripsi='$deskripsi' WHERE id_wisata='$id_wisata' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Wisata Updated Successfully";
        header("Location: tampilan.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Wisata Not Updated";
        header("Location: tampilan.php");
        exit(0);
    }

}


if(isset($_POST['save_wisata']))
{
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $lokasi = mysqli_real_escape_string($con, $_POST['lokasi']);
    $jam_buka = mysqli_real_escape_string($con, $_POST['jam_buka']);
    $jam_tutup = mysqli_real_escape_string($con, $_POST['jam_tutup']);
    $deskripsi = mysqli_real_escape_string($con, $_POST['deskripsi']);

    $query = "INSERT INTO tour (nama,lokasi,jam_buka,jam_tutup,deskripsi) VALUES ('$nama','$lokasi','$jam_buka','$jam_tutup','$deskripsi')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Wisata Created Successfully";
        header("Location: create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Wisata Not Created";
        header("Location: create.php");
        exit(0);
    }
}

?>