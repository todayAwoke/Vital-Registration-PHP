<?php
include('../includes/connect.php');
include('../functon/commen_function.php');
session_start();
if(!isset($_SESSION['username'])){
    header('location:user_login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commerce website user profile page</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <!-- navigation -->
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
                        <a class="nav-link" href="profile.php">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"> <i class="fa-solid fa-cart-shopping"><sup><?php cart_product(); ?></sup></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total price: <?php total_cart_price(); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> <?php echo date("D"); ?> </a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" action="../search_product.php" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" class="btn btn-outline-light" name="search_product" value="Search">
                </form>
            </div>
        </nav>
        <!-- calling function -->
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php
                //echo $_SESSION['username'];
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                </li> '";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome  " . $_SESSION['username'] . "</a>
                </li> '";
                    //$_SESSION['user_email']
                }
                ?>
                </li>

                <li>
                    <?php
                    //echo $_SESSION['username'];
                    if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                    <a class='nav-link' href='user_login.php'>LogIn</a>
                </li> '";
                    } else {
                        echo "<li class='nav-item'>
                    <a class='nav-link' href='user_logout.php'>Logout</a>
                </li> '";
                    }
                    ?>
                </li>

            </ul>
        </nav>
        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center"> Awoke Store </h3>
            <p class="text-center">We are lucky due to e-commerce </p>
        </div>
        <div class="row">
            <div class="col-md-2 ">
                <ul class="navbar-nav bg-secondary text-center" style="height: 100hv;">
                    <li class="nav-item">
                        <a class="nav-link bg-info text-light" href="#">
                            <h4> Your Profile </h4>
                        </a>
                    </li>
                    <?php
                    $username = $_SESSION['username'];
                    $select_profile = "SELECT *from user_data where user_name='$username'";
                    $result = mysqli_query($con, $select_profile);
                    $fetch = mysqli_fetch_array($result);
                    $profile = $fetch['user_image'];
                    ?>
                    <!-- $profile_temp=$fetch['user_image']; -->
                    <li class='nav-item'>
                        <a class='nav-link profile_image text-light my-4'> <img src='./user_image/<?php echo $profile ?>' style="object-fit: contain; height: 80px width: 100%;"> </a>
                
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  text-light" href="profile.php"> Pending order </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-light" href="profile.php?edit_account"> Edit Account </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-light" href="profile.php?my_orders">My Order </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-light" href="profile.php? delete_account">Delete Account </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-light" href="user_logout.php">Logout </a>
                    </li>

                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php
                get_order_detail();
                if (isset($_GET['edit_account'])) {
                    include('edit_account.php');
                }
                if (isset($_GET['my_orders'])) {
                    include('user_order.php');
                }
                if (isset($_GET['delete_account'])) {
                    include('delete_account.php');
                }
                ?>
            </div>
        </div>

        <!--footer child-->
        <?php
        include('../includes/footer.php');
        ?>

    </div>

    <!--bootstrap js link-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>