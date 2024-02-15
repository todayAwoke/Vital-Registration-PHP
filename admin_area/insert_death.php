<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_POST['insert_death'])) {
    $residence_id = $_POST['residence_id'];
    $fullName = $_POST['deceased_name'];
    $sex = $_POST['sex'];
    $DOB = $_POST['date_of_birth'];
    $citizenship = $_POST['citizenship'];
    $placeOfdeath = $_POST['place_of_death'];
    $dateOfDeath = $_POST['date_of_death'];
   
    $certificate_date = $_POST['certificate'];
    $officer_name = $_POST['name_officer'];
    //access image
    $death_image1 = $_FILES['photo']['name'];
    $upload1="upload/".$death_image1;
    //access tmp name
    
    $temp_image1 = $_FILES['photo']['tmp_name'];
    //check input as empty
    if (empty($fullName) || empty($DOB) || empty($citizenship)  ) {
        echo '<script> alert("please fill all field!!") 
        header("location:insert_death.php")
    </script> ';

        exit();
    } else {
        //$up= "upload $death_image1";
      

        //move_uploaded_file($temp_image1, 'sample_upload/'.$death_image1);
        move_uploaded_file($temp_image1, $upload1);
       
        //insert death
        $insert_death = "INSERT into `deaths` (rc_id ,deceased_name,sex,date_of_birth, citizenship,place_of_death,date_of_death ,certificate_issue_date,name_officer,photo) 
                                          values ('$residence_id','$fullName','$sex','$DOB','$citizenship','$placeOfdeath','$dateOfDeath','$certificate_date','$officer_name','$death_image1')";
        $result = mysqli_query($con, $insert_death);
        if ($result) {
            echo "<script> alert('death inserted successfully!!!')
            window.location='index.php?view_death';
                </script> ";
        }
    }}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert death admin Dashboard</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .label {
            font-style: italic;
        }
    </style>
</head>

<body >
    <div class="container">
        <div class="text-center  mt-2">

            <h1 class="text-primary">Insert death</h1>
        </div>
        <!-- form -->
        <form action="insert_death.php" method="post" enctype="multipart/form-data">
        <div class="form outline w-56 mb-4 m-auto">
                <select name="residence_id" id="" class="form-select">
                    <option value="">Select residence id</option>
                    <?php
                    $query = "SELECT * FROM residence ";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
            
                        $cat_id = $row['id'];
                        echo "<option value='$cat_id'> $cat_id </option>";
                    }
                    ?>

                </select>
            </div>
        
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_title" class="form label">full name</label>
                <input type="text" class="form-control " name="deceased_name" id="product_title" placeholder="Enter full name" autocomplete="off" required>
            </div>
            <!-- product description -->
            <div class="form outline  mb-4 m-auto">
            <label for="blood-type">gender Type:</label>
<select id="gender" name="sex">
<option >gender</option>
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="other">Other</option>
</select>
            </div>
            <!-- products key word -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> DOB </label>
                <input type="date" class="form-control " name="date_of_birth" id="product_keyword" placeholder="dob" autocomplete="off" required><br>
            </div>
            <!-- category -->
            
            
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> citizenship </label>
                <input type="text" class="form-control " name="citizenship" id="product_keyword" placeholder="Enter citizenship" autocomplete="off" required><br>
            </div>
            <!-- fh -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> place of death </label>
                <input type="text" class="form-control " name="place_of_death" id="product_keyword" placeholder="Enter  place of death" autocomplete="off" required><br>
            </div>
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> date of death  </label>
                <input type="date" class="form-control " name="date_of_death" id="product_keyword" placeholder="Enter date of death" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> certificate issue date </label>
                <input type="date" class="form-control " name="certificate" id="product_keyword" placeholder="Enter certificate issue date" autocomplete="off" required><br>

            </div>
            
            
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> officer name  </label>
                <input type="text" class="form-control " name="name_officer" id="product_keyword" placeholder="Enter  officer name" autocomplete="off" required><br>
            </div>
            <!-- product image1 -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_image1" class="form label">photo:</label>
                <input type="file" class="form-control " name="photo" id="product_image1" required="required">
            </div>
            <!-- product image2-->
            
            <!-- product price -->
        
            <div class="form outline w-56  text-center m-auto">
                <input type="submit" class="btn btn-info mt-2 px-3 " name="insert_death" value="Insert death">
                <button class="btn btn-secondary mt-2 text-center" > <a href="index.php" class="btn btn-secondary"> Back</a></button>
                <button class="btn btn-secondary mt-2 text-center" > <a href="index.php?view_death" class="btn btn-success"> Check  </a></button>
            </div>
        </form>
    </div>
</body>
</html>