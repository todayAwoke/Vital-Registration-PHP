<?php
include('../includes/connect.php');
include('../functon/commen_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Payment page</title>
</head>

<body>
    
    <!-- php code to access offline pay user id -->
    <?php
    global $con;
    session_start();
    //
    if(!isset($_SESSION['username'])){
        header('location:user_login.php');
    }
    //
    $user_name=$_SESSION['username'];
    $user_ip=getIPAddress();
    $select_qry="SELECT * FROM  user_data where user_name='$user_name'";
    // $select_qry="SELECT * FROM  user_data where user_ip='$user_ip'";
    $result=mysqli_query($con,$select_qry);
    $run_qry=mysqli_fetch_array($result);
    $user_id=$run_qry['user_id'];
    ?>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <p class="navbar-brand"> <img src="../images/logo.png" class="logo" alt=""> </p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    
                    </ul>
                <form class="form-inline my-2 my-lg-0" action="../search_product.php" method="get">
                    <input class="form-control mr-sm-2" type="search" 
                    placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" class="btn btn-outline-light" name="search_product" value="Search">
                </form>
            </div>
        </nav>
        <h2 class="text-center text-info">Payment options</h2>
        <div class=" d-flex justify-content-center align-item-center mt-4">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"> <img src="../images/paypal.jpg"> </a>
            </div>
            <div class="col-md-6">
                <h3 class="text-center mt-5"><a href="order.php?user_id=<?php echo $user_id?> " > Pay Offline </a></h3>
            </div>
        </div>
    </div>
</body>

</html>