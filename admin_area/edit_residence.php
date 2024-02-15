<h3 class="text-center text-danger">edit residence </h3>
<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_GET['edit_residence'])) {
    $residence_id = $_GET['edit_residence'];
    $get_residence = "SELECT * from residence where id =$residence_id";
    $residence_result = mysqli_query($con, $get_residence);
    $row = mysqli_fetch_assoc($residence_result);
    //$residence_id = $row['residence_id'];
            $residence_id= $row['id'];
            $fullName = $row['fullName'];
            $father_fullName = $row['father_fullName'];
            $mother_fullName = $row['mother_fullName'];
            $sex = $row['sex'];
            $region = $row['region'];
            $zone = $row['zone'];
            $woreda = $row['woreda'];
            $DOB = $row['DOB'];
            $blood_type = $row['blood_type'];
            $citizenship = $row['citizenship'];
            $phone = $row['phone'];
            $residence_image1 = $row['photo'];
            $placeOfBirth = $row['placeOfBirth'];
            $maritalStatus = $row['maritalStatus'];
}

//fetch category 

//database quary
if (isset($_POST['update_residence'])) {
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
   
        $upload1="upload/".$residence_image1;

        //move_uploaded_file($temp_image1, 'sample_upload/'.$residence_image1);
        move_uploaded_file($temp_image1, $upload1);
    
    //access tmp name
    
       $update ="UPDATE residence set fullName='$fullName',father_fullName='$father_fullName',mother_fullName='$mother_fullName',sex='$sex',region='$region',
    zone='$zone',woreda='$woreda',citizenship='$citizenship',phone='$phone',photo='$residence_image1', 
    placeOfBirth='$placeOfBirth',maritalStatus='$maritalStatus' where id=$residence_id";
    $result = mysqli_query($con, $update);
    if ($result) {
        echo "<script> alert('residence have been edited successfully!!!')</script>";
         echo "<script> window.open('index.php?view_residence','_self')</script>";
    }
}
?>

<div class="mt-4">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form outline w-56 mb-4 m-auto">
                <label for="product_title" class="form label">full name</label>
                <input type="text" class="form-control " name="fullName" id="product_title" value="<?php echo $fullName ?>" autocomplete="off" required>
            </div>
            <!-- product description -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="description" class="form label">father full name</label>
                <input type="text" class="form-control " name="father_fullName" id="description" value="<?php echo $father_fullName ?>" autocomplete="off">
            </div>
            <!-- products key word -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label">mother  fullName</label>
                <input type="text" class="form-control " name="mother_fullName" id="product_keyword" value="<?php echo $mother_fullName ?>" autocomplete="off" required><br>

            </div>
            <!-- category -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label">gender</label>
                <input type="text" class="form-control " name="sex" id="product_keyword" value="<?php echo $sex ?>" autocomplete="off" required><br>

            </div>
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label">blood type</label>
                <input type="text" class="form-control " name="blood_type" id="product_keyword" value="<?php echo $blood_type ?>" autocomplete="off" required><br>

            </div>
            <!-- fh -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> region </label>
                <input type="text" class="form-control " name="region" id="product_keyword" value="<?php echo $region ?>" autocomplete="off" required><br>

            </div>
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> zone </label>
                <input type="text" class="form-control " name="zone" id="product_keyword" value="<?php echo $zone ?>" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> woreda </label>
                <input type="text" class="form-control " name="woreda" id="product_keyword" value="<?php echo $woreda ?>" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> citizenship </label>
                <input type="text" class="form-control " name="citizenship" id="product_keyword"value="<?php echo $citizenship ?>" autocomplete="off" required><br>
            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> DOB </label>
                <input type="text" class="form-control " name="DOB" id="product_keyword" value="<?php echo $DOB ?>" autocomplete="off" required><br>
            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> phone </label>
                <input type="text" class="form-control " name="phone" id="product_keyword" value="<?php echo $phone ?>" autocomplete="off" required><br>
            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> place of birth </label>
                <input type="text" class="form-control " name="placeOfBirth" id="product_keyword" value="<?php echo $placeOfBirth ?>" autocomplete="off" required><br>
            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> marital status </label>
                <input type="text" class="form-control " name="maritalStatus" id="product_keyword" value="<?php echo $maritalStatus ?>" autocomplete="off" required><br>
            </div>
            <div class="form-outline m-auto w-50 my-4 ">
            <label for="" class="form-label">  image:</label>
            <div class="d-flex">
                <input type="file" name="residence_image1" class="text form-control"> <img src="./upload/<?php echo $residence_image1 ?> " alt="" class="edit_image">
            </div>
        </div>
        </div>
        
        <!-- <div class="form-outline m-auto w-50 my-4">
            <label for="" class="form-label"> product status :</label>
            <input type="text" name="status" class="text form-control " value="
        </div> -->
        <div class="m-auto w-50 my-4 text-center">
            <input type="submit" class="border-0 my-3 py-2 px-2 bg-warning text-light" name="update_residence" style="cursor: pointer;" value="Update">
        </div>

    </form>
</div>