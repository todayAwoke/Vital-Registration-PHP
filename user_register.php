<?php
include('./includes/connect.php');
if (isset($_POST['register'])) {
    $username = $_POST['user_name'];

    $date = $_POST['date']; 
  $service=$_POST['service'];

    
    
                $insert_quiary = "INSERT INTO user_data (user_name,date,service) 
        values ('$username','$date','$service')";
        $insert_result = mysqli_query($con, $insert_quiary);
        if ($insert_result) {
            echo "<script>alert('data is inserted successfully')  
                   </script>
            ";
            header('location:index.php');
        } else {
            die($con);
        }
    }
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user application  page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>

<body>
    <div class="container-fluid my-3">
        <div class="text-center  mt-2">

            <h1 class="text-primary"> user order form</h1>

        </div>
        <!-- form -->
        <div class="row">
            <div class="col-lg-12 col-xl-6 ">
                <form action="" method="post" enctype="multipart/form-data" class="m-auto">
                    <div class="form-outline w-50  m-auto">
                        <label class="form label m-auto">UserName:</label>
                        <input type="text" class="form-control " name="user_name" id="user_name" placeholder="Enter your username" autocomplete="off" required="required">
                    </div>
                    <!-- user email -->
                    <div class="form-outline w-50  m-auto">
                        <label class="form label m-auto">order date :</label>
                        <input type="date" class="form-control " name="date" id="user_name" placeholder="Enter your date" autocomplete="off" required="required">
                    </div>
                    <!-- user image -->
                    <div class="form outline  mb-4 m-auto">
            <label for="ma">service Type:</label>
<select id="ma" name="service">

  <option value="residence ">residence</option>
  <option value="birth"> birth</option>
  <option value="divorced">divorced</option>
  <option value="marriage">Marriage</option>
  <option value="nonMarital">Non Marital</option>
  <option value="death">death</option>
</select>
            </div>
                    <div class="my-1 mx-5 text-center pt-3">
                        <input type="submit" name="register" style="cursor: pointer;" value="Register" class="bg-info px-3 py-2 border-0">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>