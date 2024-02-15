<?php
include_once('../includes/connect.php');
// include_once('../functon/commen_function.php');
if (isset($_POST['register'])) {
    $admin_name = $_POST['admin_name'];
    $image_name = $_FILES['admin_image']['name'];
    $image_temp_name = $_FILES['admin_image']['tmp_name'];
    
    $password = $_POST['admin_password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $con_password = $_POST['confirm_password'];
    //$admin_ip = getIPAddress();
    $check_quarry = "SELECT * from admin_data where admin_name='$admin_name' ";
    $check_result = mysqli_query($con, $check_quarry);
    $count = mysqli_num_rows($check_result);
    if ($count > 0) {
        echo " <script> alert (' this admin name and email already exist') 
        window.open('admin_registration.php',_'self'); </script>";
    } elseif ($password!=$con_password) {
        $che = "two passwords are not match";
    } else {
        $image_upload = "admin_image/$image_name";
        move_uploaded_file($image_temp_name, $image_upload);
        $insert_quiary = "INSERT INTO admin_data (admin_name,admin_password,admin_photo)
        values ('$admin_name','$password_hash','$image_name')";
        $insert_result = mysqli_query($con, $insert_quiary);
        if ($insert_result) {
            echo "<script>alert('data is inserted successfully')  
                window.open('admin_login.php','_self'); </script>
            ";
        } else {
            die($con);
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
    <title>Admin register page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>

<body>
    <div class="container my-3">
        <div class="text-center  mt-2">

            <h1 class="text-primary"> New Admin Register Form</h1>

        </div>
        <div class="row">
            <div class="col-md-6 bg-secondary">
                <img src="./admin_image/admina.jpg" style="width: 350px; height:300px ; object-fit: contain;" class="my-5" alt="" >
            </div>
        
        <!-- form -->
            <div class="col-lg-6 col-xl-6 ">
                <form action="" method="post" enctype="multipart/form-data" class="m-auto">
                    <div class="form-outline  m-auto">
                        <label class="form label m-auto">UserName:</label>
                        <input type="text" class="form-control " name="admin_name" id="admin_name" placeholder="Enter your username" autocomplete="off" required="required">
                    </div>
                    <!-- admin email -->
                    
                    <!-- admin image -->
                    <div class="form-outline  mb-4 m-auto">
                        <label for="admin_image" class="form label">admin Image:</label>
                        <input type="file" class="form-control " name="admin_image" id="image" required="required">
                    </div>
                    <!-- password -->
                    <div class="form-outline  mb-4 m-auto">
                        <label for="password" class="form label">Password:</label>
                        <input type="password" class="form-control " name="admin_password" id="password" placeholder="Enter your password" autocomplete="off" required="required">
                    </div>
                    <!-- confirm password -->
                    <div class="form-outline  mb-4 m-auto">
                        <label for="confirm_password" class="form label">confirm password:</label>
                        <input type="password" class="form-control " name="confirm_password" id="confirm_password" placeholder="confirm password" autocomplete="off" required="required">
                    </div>

                    
                    <div class="my-1 mx-5 text-center pt-3">

                        <input type="submit" name="register" style="cursor: pointer;" value="Register" class="bg-info px-3 py-2 border-0">
                        <p class="small fw-bold mt-2 pt-1"> Already have account ? <a href="admin_login.php " class="text-waring">LogIn</a></p>
                    </div>

                </form>
            </div>
</body>

</html>