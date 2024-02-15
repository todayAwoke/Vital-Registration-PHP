<?php
include('../includes/connect.php');
include('../functon/commen_function.php');
if (isset($_POST['register'])) {
    $username = $_POST['user_name'];
    $email = $_POST['user_email'];
    $image_name = $_FILES['user_image']['name'];
    $image_temp_name = $_FILES['user_image']['tmp_name'];
    $password = $_POST['use_password'];
    //type on google password hash document
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $con_password = $_POST['confirm_password'];
    $address = $_POST['user_address'];
    $mobile = $_POST['user_contact'];
    $user_ip = getIPAddress();
    echo 
    $check_quarry = "SELECT * from user_data where user_name='$username' and user_email='$email'";
    $check_result = mysqli_query($con, $check_quarry);
    $cout = mysqli_num_rows($check_result);
    if ($cout > 0) {
        echo " <script> alert (' Username and email already exist') 
        window.open('user_registration.php',_'self'); </script>";
    } elseif ($password != $con_password) {
        $che = "two passwords are not match";
    } else {
        $image_upload = "user_image/.$image_name";
        move_uploaded_file($image_temp_name, $image_upload);
        $insert_quiary = "INSERT INTO user_data (user_name,user_email,user_password,user_image,user_ip,user_address,user_phone)
        values ('$username','$email','$password_hash','$image_name','$user_ip','$address','$mobile')";
        $insert_result = mysqli_query($con, $insert_quiary);
        if ($insert_result) {
            echo "<script>alert('data is inserted successfully')  
                window.open('user_login.php','_self'); </script>
            ";
        } else {
            die($con);
        }
    }
    //sometime user went to add cart without register
    //select cart items
    $select_qu = "SELECT * from cart_detail where ip_address=$user_ip";
    $select_result = mysqli_query($con, $select_qu);
    $row = mysqli_num_rows($select_result);
    if ($row > 0) {
        $_SESSION['username'] = $username;
        echo "<script>alert('You have items in your cart') </script>";
        echo " window.open('checkout.php','_self'); </script> ";
    } else {
        echo " window.open('../index.php','_self'); </script> ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User register page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>

<body>
    <div class="container-fluid my-3">
        <div class="text-center  mt-2">

            <h1 class="text-primary"> new user register form</h1>
        </div>
        <!-- form -->
        <div class="row">
            <div class="col-lg-12 col-xl-6 ">
                <form action="user_registration.php" method="post" enctype="multipart/form-data" class=" w-50 mx-auto">
                    <div class="form outline mb-4 m-auto">
                        <label class="form label">UserName:</label>
                        <input type="text" class="form-control " name="user_name" id="user_name" placeholder="Enter your username" autocomplete="off" required="required">
                    </div>
                    <!-- user email -->
                    <div class="form outline w-56 mb-4 m-auto">
                        <label for="email" class="form label">Email:</label>
                        <input type="email" class="form-control " name="user_email" id="email" placeholder="Enter your email" autocomplete="off" required="required">
                    </div>
                    <!-- user image -->
                    <div class="form outline w-56 mb-4 m-auto">
                        <label for="user_image" class="form label">User Image:</label>
                        <input type="file" class="form-control " name="user_image" id="image" required="required">
                    </div>
                    <!-- password -->
                    <div class="form outline w-56 mb-4 m-auto">
                        <label for="password" class="form label">Password:</label>
                        <input type="password" class="form-control " name="use_password" id="password" placeholder="Enter your password" autocomplete="off" required="required">
                    </div>
                    <!-- confirm password -->
                    <div class="form outline w-56 mb-4 m-auto">
                        <label for="confirm_password" class="form label">confirm password:</label>
                        <input type="password" class="form-control " name="confirm_password" id="confirm_password" placeholder="confirm password" autocomplete="off" required="required">
                    </div>

                    <!-- user address -->
                    <div class="form outline w-56 mb-4 m-auto">
                        <label for="address" class="form label">Address:</label>
                        <input type="text" class="form-control " name="user_address" id="address" placeholder="your address" autocomplete="off" required="required">
                    </div>
                    <!-- user contact -->
                    <div class="form outline w-56 mb-4 m-auto">
                        <label for="contact" class="form label">Phone number:</label>
                        <input type="text" class="form-control " name="user_contact" id="contact" placeholder="your  phone" autocomplete="off" required="required">
                    </div>

                    <div class="my-1 mx-5 pt-3">

                        <input type="submit" name="register " style="cursor: pointer;" value="Register" class="bg-info px-3 py-2 border-0">
                        <p class="small fw-bold mt-2 pt-1"> Already have account ? <a href="user_login.php " class="text-waring">LogIn</a></p>
                    </div>
                    <br>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
