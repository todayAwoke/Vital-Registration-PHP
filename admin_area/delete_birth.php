
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
if(isset($_GET['delete_birth'])){
    $birth_id = $_GET['delete_birth'];
    $delete_birth = "DELETE from births where b_id=$birth_id";
    $result = mysqli_query($con, $delete_birth);
    if ($result) {
        echo "<script> alert('birth deleted successfully!!!')</script>";
        echo "<script> window.open('index.php?view_birth','_self')</script>";
    }}
?>