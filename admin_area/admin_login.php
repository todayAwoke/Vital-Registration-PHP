<?php
include_once('../includes/connect.php');

session_start();
if(isset($_SESSION['admin_name'])){
    header('location:index.php');
}
if (isset($_POST['check'])) {
    $admin_name = $_POST['admin_name'];
    $password = $_POST['admin_password'];
    echo  $admin_name;
    
    $select_query = "SELECT * FROM admin_data WHERE admin_name='$admin_name'";
    $sel_result = mysqli_query($con, $select_query);
    if (!$sel_result) {
        die('Error: ' . mysqli_error($con));
    }
    $row_data = mysqli_fetch_assoc($sel_result);

    $count = mysqli_num_rows($sel_result);
    if ($count > 0) {
        $_SESSION['admin_name'] = $admin_name;
        if (password_verify($password, $row_data['admin_password'])) {
            echo "<script> alert ('Login successful!')</script>";
            header('location:index.php');
            exit;
        }else {
            echo "<script> alert ('Password is not correct ')</script>"; 
        }
    } else {
        echo "<script> alert ('Invalid credentials')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>

<body>
    <div class="container-fluid my-3">
        <div class="text-center  mt-2">

            <h1 class="text-primary"> admin LogIn </h1>
        </div>
        <!-- form -->
        <div class="row">
            <div class="col-lg-12 col-xl-6 ">
                <form action="" method="post" class=" w-50 mx-auto my-5">
                    <div class="form outline mb-4 m-auto">
                        <label for="admin_name" class="form label">admin Name:</label>
                        <input type="text" class="form-control " name="admin_name" id="admin_name" placeholder="Enter your username" autocomplete="off" required="required">
                    </div>

                    <!-- password -->
                    <div class="form outline w-56 mb-4 m-auto">
                        <label for="password" class="form label">Password:</label>
                        <input type="password" class="form-control " name="admin_password" id="password" placeholder="Enter your password" autocomplete="off" required="required">
                    </div>
                    <a href="" class="mx-5"> Forgot Password</a>
                    <div class="my-1 mx-5 pt-3">
                        <input type="submit" name="check" style="cursor: pointer;" value="LogIn" class="bg-info px-3 py-2 border-0">
                        <p class="small fw-bold mt-2 pt-1"> Don't have an account ? <a href="admin_registration.php" class="text-waring">Register</a></p>
                    </div>
                    <br>

                </form>
            </div>
        </div>
    </div>
</body>

</html>