<?php
if(!isset($_SESSION['username'])){
    header('location:user_login.php');
}
//session_start();
include('../includes/connect.php');
if (isset($_GET['edit_account'])) {
    $username = $_SESSION['username'];
    $select_qry = "SELECT * from user_data where user_name='$username'";
    $user_result = mysqli_query($con, $select_qry);
    $user_row = mysqli_fetch_assoc($user_result);
    $user_id = $user_row['user_id'];
    $user_name = $user_row['user_name'];
    $user_email = $user_row['user_email'];
    $user_address = $user_row['user_address'];
    $user_phone = $user_row['user_phone'];
    if (isset($_POST['user_update'])) {
        $update_id = $user_id;
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_phone = $_POST['user_phone'];
       // $user_image=$_FILES['user_image']['name'];
        //$user_image_temp=$_FILES['user_image']['tmp_name'];
        //move_uploaded_file($user_image_temp,"./user_images/$user_image");
        //update
        $update="UPDATE user_data set user_name='$user_name',user_email='$user_email'
        ,user_address='$user_address',user_phone='$user_phone'where user_id=$update_id ";
        $update_result=mysqli_query($con,$update);
        if($update_result){
            echo " <script>alert('Your data updated successfully!! ') </script>";
            echo " <script> window.open('user_logout.php','_self') </script>";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>

<body>
    <h3 class="text-danger"> Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" ">
        <div class=" form-outline mb-3 text-center">
        <input type="text" class="form-control w-50 m-auto" name="user_name" value="<?php echo $user_name ?>" autocomplete="off">
        </div>
        <div class="form-outline mb-3 text-center">
            <input type="email" class="form-control w-50 m-auto" name="user_email" value="<?php echo $user_email ?>" autocomplete="off">
        </div>
        <div class="form-outline mb-3 text-center w-50 m-auto d-flex ">
            <input type="file" class="form-control m-auto  " name="user_image">
            <img src= './user_image/<?php echo $profile?>' style="width: 70px;height:65px" alt="why?">
        </div>
        <div class="form-outline mb-3 my-3 text-center">
            <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php echo $user_address ?>" autocomplete="off">
        </div>
        <div class="form-outline mb-3 text-center">
            <input type="text" class="form-control w-50 m-auto" name="user_phone" value="<?php echo $user_phone ?>" autocomplete="off">
        </div>
        <input type="submit" class="py-2 px-3 mb-3 text-center bg-warning border-0" style="cursor: pointer;" value="Update" name="user_update">
    </form>
</body>

</html>