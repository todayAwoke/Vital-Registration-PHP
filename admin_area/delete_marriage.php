
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
if(isset($_GET['delete_marriage'])){
    $marriage_id = $_GET['delete_marriage'];
    $delete_marriage = "DELETE from marriagees where mar_id=$marriage_id";
    $result = mysqli_query($con, $delete_marriage);
    if ($result) {
        echo "<script> alert('marriage deleted successfully!!!')</script>";
        echo "<script> window.open('index.php?view_marriage','_self')</script>";
    }}
?>