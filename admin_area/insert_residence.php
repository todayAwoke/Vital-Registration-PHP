<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_POST['insert_residence'])) {
    //$region_id=$_POST['region_id'];
    
    $fullName = $_POST['fullName'];
    $father_fullName = $_POST['father_fullName'];
    $mother_fullName = $_POST['mother_fullName'];
    $sex = $_POST['sex'];
    $blood_type = $_POST['blood_type'];
    $region = $_POST['region'];
    $zone = $_POST['zone'];
    $woreda = $_POST['woreda'];
    $citizenship = $_POST['citizenship'];
    $DOB = $_POST['DOB'];
    $phone = $_POST['phone'];
    $placeOfBirth = $_POST['placeOfBirth'];
    $maritalStatus = $_POST['maritalStatus'];
    //access image
    $residence_image1 = $_FILES['residence_image1']['name'];
    
    //access tmp name
    
    $temp_image1 = $_FILES['residence_image1']['tmp_name'];
    //check input as empty
    if (empty($fullName) || empty($DOB) || empty($father_fullName) || empty($maritalStatus) || empty($citizenship) || empty($mother_fullName) ) {
        echo '<script> alert("please fill all field!!") 
    
    </script> ';

        exit();
    } else {
        //$up= "upload $residence_image1";
        $upload1="upload/".$residence_image1;

        //move_uploaded_file($temp_image1, 'sample_upload/'.$residence_image1);
        move_uploaded_file($temp_image1, $upload1);
       
        //insert residence
        $insert_residence = "INSERT into `residence` (fullName,father_fullName,mother_fullName,sex,blood_type, region, zone,woreda, citizenship,DOB,phone,placeOfBirth,maritalStatus,photo) 
                                 values ('$fullName','$father_fullName','$mother_fullName','$sex','$blood_type','$region','$zone','$woreda','$citizenship','$DOB','$phone','$placeOfBirth','$maritalStatus','$residence_image1')";
        $result = mysqli_query($con, $insert_residence);
        if ($result) {
            echo "<script> alert('product inserted successfully!!!')
            // window.location='index.php?view_product';
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
    <title>Insert Products admin Dashboard</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
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
<!--  -->




<!--  -->
            <h1 class="text-primary">Insert residences</h1>
        </div>
        <!-- form -->
        <form action="insert_residence.php" method="post" enctype="multipart/form-data">
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_title" class="form label">full name</label>
                <input type="text" class="form-control " name="fullName" id="product_title" placeholder="Enter full name" autocomplete="off" required>
            </div>
            <!-- product description -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="description" class="form label">father full name</label>
                <input type="text" class="form-control " name="father_fullName" id="description" placeholder="Enter father full name" autocomplete="off">
            </div>
            <!-- products key word -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label">mother  fullName</label>
                <input type="text" class="form-control " name="mother_fullName" id="product_keyword" placeholder="Enter mother  fullName" autocomplete="off" required><br>

            </div>
            <!-- category -->
            <div class="form outline  mb-4 m-auto">
            <label for="blood-type">gender Type:</label>
<select id="gender" name="sex">
<option >gender</option>
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="other">Other</option>
</select>
            </div>
            <!--  -->

            <div class="form outline  mb-4 m-auto">
            <label for="blood-type">Blood Type:</label>
<select id="blood-type" name="blood_type">
<option >Blood Type</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="AB">AB</option>
  <option value="O">O</option>
</select>
            </div>
            <!-- fh -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> region </label>
                <input type="text" class="form-control " name="region" id="product_keyword" placeholder="Enter region" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> zone </label>
                <input type="text" class="form-control " name="zone" id="product_keyword" placeholder="Enter zone" autocomplete="off" required><br>

            </div>
        
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> woreda </label>
                <input type="text" class="form-control " name="woreda" id="product_keyword" placeholder="Enter woreda" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> citizenship </label>
                <input type="text" class="form-control " name="citizenship" id="product_keyword" placeholder="Enter citizenship" autocomplete="off" required><br>
            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> DOB </label>
                <input type="date" class="form-control " name="DOB" id="product_keyword" placeholder="Enter DOB" autocomplete="off" required><br>
            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> phone </label>
                <input type="tel" class="form-control " name="phone" id="product_keyword" placeholder="Enter phone" autocomplete="off" required><br>
            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> place of birth </label>
                <input type="text" class="form-control " name="placeOfBirth" id="product_keyword" placeholder="Enter place of birth " autocomplete="off" required><br>
            </div>
            
            <!--  -->
            <div class="form outline  mb-4 m-auto">
            <label for="ma">maritalStatus Type:</label>
<select id="ma" name="maritalStatus">

  <option value="Married">Married</option>
  <option value="nonMarried">Non Married</option>
  <option value="divorced">divorced</option>
</select>
            </div>
            <!-- product image1 -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_image1" class="form label">photo:</label>
                <input type="file" class="form-control " name="residence_image1" id="product_image1" required="required">
            </div>
            <!-- product image2-->
            
            <!-- product price -->
        
            <div class="form outline w-56  text-center m-auto">
                <input type="submit" class="btn btn-info mt-2 px-3 " name="insert_residence" value="Insert residence">
                <button class="btn btn-secondary mt-2 text-center" > <a href="index.php" class="btn btn-secondary"> Back</a></button>
                <button class="btn btn-secondary mt-2 text-center" > <a href="index.php?view_residence" class="btn btn-success"> Check  </a></button>
            </div>
        </form>
    </div>
</body>
</html>