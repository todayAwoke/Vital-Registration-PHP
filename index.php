<?php
include('./includes/connect.php');
// include('./functon/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user applicant  page</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow-x: hidden;
        }
        .logo{
            width: 80px;
            height: 80px;
        }
    </style>
</head>

<body>
    <!-- navigation -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <p class="navbar-brand"> <img src="./images/logo.jpg" class="logo" alt=""> </p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_register.php">order service  </a>
                    </li>
                    

                </ul>
                
            </div>
        </nav>
        <!-- calling function -->
        <?php
    //   $product->cart();
        ?>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
               
                </li>

            </ul>
        </nav>
        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center text-primary"> Addis ababa  vital event order service </h3>
            
        </div>
        <!-- fourth child -->
        <div class="row">
            <div class="col-md-10 ">
             <h2 class="text-center">our service is given based on below schedule </h2>
             <table class="table table-striped table-bordered m-5">
    <thead class="thead-dark">
        <tr>
            <th>Day</th>
            <th>Date</th>
            <th>Time</th>
            <th>Services</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Monday</td>
            <td>10/14/2015</td>
            <td>2:30-5:30 and 7:30-11:00</td>
            <td>residence and birth</td>
        </tr>
        <tr>
            <td>Tuesday</td>
            <td>10/15/2015</td>
            <td>2:30-5:30 and 7:30-11:00</td>
            <td>death and birth</td>
        </tr>
        <tr>
            <td>Wednesday</td>
            <td>10/16/2015</td>
            <td>2:30-5:30 and 7:30-11:00</td>
            <td>death and marriage</td>
        </tr>
        <tr>
            <td>Thursday</td>
            <td>10/17/2015</td>
            <td>2:30-5:30 and 7:30-11:00</td>
            <td>non marital and divorce</td>
        </tr>
        <tr>
            <td>Friday</td>
            <td>10/18/2015</td>
            <td>2:30-5:00 and 7:30-10:00</td>
            <td>marriage and residence</td>
        </tr>
    </tbody>
</table>
               
            </div>
           
                   
                <!-- category to be displayed -->
              


               
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