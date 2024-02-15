<h3 class="text-center text-danger">edit divorce </h3>
<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_GET['edit_divorce'])) {
    $divorce_id = $_GET['edit_divorce'];
    $get_divorce = "SELECT * from divorces where id =$divorce_id";
    $divorce_result = mysqli_query($con, $get_divorce);
    $row = mysqli_fetch_assoc($divorce_result);
    //$divorce_id = $row['divorce_id'];
            $residence= $row['rc_id'];
            // $rc_id = $row['rc_id'];
            // $DRFN = $row['DRFN '];
            // $DRUIN = $row['DRUIN'];
            $husbandFullName = $row['husbandFullName'];
            $husbandbirthplace = $row['husbandbirthPlace'];
            $husbandDateOfDivorce = $row['husbandDateOfDivorce'];
            $husbandCitizenship=$row['husbandCitizenship'];
            // $WDBRUIN = $row['WDBRUIN'];
            $wifeFullName = $row['wifeFullName'];
                 $wifeBirthOfPlace = $row['wifeBirthOfPlace'];
                 $wifeCitizenship = $row['wifeCitizenship'];
                 $placeOfDivorce = $row['placeOfDivorce'];
                 $officer_name = $row['officerName'];
                
                 $dateOfCertificateIssue = $row['dateOfCertificateIssue'];
                 $hphoto = $row['hphoto'];
                 $wphoto = $row['wphoto'];
}

//fetch category 

//database quary
if (isset($_POST['update_divorce'])) {
    $rc_id = $_POST['rc_id'];
    // $DRFN = $_POST['DRFN '];
    // $DRUIN = $_POST['DRUIN'];
    $husbandFullName = $_POST['husbandFullName'];
    $husbandbirthplace = $_POST['husbandbirthplace'];
    // $husbandDateOfDivorce = $_POST['husbandDateOfDivorce'];
    $husbandCitizenship=$_POST['husbandCitizenship'];
    // $WDBRUIN = $_POST['WDBRUIN'];
    $wifeFullName = $_POST['wifeFullName'];
         $wifeBirthOfPlace = $_POST['wifeBirthOfPlace'];
         $wifeCitizenship = $_POST['wifeCitizenship'];
        //  $placeOfDivorce = $_POST['placeOfDivorce'];
         $officer_name = $_POST['officer_name'];
         $dateOfCertificateIssue = $_POST['certificate'];
         
    //access image
    $divorce_image1 = $_FILES['divorce_image1']['name'];
    
    //access tmp name
    $temp_image1 = $_FILES['divorce_image1']['tmp_name'];
   
        $upload1="upload/".$divorce_image1;

        //move_uploaded_file($temp_image1, 'sample_upload/'.$divorce_image1);
        move_uploaded_file($temp_image1, $upload1);
        //
        $divorce_image2 = $_FILES['divorce_image2']['name'];
    
        //access tmp name
        $temp_image2 = $_FILES['divorce_image2']['tmp_name'];
       
            $upload2="upload/".$divorce_image2;
    
            //move_uploaded_file($temp_image1, 'sample_upload/'.$divorce_image1);
            move_uploaded_file($temp_image2, $upload2);
    
    //access tmp name
    
       $update ="UPDATE divorces set rc_id='$residence',husbandFullName='$husbandFullName',husbandbirthPlace='$husbandbirthplace',husbandCitizenship='$husbandCitizenship',wifeFullName='$wifeFullName',
    wifeBirthOfPlace='$wifeBirthOfPlace',wifeCitizenship='$wifeCitizenship',hphoto='$divorce_image1',wphoto='$divorce_image2', 
     where id=$divorce_id";
    $result = mysqli_query($con, $update);
    if ($result) {
        echo "<script> alert('divorce have been edited successfully!!!')</script>";
         echo "<script> window.open('index.php?view_divorce','_self')</script>";
    }
}
?>

<div class="mt-4">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form outline w-56 mb-4 m-auto">
                <label for="product_title" class="form label">residence id</label>
                <input type="text" class="form-control " name="rc_id" id="product_title" value="<?php echo $divorce_id ?>" autocomplete="off" required>
            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_title" class="form label">husband full name</label>
                <input type="text" class="form-control " name="husbandFullName" id="product_title" value="<?php echo $husbandFullName ?>" autocomplete="off" required>
            </div>
            <!-- product description -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="description" class="form label">husband birth place</label>
                <input type="text" class="form-control " name="husbandbirthplace" id="description" value="<?php echo $husbandbirthplace ?>" autocomplete="off">
            </div>
            <!-- products key word -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> husband citizenship </label>
                <input type="text" class="form-control " name="husbandCitizenship" id="product_keyword" value="<?php echo $husbandCitizenship ?>" autocomplete="off" required><br>
            </div>
            <!-- category -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label">wife full name</label>
                <input type="text" class="form-control " name="wifeFullName" id="product_keyword" value="<?php echo $wifeFullName ?>" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> wife birth of place </label>
                <input type="text" class="form-control " name="wifeBirthOfPlace" id="product_keyword" value="<?php echo $wifeBirthOfPlace ?>" autocomplete="off" required><br>
            </div>
            <!--  -->
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> wife citizenship </label>
                <input type="text" class="form-control " name="wifeCitizenship" id="product_keyword" value="<?php echo $wifeCitizenship ?>" autocomplete="off" required><br>
            </div>
            <!-- fh -->
           
            <!--  -->
            
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> certificate issue date </label>
                <input type="text" class="form-control " name="certificate" id="product_keyword" value="<?php echo $dateOfCertificateIssue ?>" autocomplete="off" required><br>

            </div>
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> place of divorce </label>
                <input type="text" class="form-control " name="placeofdivorce" id="product_keyword" value="<?php echo $placeOfDivorce ?>" autocomplete="off" required><br>

            </div>
            
            <div class="form outline w-56 mb-4 m-auto">
                <label for="product_keyword" class="form label"> officer name  </label>
                <input type="text" class="form-control " name="officer_name" id="product_keyword" value="<?php echo $officer_name ?>" autocomplete="off" required><br>
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
        
        <!-- <div class="form-outline m-auto w-50 my-4">
            <label for="" class="form-label"> product status :</label>
            <input type="text" name="status" class="text form-control " value="
        </div> -->
        <div class="m-auto w-50 my-4 text-center">
            <input type="submit" class="border-0 my-3 py-2 px-2 bg-warning text-light" name="update_divorce" style="cursor: pointer;" value="Update">
        </div>

    </form>
</div>