<h3 class="text-center text-danger">edit birth </h3>
<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_GET['edit_birth'])) {
    $birth_id = $_GET['edit_birth'];
    $get_birth = "SELECT * from births where b_id =$birth_id";
    $birth_result = mysqli_query($con, $get_birth);
    $row = mysqli_fetch_assoc($birth_result);
    //$birth_id = $row['birth_id'];
    $fullName = $row['cname'];
    $father_fullName = $row['fname'];
    $DOB = $row['DOB'];
    $sex = $row['sex'];
    $placeOfBirth = $row['pbirth'];
    $citizenship = $row['citzenship'];
    $mfullname = $row['mfullname'];
    $ffullname = $row['ffullname'];
    $fcitizenship = $row['fcitzenship'];
    $mcitizenship = $row['mcitzenship'];
    $birth_image = $row['photo'];
}

//fetch category 

//database quary
if (isset($_POST['update_birth'])) {
    $fullName = $_POST['cname'];
    $DOB = $_POST['DOB'];
    $sex = $_POST['sex'];
    $placeOfBirth = $_POST['pbirth'];
    $citizenship = $_POST['citizenship'];
    $mfullname = $_POST['mfullname'];
    $ffullname = $_POST['ffullname'];
    $fcitizenship = $_POST['fcitizenship'];
    $mcitizenship = $_POST['mcitizenship'];
    //access image
    $birth_image = $_FILES['birth_image']['name'];
    $upload1="upload/".$birth_image;
   
    //access tmp name
    
       $update ="UPDATE births set cname='$fullName',DOB='$DOB',sex='$sex',pbirth='$placeOfBirth',
    citzenship='$citizenship',mfullname='$mfullname',ffullname='$ffullname',fcitzenship='$fcitizenship',fcitzenship='$fcitizenship',photo='$birth_image' 
     where b_id=$birth_id";
    $result = mysqli_query($con, $update);
    if ($result) {
        echo "<script> alert('birth have been edited successfully!!!')</script>";
         echo "<script> window.open('index.php?view_birth','_self')</script>";
    }
}
?>

<div class="mt-4">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form outline w-56 mb-4 m-auto">
                <label for="product_title" class="form label">full name</label>
                <input type="text" class="form-control " name="cname" id="product_title" value="<?php echo $fullName ?>" autocomplete="off" required>
            </div>
            <!-- product description -->
            <
            <!-- products key word -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> DOB </label>
                <input type="text" class="form-control " name="DOB" id="product_keyword" value="<?php echo $DOB ?>" autocomplete="off" required><br>
            </div>
            <!-- category -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label">gender</label>
                <input type="text" class="form-control " name="sex" id="product_keyword" value="<?php echo $sex ?>" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> place of birth </label>
                <input type="text" class="form-control " name="pbirth" id="product_keyword" value="<?php echo $placeOfBirth ?>" autocomplete="off" required><br>
            </div>
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> citizenship </label>
                <input type="text" class="form-control " name="citizenship" id="product_keyword" value="<?php echo $citizenship ?>" autocomplete="off" required><br>
            </div>
            <!-- fh -->
           
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> mother full name </label>
                <input type="text" class="form-control " name="mfullname" id="product_keyword" value="<?php echo $mfullname ?>" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> father full name </label>
                <input type="text" class="form-control " name="ffullname" id="product_keyword" value="<?php echo $ffullname ?>" autocomplete="off" required><br>

            </div>
            
            
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> father citizenship </label>
                <input type="text" class="form-control " name="fcitizenship" id="product_keyword" value="<?php echo $fcitizenship ?>" autocomplete="off" required><br>
            </div>
           
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> mother citizenship </label>
                <input type="text" class="form-control " name="mcitizenship" id="product_keyword" value="<?php echo $mcitizenship ?>" autocomplete="off" required><br>
            </div>
            <!-- product image1 -->
            <div class="form-outline m-auto w-50 my-4 ">
            <label for="" class="form-label">  image:</label>
            <div class="d-flex">
                <input type="file" name="birth_image" class="text form-control"> <img src="./upload/<?php echo $birth_image ?> " alt="" class="edit_image">
            </div>
        </div>
        
        <!-- <div class="form-outline m-auto w-50 my-4">
            <label for="" class="form-label"> product status :</label>
            <input type="text" name="status" class="text form-control " value="
        </div> -->
        <div class="m-auto w-50 my-4 text-center">
            <input type="submit" class="border-0 my-3 py-2 px-2 bg-warning text-light" name="update_birth" style="cursor: pointer;" value="Update">
        </div>

    </form>
</div>