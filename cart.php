<?php

use function PHPSTORM_META\type;

include('./includes/connect.php');
include('./functon/commen_function.php');
session_start();
if(!isset($_SESSION['username'])){
    header('location:./user_area/user_login.php');
}
//no one can order without register
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart details</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- navigation -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <p class="navbar-brand"> <img src="./images/logo.png" class="logo" alt=""> </p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user_area/user_register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"> <i class="fa-solid fa-cart-shopping"><sup> /*cart_product(); ?*/ 12</sup></i></a>
                    </li>

                </ul>

            </div>
        </nav>
        <!-- calling function -->
        <?php
       $product->cart();
        ?>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <?php
                //echo $_SESSION['username'];
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                </li> '";
                }
                else{
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome  ".$_SESSION['username']."</a>
                </li> '"; 
                //$_SESSION['user_email']
                }
                ?>
                </li>
                
                <li>
                <?php
                //echo $_SESSION['username'];
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./user_area/user_login.php'>LogIn</a>
                </li> '";
                }
                else{
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./user_area/user_logout.php'>Logout</a>
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
        <!-- fourth child -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-borderd text-center">
                        
                        <tbody>
                            <?php
                            global $con;
                            
                            $total_price = 0;
                            
                            $select = "SELECT * from cart_detail where ip_address= '$get_ip_address'";
                            $result = mysqli_query($con, $select);
                            $count=mysqli_num_rows($result);
                            if($count>0){
                                echo "<thead>
                                <tr>
                                    <th>product Title</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Total price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Operations</th>
    
                                </tr>
                            </thead>";
                            while ($rows = mysqli_fetch_array($result)) {
                                $product_id = $rows['product_id'];
                                $select_product = "SELECT * from product where product_id= $product_id";
                                $pro_result = mysqli_query($con, $select_product);
                                while ($product_price_row = mysqli_fetch_array($pro_result)) {
                                    $product_price = array($product_price_row['product_price']);
                                    $price_table = $product_price_row['product_price'];
                                    $product_title = $product_price_row['product_title'];
                                    $product_image1 = $product_price_row['product_image1'];
                                    $product_value = array_sum($product_price);
                                    $total_price += $product_value;
                                    ?>
                                    <tr>
                                        <td><?php echo $product_title ?></td>
                                        <td> <img src="./admin_area/upload/<?php echo $product_image1 ?>" </td>
                                        <td> <input type="text" name="qnt">
                                        <?php
                                            
                                            $get_ip_address = getIPAddress();
                                            if(isset($_POST['update'])){
                                                $quantity=$_POST['qnt'];
                                                $int_quantity=(int)$quantity;
                                                $update="UPDATE cart_detail set quantity=$quantity where ip_address='$get_ip_address'";
                                                $update_result = mysqli_query($con, $update);
                                                $total_price+=$total_price*$int_quantity;
                                                $price_table+=$price_table*$int_quantity;
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $price_table ?></td>
                                        
                                        <td> <input type="checkbox" name="remove_item[] " value="<?php echo $product_id ?>" id=""> </td>
                                        <td colspan="2">
                                            <input type="submit" class="btn-info px-1 py-1 border-0 mx-1 " value="Update cart" name="update">
                                            <input type="submit" class="btn-info  px-1 py-1 border-0 mx-1 " value="Remove" name="remove">
                                            
                                        </td>
                                        </tr>
                                    <?php 
                                    
                                    }}}
                                    else{
                                        ?>
                                        <h3 class="text-center text-danger"> cart is Empty </h3>
                                        <?php
                                    }
                            remove_product();
                            ?>
                        </tbody>
                    </table>
                    <div class="px-3 d-flex m-4">
                        <?php
                    $get_ip_address = getIPAddress();
                    
                            $select = "SELECT * from cart_detail where ip_address= '$get_ip_address'";
                            $result = mysqli_query($con, $select);
                            $count=mysqli_num_rows($result);
                            if($count>0){
                                echo "<h4> subtotal: <strong class='text-primary'> $total_price </strong></h4>
                                <input type='submit' class='btn-info  px-1 py-1 border-0 mx-1 ' value='continues to shopping'  name='continues'>
                                <button class='bg-secondary border-0 px-5 py-1 mx-2' ><a href='./user_area/checkout.php' class= 'text-light text-decoration-none' > Checkout </a> </button> 
                                    
                                ";   
                            }
                            else{
                                echo "  <input type='submit' class='btn-info  px-1 py-1 border-0 mx-1 ' value='continues to shopping'  name='continues'>";
                            }
                            if(isset($_POST['continues'])){
                                echo "<script> window.open('index.php','_self')</script>";
                            }
                        ?>   
                    </div>
                </form>
                <?php
                function remove_product(){
                    global $con;
                    if(isset($_POST['remove'])){
                        foreach($_POST['remove_item'] as $remove_id){
                            
                            $delete="DELETE  FROM cart_detail where product_id=$remove_id";
                            $dele_result=mysqli_query($con,$delete);
                            if($dele_result){
                                echo "<script> alert('product is successfully deleted from your cart')</script>";
                                echo "<script> window.location='cart.php'; </script>";
                                if($remove_id==0){
                                    ?>
                                    <h3 > the cart is empty </h3>
                                    <?php
                                }
                            }
                            else{
                                echo "<script> alert('some problem happen to delete')</script>";
                            }

                        }
                    }
                }
               // echo $remove=remove_product();
                ?>
            </div>

        </div>
        <!--footer child-->
        <?php
        include('./includes/footer.php');
        ?>

    </div>

    <!--bootstrap js link-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>