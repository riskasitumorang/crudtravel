<?php
session_start();
?>

<?php include('message.php'); ?>
<?php
 $id_wisata=$_GET["id_wisata"];
$con = mysqli_connect("localhost","root","","wisata");
if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}
 $query = "delete  from tour where id_wisata = '$id_wisata'";
$query_run = mysqli_query($con, $query);
 if($query_run){
 
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
 
?>