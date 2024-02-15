<?php
if(!isset($_SESSION['username'])){
    header('location:user_login.php');
}
$user_name = $_SESSION['username'];
if (isset($_POST['delete'])) {
    echo $user_name;
    $delete = "DELETE from user_data where user_name='$user_name'";
    $result = mysqli_query($con, $delete);
    if ($result) {
        session_destroy();
        echo "<script>alert('Account  deleted successfully!!!') </script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if (isset($_POST['do_not_delete'])) {
    echo "<script>window.open('profile.php','_self')</script>";
}

?>
<h3 class="text-danger"> Delete Account</h3>
<form action="" method="post">
    <div class="form-outline mt-4">
        <input type="submit" name="delete" class="form-control w-50 m-auto bg-danger text-light " value="Delete account">
    </div>
    <div class="form-outline mt-4">
        <input type="submit" name="do_not_delete" class="form-control w-50 m-auto bg-success  " value=" Don't delete account">
    </div>
</form>