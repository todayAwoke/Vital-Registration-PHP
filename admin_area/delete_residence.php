
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
if(isset($_GET['delete_residence'])){
    $residence_id=$_GET['delete_residence'];
    $delete="DELETE FROM residence where id=$residence_id";
    $delete_result=mysqli_query($con,$delete);
    if($delete_result){
        echo "<script> alert('residence deleted successfully!!!')</script>";
        echo "<script> window.open('index.php?view_residence','_self')</script>";
    }
}

?>