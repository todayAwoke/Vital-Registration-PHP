
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
if(isset($_GET['delete_nonmarital'])){
    $nonmarital_id=$_GET['delete_nonmarital'];
    $delete="DELETE FROM non_maritalmodel where id=$nonmarital_id";
    $delete_result=mysqli_query($con,$delete);
    if($delete_result){
        echo "<script> alert('non marital deleted successfully!!!')</script>";
        echo "<script> window.open('index.php?view_nonmarital','_self')</script>";
    }
}

?>