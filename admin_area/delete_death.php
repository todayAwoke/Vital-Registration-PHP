
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
if(isset($_GET['delete_death'])){
    $death_id = $_GET['delete_death'];
    $delete_death = "DELETE from deaths where id=$death_id";
    $result = mysqli_query($con, $delete_death);
    if ($result) {
        echo "<script> alert('death deleted successfully!!!')</script>";
        echo "<script> window.open('index.php?view_death','_self')</script>";
    }}
?>