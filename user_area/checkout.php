<?php
include('../includes/connect.php');
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
    <title>Commerce website checkout page</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{
        overflow-x: hidden;
    }
    </style>
</head>

<body>
    <!-- navigation -->
    <div class="container-fluid p-0">
        
        <!-- calling function -->
        <div class="row">
            
            <div class="col-md-12 ">
                <!--products-->
                <div class="row">
                    <!-- session start -->
                    <?php
                    if(!isset($_SESSION['username'])){
                        include('user_login.php');

                    }
                    else{
                        include('payment.php');
                    }
                    ?>
                    
                </div>
            </div>
            
        </div>
        
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
                    <a class='nav-link' href='user_login.php'>LogIn</a>
                </li> '";
                }
                else{
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='user_logout.php'>Logout</a>
                </li> '"; 
                }
                ?>
                
                
                

            </ul>
        </nav>
    </div>

        <!-- third child -->
        
        <!-- fourth child -->
        
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