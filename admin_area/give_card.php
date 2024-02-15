
<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_GET['give_card'])) {
    $residence_id = $_GET['give_card'];
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

?>
<h3 class="text-center text-danger">Residence Identification</h3>

<!DOCTYPE html>
<html>
<head>
	<title>Identification Card </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style type="text/css">
		
		.card {
			background-color: #f5f5f5;
			width: 400px;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
			font-family: Arial, sans-serif;
			font-size: 14px;
		}
		.photo {
			display: block;
			margin: 0 auto;
			width: 80px;
			height: 80px;
			border-radius: 20%;
			background-color: #ccc;
			/* background-image: url('your-photo-url.jpg'); */
			/* background-size: cover; */
			background-position: center;
			box-shadow: 0px 0px 5px rgba(0,0,0,0.3);
		}
		.name {
			font-weight: bold;
			font-size: 13px;
			margin-top: 10px;
			margin-bottom: 5px;
		}
		
		.info-label {
			display: inline-block;
			width: 70px;
            font-size: 10px;
			font-weight: bold;
		}
		.info-value {
			display: inline-block;
			margin-left: -10px;
            font-size: 10px;
		}
       .product_image{
		width: 100%;
		height: 100%;
		display: cover;
	   }
	  
	</style>
</head>
<body>
<div id="printable-content">
	<div class="row">
   <div class="col-6">
	<div class="card">
		<h5  class="text-danger" >Addis Ababa city wereda 09 ID card</h5>
		<div class="row">
		
		<div class="col-8">
		<div class="info">
			<span class="info-label">Name:</span>
			<span class="info-value"><?php echo $fullName." ".$father_fullName ?> </span>
		</div>
		<div class="info">
			<span class="info-label">Gender:</span>
			<span class="info-value"><?php echo $sex?></span>
		</div>
		
		<div class="info">
			<span class="info-label">ID:</span>
			<span class="info-value"><?php echo $residence_id?></span>
		</div>
		<div class="info">
			<span class="info-label">DOB:</span>
			<span class="info-value"><?php echo $DOB?></span>
		</div>
		<div class="info">
			<span class="info-label">citizenship:</span>
			<span class="info-value"> <?php echo $citizenship ?> </span>
		</div>
		<div class="info">
			<span class="info-label">IssueDate:</span>
			<span class="info-value"> <?php echo date("d F Y"); ?> </span>
		</div>
	</div>
	<div class="col-4 photo">
		 <img src='./upload/<?php echo $residence_image1 ?>' class='product_image'>
			
		</div>	
	</div>
	</div>
   </div>
   
	
	   	<div class="col-md-5">

  
  <button class="btn btn-primary" onclick="printContent()">print id</button>
  </div>
  <script>
    function printContent() {
      var printContents = document.getElementById("printable-content").innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>
</body>
</html>
	</div>
</body>
</html>
