<?php
if(!isset($_SESSION['admin_name'])){
    header('location:admin_login.php');
}
//display category title
if(isset($_GET['edit_category'])){
    $category_id=$_GET['edit_category'];
    $get_category = "SELECT * from catagory where category_id=$category_id";
        $category_result = mysqli_query($con, $get_category);
        $fetch=mysqli_fetch_array( $category_result );
        $category_title=$fetch['category_title'];
        //$category_id=$fetch['category_id'];
        
}
//update category
if(isset($_POST['update']))
{
    $category_title=$_POST['category_title'];
    $update_category="UPDATE catagory set category_title='$category_title' where category_id=$category_id ";
    $update_result=mysqli_query($con,$update_category);
    if($update_result){
        echo " <script> alert('Category updated successfully!!!') </script>";
        echo " <script> window.open('./index.php?view_category','_self') </script>";

    }
}
?>
<form action="" method="post">
<div class="form-outline m-auto w-50 my-4">
            <label for="" class="form-label"> Category title:</label>
            <input type="text" name="category_title" class=" form-control  mb-3" value="<?php echo $category_title ?>" required="required">
        </div>
    <div class="form-outline text-center " >
        <input type="submit" name="update" value="Update name" class=" border-0 px-3 py-2 bg-warning mb-4">
    </div>
</form>