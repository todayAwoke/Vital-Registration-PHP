<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_POST['insert_divorce'])) {
    $rc_id = $_POST['residence_id'];
    $husbandFullName = $_POST['husbandFullName'];
    $husbandbirthplace = $_POST['husbandbirthplace'];
    $DateOfDivorce = $_POST['officer_name'];
    $husbandCitizenship=$_POST['husbandCitizenship'];
    //$WDBRUIN = $_POST['WDBRUIN'];
    $wifeFullName = $_POST['wifeFullName'];
         $wifeBirthOfPlace = $_POST['wifeBirthOfPlace'];
         $wifeCitizenship = $_POST['wifeCitizenship'];
         //$placeOfDivorce = $_POST['placeofdivorce'];
         $dateOfCertificateIssue = $_POST['certificate'];
         

    //access image
    $divorce_image1 = $_FILES['divorce_image1']['name'];
    $divorce_image2 = $_FILES['divorce_image2']['name'];

    $upload1="upload/".$divorce_image1;
    $upload2="upload/".$divorce_image2;
    //access tmp name
    
    $temp_image1 = $_FILES['divorce_image1']['tmp_name'];
    //
    $divorce_image2 = $_FILES['divorce_image2']['name'];
    $divorce_image1 = $_FILES['divorce_image1']['name'];
    $upload1="upload/".$divorce_image2;
    //access tmp name
    
    $temp_image2 = $_FILES['divorce_image2']['tmp_name'];
    //check input as empty
    if (empty($husbandFullName) || empty($wifeFullName) || empty($wifeCitizenship) || empty($husbandCitizenship)  ) {
        echo '<script> alert("please fill all field!!") 
        header("location:insert_divorce.php")
    </script> ';

        exit();
    } else {
        //$up= "upload $divorce_image1";
      

        //move_uploaded_file($temp_image1, 'sample_upload/'.$divorce_image1);
        move_uploaded_file($temp_image1, $upload1);
        move_uploaded_file($temp_image2, $upload2);
        //insert divorce
        $insert_divorce = "INSERT into `divorces`(rc_id, husbandFullName,husbandbirthplace, husbandCitizenship,wifeFullName,wifeBirthOfPlace,wifeCitizenship,dateOfCertificateIssue,husbandDateOfDivorce,hphoto,wphoto) 
                                      values ('$rc_id','$husbandFullName','$husbandbirthplace','$husbandCitizenship','$wifeFullName','$wifeBirthOfPlace','$wifeCitizenship','$dateOfCertificateIssue','$DateOfDivorce','$divorce_image1','$divorce_image2')";
        $result = mysqli_query($con, $insert_divorce);
        if ($result) {
            echo "<script> alert('product inserted successfully!!!')
            window.location='index.php?view_divorce';
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
    <title>Insert divorce admin Dashboard</title>
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

            <h1 class="text-primary">Insert divorce</h1>
        </div>
        <!-- form -->
        <form action="insert_divorce.php" method="post" enctype="multipart/form-data">
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
                <input type="text" class="form-control " name="husbandFullName" id="product_title" placeholder="Enter husband full name" autocomplete="off" required>
            </div>
            <!-- product description -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="description" class="form label">husband birth place</label>
                <input type="text" class="form-control " name="husbandbirthplace" id="description" placeholder="husband birth place"  autocomplete="off">
            </div>
            <!-- products key word -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> citizenship </label>
                <input type="text" class="form-control " name="husbandCitizenship" id="product_keyword" placeholder="citizenship"  autocomplete="off" required><br>
            </div>
            <!-- category -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label">wife full name</label>
                <input type="text" class="form-control " name="wifeFullName" id="product_keyword" placeholder="Enter wife full name" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> wife birth of place </label>
                <input type="text" class="form-control " name="wifeBirthOfPlace" id="product_keyword" placeholder="Enter wife birth of place" autocomplete="off" required><br>
            </div>
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> wife citizenship </label>
                <input type="text" class="form-control " name="wifeCitizenship" id="product_keyword" placeholder="Enter  wife citizenship" autocomplete="off" required><br>
            </div>
            <!-- fh -->
           
            <!--  -->
            
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> certificate issue date </label>
                <input type="date" class="form-control " name="certificate" id="product_keyword" placeholder="Enter certificate issue date" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> place of divorce </label>
                <input type="text" class="form-control " name="placeofdivorce" id="product_keyword" placeholder="Enter place of divorce " autocomplete="off" required><br>

            </div>
            
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> date of divorce  </label>
                <input type="date" class="form-control " name="officer_name" id="product_keyword" placeholder="Enter  officer name" autocomplete="off" required><br>
            </div>
            <!-- product image1 -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_image1" class="form label">husband photo:</label>
                <input type="file" class="form-control " name="divorce_image1" id="product_image1" required="required">
            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_image2" class="form label">wife photo:</label>
                <input type="file" class="form-control " name="divorce_image2" id="product_image2" required="required">
            </div>
            <!-- product image2-->
            
            <!-- product price -->
        
            <div class="form outline w-56  text-center m-auto">
                <input type="submit" class="btn btn-info mt-2 px-3 " name="insert_divorce" value="Insert divorce">
                <button class="btn btn-secondary mt-2 text-center" > <a href="index.php" class="btn btn-secondary"> Back</a></button>
                <button class="btn btn-secondary mt-2 text-center" > <a href="index.php?view_divorce" class="btn btn-success"> Check  </a></button>
            </div>
        </form>
    </div>
</body>
</html>