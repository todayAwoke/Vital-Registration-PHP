<h3 class="text-center text-danger">edit nonmarital </h3>
<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_GET['edit_nonmarital'])) {
    $nonmarital_id = $_GET['edit_nonmarital'];
    $get_nonmarital = "SELECT * from non_maritalmodel where id =$nonmarital_id";
    $nonmarital_result = mysqli_query($con, $get_nonmarital);
    $row = mysqli_fetch_assoc($nonmarital_result);
    //$nonmarital_id = $row['nonmarital_id'];
    $nonmarital_id= $row['id'];
    $fullName = $row['fullName'];
    $sex = $row['sex'];
    $DOB = $row['DOB'];
    $citizenship = $row['citizenship'];
    $placeOfBirth = $row['placeOfBirth'];
    $maritalStatus = $row['maritalStatus'];
    $address = $row['address'];
    $issuedDate = $row['issuedDate'];
    $issuedBy = $row['issuedBy'];
    $nonmarital_image1 = $row['photo'];
}

//fetch category 

//database quary
if (isset($_POST['update_nonmarital'])) {
    $fullName = $_POST['fullName'];
    $sex = $_POST['sex'];
    $DOB = $_POST['DOB'];
    $citizenship = $_POST['citizenship'];
    $placeOfBirth = $_POST['placeOfBirth'];
    $maritalStatus = $_POST['maritalStatus'];
    $address = $_POST['address'];
    $issuedDate = $_POST['issuedDate'];
    $issuedBy = $_POST['issuedBy'];
    //access image
    $nonmarital_image1 = $_FILES['nonmarital_image1']['name'];
    $upload1="upload/".$nonmarital_image1;
    //access tmp name
    
    $temp_image1 = $_FILES['nonmarital_image1']['tmp_name'];
    move_uploaded_file($temp_image1, $upload1);
    //access tmp name
    
       $update ="UPDATE non_maritalmodel set fullName='$fullName',sex='$sex',DOB='$DOB',citizenship='$citizenship', 
    placeOfBirth='$placeOfBirth',maritalStatus='$maritalStatus',address='$address',issuedDate='$issuedDate',issuedBy='$issuedBy',photo='$nonmarital_image1', where id=$nonmarital_id";
    $result = mysqli_query($con, $update);
    if ($result) {
        echo "<script> alert('nonmarital have been edited successfully!!!')</script>";
         echo "<script> window.open('index.php?view_nonmarital','_self')</script>";
    }
}
?>

<div class="mt-4">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form outline w-56 mb-4 m-auto">
                <label for="product_title" class="form label">residence </label>
                <input type="text" class="form-control " name="rc_id" id="product_title" value="<?php echo $fullName?>" autocomplete="off" required>
            </div>
        <div class="form outline w-56 mb-4 m-auto">
                <label for="product_title" class="form label">full name</label>
                <input type="text" class="form-control " name="fullName" id="product_title" value="<?php echo $fullName?>" autocomplete="off" required>
            </div>
            <!-- product description -->
           
            <!-- category -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label">gender</label>
                <input type="text" class="form-control " name="sex" id="product_keyword" value="<?php echo $sex?>" autocomplete="off" required><br>

            </div>
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> DOB </label>
                <input type="text" class="form-control " name="DOB" id="product_keyword" value="<?php echo $DOB?>" autocomplete="off" required><br>
            </div>
            <!-- fh -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> citizenship </label>
                <input type="text" class="form-control " name="citizenship" id="product_keyword" value="<?php echo $citizenship?>" autocomplete="off" required><br>
            </div>
            
    
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> place of birth </label>
                <input type="text" class="form-control " name="placeOfBirth" id="product_keyword" value="<?php echo $placeOfBirth?>" autocomplete="off" required><br>
            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> marital status </label>
                <input type="text" class="form-control " name="maritalStatus" id="product_keyword" value="<?php echo $maritalStatus?>" autocomplete="off" required><br>
            </div>
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> address </label>
                <input type="text" class="form-control " name="address" id="product_keyword" value="<?php echo $address?>" autocomplete="off" required><br>
            </div>
            <!-- product image1 -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> issue date </label>
                <input type="text" class="form-control " name="issuedDate" id="product_keyword" value="<?php echo $issuedDate?>" autocomplete="off" required><br>
            </div>
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> issuedBy </label>
                <input type="text" class="form-control " name="issuedBy" id="product_keyword" value="<?php echo $issuedBy?>" autocomplete="off" required><br>
            </div>
            
            <div class="form-outline m-auto w-50 my-4 ">
            <label for="" class="form-label">  image:</label>
            <div class="d-flex">
                <input type="file" name="nonmarital_image1" class="text form-control"> <img src="./upload/<?php echo $nonmarital_image1 ?> " alt="" class="edit_image">
            </div>
        </div>
        </div>
        
        <!-- <div class="form-outline m-auto w-50 my-4">
            <label for="" class="form-label"> product status :</label>
            <input type="text" name="status" class="text form-control " value="
        </div> -->
        <div class="m-auto w-50 my-4 text-center">
            <input type="submit" class="border-0 my-3 py-2 px-2 bg-warning text-light" name="update_nonmarital" style="cursor: pointer;" value="Update">
        </div>

    </form>
</div>