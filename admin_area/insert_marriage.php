<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_POST['insert_marriage'])) {
    $rc_id=$_POST['residence_id'];
    $husbandFullName = $_POST['hFullName'];
   $husbanddateofbirth = $_POST['hDOB'];
    $wifedateofbirth = $_POST['wDOB'];
    $husbandbirthplace = $_POST['hbirthOfplace'];
    $husbandDateOfmarriage = $_POST['husbandDateOfmarriage'];
    $husbandCitizenship=$_POST['hCitizenship'];
    $wifeFullName = $_POST['wFullName'];
         //$wifeBirthOfPlace = $_POST['wifeBirthOfPlace'];
         $wifeCitizenship = $_POST['wCitizenship'];
         $dateOfCertificateIssue = $_POST['dateOfCertificateIssue'];
         $officername = $_POST['officer_name'];
        


    //access image
    $marriage_image1 = $_FILES['marriage_image1']['name'];
    $marriage_image2 = $_FILES['marriage_image2']['name'];

   
    //access tmp name
    
    $temp_image1 = $_FILES['marriage_image1']['tmp_name'];
    $temp_image2 = $_FILES['marriage_image2']['tmp_name'];
    //$marriage_image2 = $_FILES['marriage_image2']['name'];
    $upload1="upload/".$marriage_image1;
    $upload2="upload/".$marriage_image2;
    //access tmp name
    move_uploaded_file($temp_image1, $upload1);
    move_uploaded_file($temp_image2, $upload2);
    
    //check input as empty
    if (empty($husbandFullName) || empty($wifeFullName) || empty($wifeCitizenship) || empty($husbandCitizenship)  ) {
        echo '<script> alert("please fill all field!!") 
        header("location:insert_marriage.php")
    </script> ';

        exit();
    } else {
        //$up= "upload $marriage_image1";
      

        //move_uploaded_file($temp_image1, 'sample_upload/'.$marriage_image1);
        move_uploaded_file($temp_image1, $upload1);
        move_uploaded_file($temp_image2, $upload2);
        //insert marriage
        $insert_marriage = "INSERT into `marriagees`( rc_id ,hFullName, hDOB, hCitizenship,hbirthOfplace,wDOB,wFullName,wCitizenship,officerFullName,dateOfCetificateIssues,hImage,wImage) 
                                      values ('$rc_id','$husbandFullName','$husbanddateofbirth','$husbandCitizenship','$husbandbirthplace','$wifedateofbirth','$wifeFullName','$wifeCitizenship','$officername','$dateOfCertificateIssue','$marriage_image1','$marriage_image1')";
        $result = mysqli_query($con, $insert_marriage);
        if ($result) {
            echo "<script> alert('product inserted successfully!!!')
            window.location='index.php?view_marriage';
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
    <title>Insert marriage admin Dashboard</title>
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

            <h1 class="text-primary">Insert marriage</h1>
        </div>
        <!-- form -->
        <form action="insert_marriage.php" method="post" enctype="multipart/form-data">
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
                <label for="product_title" class="form label">husband full name</label>
                <input type="text" class="form-control " name="hFullName" id="product_title" placeholder="Enter product title" autocomplete="off" required>
            </div>
            <!-- product description -->
            <!-- <div class="form outline w-56 mb-4 m-auto">
                <label for="description" class="form label">husband birth place</label>
                <input type="text" class="form-control " name="hbirthplace" id="description" placeholder="Enter product description" autocomplete="off">
            </div> -->
            <!-- products key word -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label">husband citizenship </label>
                <input type="text" class="form-control " name="hCitizenship" id="product_keyword" placeholder="husband citizenship" autocomplete="off" required><br>
            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label">husband DOB</label>
                <input type="date" class="form-control " name="hDOB" id="product_keyword" placeholder="husband DOB" autocomplete="off" required><br>
            </div>
            <!-- category -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label">wife full name</label>
                <input type="text" class="form-control " name="wFullName" id="product_keyword" placeholder="Enter wife full name" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> wife DOB </label>
                <input type="date" class="form-control " name="wDOB" id="product_keyword" placeholder="wife DOB" autocomplete="off" required><br>
            </div>
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> wife citizenship </label>
                <input type="text" class="form-control " name="wCitizenship" id="product_keyword" placeholder="Enter  wife citizenship" autocomplete="off" required><br>
            </div>
            <!-- fh -->
           
            <!--  -->
            
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> certificate issue date </label>
                <input type="text" class="form-control " name="dateOfCertificateIssue" id="product_keyword" placeholder="Enter certificate issue date" autocomplete="off" required><br>

            </div>
            <!-- <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> place of marriage </label>
                <input type="text" class="form-control " name="placeofmarriage" id="product_keyword" placeholder="Enter product keyword" autocomplete="off" required><br>

            </div> -->
            
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> officer name  </label>
                <input type="text" class="form-control " name="officer_name" id="product_keyword" placeholder="Enter  officer name" autocomplete="off" required><br>
            </div>
            <!-- product image1 -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_image1" class="form label">husband photo:</label>
                <input type="file" class="form-control " name="marriage_image1" id="product_image1" required="required">
            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_image2" class="form label">wife photo:</label>
                <input type="file" class="form-control " name="marriage_image2" id="product_image2" required="required">
            </div>
            <!-- product image2-->
            
            <!-- product price -->
        
            <div class="form outline w-56  text-center m-auto">
                <input type="submit" class="btn btn-info mt-2 px-3 " name="insert_marriage" value="Insert marriage">
                <button class="btn btn-secondary mt-2 text-center" > <a href="index.php" class="btn btn-secondary"> Back</a></button>
                <button class="btn btn-secondary mt-2 text-center" > <a href="index.php?view_marriage" class="btn btn-success"> Check  </a></button>
            </div>
        </form>
    </div>
</body>
</html>