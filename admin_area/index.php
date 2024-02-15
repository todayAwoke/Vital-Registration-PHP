<?php
include_once('../includes/connect.php');
include_once('../functon/common_function.php');
session_start();

$admin_name = $_SESSION['admin_name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .admin {
            width: 100px;
            height: 150px;
            /* object-fit: contain; */
        }

        /* .footer {
            position: absolute;
            bottom: 0;
            height: 45px;
        } */
        body {
            overflow-x: hidden;
        }

        button {
            border-radius: 3px;
            cursor: pointer;
        }

        .edit_image {
            width: 100px;
            height: 90px;
        }
        .google{
            height: 45px;
        }
    </style>
</head>

<body>
    <span  class="google" id="google_element" >
    </span>
    <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate" >
        
        </script>
        <script  >
            function loadGoogleTranslate() {
                new google.translate.TranslateElement("google_element");
            }
        </script> 
    <!-- navigation -->
    <div class="container-fluid p-0">

        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" class="log" alt="">
                <nav class="navbar navbar-expand-lg">
                    <ul class="nav-bar d-flex" style="list-style: none;">
                    <li  > <a class="text-light" href="admin_registration.php" > Add new Admin</a></li>
                        <li class="nav-item">
                            <a href="" class="nav-link text-light"><?php
                                                                    if (isset($_SESSION['admin_name'])) {
                                                                        echo "Welcome  " . $_SESSION['admin_name'];
                                                                    } else {
                                                                        echo "Welcome Guest";
                                                                    }
                                                                    ?> 
                                                                    </a>
                        </li>
                        <li><button  ><a href="admin_logout.php" class="nav-link text-light bg-info  ">LogOut</a></button></li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-3"> Manage details</h3>
        </div>
        <!-- third child -->
        <div class="row ">
            <div class="col-md-12 bg-secondary d-flex align-items-center">
                <div class="p-3">
                    <?php
                    
                   // $admin_name = $_SESSION['admin_name'];
                    $select = "SELECT * from admin_data where admin_name='$admin_name'";
                    $result = mysqli_query($con, $select);
                    $row = mysqli_fetch_assoc($result);
                     $admin_image = $row['admin_photo'];
                    ?>
                    <p> <img  src='./admin_image/<?php echo $admin_image ?>'  class='admin'> </p>

                    <p class="text-center text-light"><?php
                                                        if (isset($_SESSION['admin_name'])) {
                                                            echo  $_SESSION['admin_name'];
                                                        } else {
                                                            echo "Guest";
                                                        }
                                                        ?></p>
                </div>
                <div class="btn text-center">
                    <button style="border-radius: 7px;" class="my-2"><a href="index.php?insert_residence" class="nav-link text-light bg-info my-1">Add residence  </a></button>
                    <button style="border-radius: 7px;"><a href="index.php?view_residence" class="nav-link text-light bg-info my-1">View residence </a></button>
                    <button style="border-radius: 7px;"><a href="index.php? insert_birth" class="nav-link text-light bg-info my-1">Add birth</a></button>
                    <button style="border-radius: 7px;"><a href="index.php? view_birth  " class="nav-link text-light bg-info my-1">View birth</a></button>
                    <button style="border-radius: 7px;"><a href="index.php?insert_death" class="nav-link text-light bg-info my-1">Add death</a></button>
                    <button style="border-radius: 7px;"><a href="index.php? view_death" class="nav-link text-light bg-info my-1">View death</a></button><br>
                    <button style="border-radius: 7px;"><a href="index.php? insert_divorce" class="nav-link text-light bg-info my-1">Add divorce </a></button> 
                    <button style="border-radius: 7px;"><a href="index.php? view_divorce" class="nav-link text-light bg-info my-1"> View divorce</a></button>
                    <button style="border-radius: 7px;"><a href="index.php? insert_marriage" class="nav-link text-light bg-info my-1">Add marriages</a></button>
                    <button style="border-radius: 7px;"><a href="index.php? view_marriage" class="nav-link text-light bg-info my-1">View marriages</a></button>
                    <button style="border-radius: 7px;"><a href="index.php? insert_nonmarital" class="nav-link text-light bg-info my-1">Add nonmarital </a></button> 
                    <button style="border-radius: 7px;"><a href="index.php? view_nonmarital" class="nav-link text-light bg-info my-1"> View nonmarital </a></button>
                    

                </div>
            </div>
        
        <!-- fourth child -->
        <div class="container-fluid">
            <?php
            if (isset($_GET['insert_residence'])) {
                include('insert_residence.php');
            }
            if (isset($_GET['insert_birth'])) {
                include('insert_birth.php');
            }
            if (isset($_GET['insert_divorce'])) {
                include('insert_divorce.php');
            }
            if (isset($_GET['insert_death'])) {
                include('insert_death.php');
            }
            if (isset($_GET['insert_marriage'])) {
                include('insert_marriage.php');
            }
            if (isset($_GET['insert_nonmarital'])) {
                include('insert_nonmarital.php');
            }
            if (isset($_GET['view_residence'])) {
                include('view_residence.php');
            }
            if (isset($_GET['edit_residence'])) {
                include('edit_residence.php');
            }
            if (isset($_GET['delete_residence'])) {
                include('delete_residence.php');
            }
            //
            if (isset($_GET['view_divorce'])) {
                include('view_divorce.php');
            }
            if (isset($_GET['edit_divorce'])) {
                include('edit_divorce.php');
            }
            if (isset($_GET['delete_divorce'])) {
                include('delete_divorce.php');
            }
            //
            if (isset($_GET['view_birth'])) {
                include('view_birth.php');
            }
            if (isset($_GET['view_death'])) {
                include('view_death.php');
            }
            
            if (isset($_GET['edit_birth'])) {
                include('edit_birth.php');
            }
            if (isset($_GET['edit_death'])) {
                include('edit_death.php');
            }
            if (isset($_GET['delete_birth'])) {
                include('delete_birth.php');
            }
            if (isset($_GET['delete_death'])) {
                include('delete_death.php');
            }
            if (isset($_GET['view_marriage'])) {
                include('view_marriage.php');
            }
            if (isset($_GET['edit_marriage'])) {
                include('edit_marriage.php');
            }
            if (isset($_GET['delete_marriage'])) {
                include('delete_marriage.php');
            }

            
            if (isset($_GET['view_nonmarital'])) {
                include('view_nonmarital.php');
            }
            if (isset($_GET['edit_nonmarital'])) {
                include('edit_nonmarital.php');
            }
            if (isset($_GET['delete_nonmarital'])) {
                include('delete_nonmarital.php');
            }

            // card service
            if (isset($_GET['give_card'])) {
                include('give_card.php');
            }
            if (isset($_GET['birth_card'])) {
                include('birth_card.php');
            }
            if (isset($_GET['death_card'])) {
                include('death_card.php');
            }
            if (isset($_GET['marriage_card'])) {
                include('marriage_card.php');
            }
            if (isset($_GET['divorce_card'])) {
                include('divorce_card.php');
            }
            if (isset($_GET['nonmarital_card'])) {
                include('nonmarital_card.php');
            }
            //
            
            ?>
        </div>
        </div>
        <!-- footer -->
        <?php
        include('../includes/footer.php');
        ?>
    </div>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>