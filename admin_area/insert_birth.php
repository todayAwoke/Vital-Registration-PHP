<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_POST['insert_birth'])) {
    $residence_id = $_POST['residence_id'];
    
    $fullName = $_POST['cname'];
    $father_fullName = $_POST['ffullname'];
    $DOB = $_POST['pbirth'];
    $sex = $_POST['sex'];
    $placeOfBirth = $_POST['pbirth'];
    $citizenship = $_POST['citizenship'];
    $mfullname = $_POST['mfullname'];
    $ffullname = $_POST['ffullname'];
    $fcitizenship = $_POST['fcitizenship'];
    $mcitizenship = $_POST['mcitizenship'];
    //access image
    $birth_image1 = $_FILES['birth_image1']['name'];
    $upload1="upload/".$birth_image1;
    //access tmp name
    
    $temp_image1 = $_FILES['birth_image1']['tmp_name'];
    //check input as empty
    if (empty($fullName) || empty($DOB) || empty($father_fullName) || empty($citizenship)  ) {
        echo '<script> alert("please fill all field!!") 
        header("location:insert_birth.php")
    </script> ';

        exit();
    } else {
        //$up= "upload $birth_image1";
      

        //move_uploaded_file($temp_image1, 'sample_upload/'.$birth_image1);
        move_uploaded_file($temp_image1, $upload1);
       
        //insert birth
        $insert_birth = "INSERT into `births` (rc_id,cname,fname,sex,DOB,pbirth, citzenship,mfullname ,mcitzenship,ffullname,fcitzenship,photo) 
                                 values ('$residence_id','$fullName','$father_fullName','$sex','$DOB','$placeOfBirth','$citizenship','$mfullname','$mcitizenship','$ffullname','$fcitizenship','$birth_image1')";
        $result = mysqli_query($con, $insert_birth);
        if ($result) {
            echo "<script> alert('product inserted successfully!!!')
             window.location='index.php?view_birth';
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

            <h1 class="text-primary">Insert births</h1>
        </div>
        <!-- form -->
        <form action="insert_birth.php" method="post" enctype="multipart/form-data">
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
                <input type="text" class="form-control " name="cname" id="product_title" placeholder="Enter full name" autocomplete="off" required>
            </div>
            <!-- product description -->
            
            <!-- products key word -->
            <div class="form outline  mb-4 m-auto">
            <label for="gender">gender Type:</label>
<select id="gender" name="sex">
<option >gender</option>
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="other">Other</option>
</select>
            </div>
            <!-- category -->
           
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> place of birth </label>
                <input type="text" class="form-control " name="pbirth" id="product_keyword" placeholder="Enter place of birth" autocomplete="off" required><br>
            </div>
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> citizenship </label>
                <input type="text" class="form-control " name="citizenship" id="product_keyword" placeholder="Enter cictizenship" autocomplete="off" required><br>
            </div>
            <!-- fh -->
           
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> mother full name </label>
                <input type="text" class="form-control " name="mfullname" id="product_keyword" placeholder="Enter mother full name" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> father full name </label>
                <input type="text" class="form-control " name="ffullname" id="product_keyword" placeholder="Enter father full name " autocomplete="off" required><br>

            </div>
            
            
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> father citizenship </label>
                <input type="text" class="form-control " name="fcitizenship" id="product_keyword" placeholder="Enter father citizenship " autocomplete="off" required><br>
            </div>
           
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> mother citizenship </label>
                <input type="text" class="form-control " name="mcitizenship" id="product_keyword" placeholder="Enter mother citizenship" autocomplete="off" required><br>
            </div>
            <!-- product image1 -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_image1" class="form label">photo:</label>
                <input type="file" class="form-control " name="birth_image1" id="product_image1" required="required">
            </div>
            <!-- product image2-->
            
            <!-- product price -->
        
            <div class="form outline w-56  text-center m-auto">
                <input type="submit" class="btn btn-info mt-2 px-3 " name="insert_birth" value="Insert birth">
                <button class="btn btn-secondary mt-2 text-center" > <a href="index.php" class="btn btn-secondary"> Back</a></button>
                <button class="btn btn-secondary mt-2 text-center" > <a href="index.php?view_birth" class="btn btn-success"> Check  </a></button>
            </div>
        </form>
    </div>
</body>
</html>