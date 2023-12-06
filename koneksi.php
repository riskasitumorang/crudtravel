<?php
error_reporting (E_ALL ^ E_DEPRECATED);
$host="localhost";
$user="root";
$pass="";
$dbName="wisata";

$con=mysqli_connect($host,$user,$pass,$dbName);

if(!$con){ //cek koneksi
    die ("Tidak Terkoneksi Ke database");
}
$hasil=mysqli_select_db($con,$dbName);
if(!$hasil){
    $hasil = mysqli_query ($con,"CREATE DATABASE $db");
    if (!$hasil) 
        die("Gagal Buat database");
    else
        $hasil = mysqli_select_db ($con,$dbName);
        if (!$hasil) die ("Gagal Konek Database");
    }

$sqlTabelTour ="create table if not exists tour(
                    id_wisata int auto_increment  null primary key,
                    nama varchar(40) not null,
                    lokasi varchar(50) not null default 0,
                    jam_buka varchar(50) not null default 0,
                    jam_tutup varchar(50) not null default 0,
                    deskripsi varchar(100) not null default 0,
                    KEY (nama))";
mysqli_query($con,$sqlTabelTour)or die("Gagal Buat tabel Tour");

//echo "Tabel TOUR Siap <hr/>"
?>

