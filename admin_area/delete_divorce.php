
<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
if(isset($_GET['delete_divorce'])){
    $divorce_id = $_GET['delete_divorce'];
    $delete_divorce = "DELETE from divorces where id=$divorce_id";
    $result = mysqli_query($con, $delete_divorce);
    if ($result) {
        echo "<script> alert('divorce deleted successfully!!!')</script>";
        echo "<script> window.open('index.php?view_divorce','_self')</script>";
    }}
?>