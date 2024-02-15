<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_GET['marriage_card'])) {
    $marriage_id = $_GET['marriage_card'];
    $get_marriage = "SELECT * from marriagees where mar_id =$marriage_id";
    $marriage_result = mysqli_query($con, $get_marriage);
    $row = mysqli_fetch_assoc($marriage_result);
    //$marriage_id = $row['marriage_id'];
            
	$husbandFullName = $row['hFullName'];
	$husbandbirthplace = $row['hbirthOfplace'];
	$husbandCitizenship = $row['hcitizenship'];
	$marriage_id = $row['mar_id'];
	$wifeFullName = $row['wFullName'];
	//$wifeBirthOfPlace = $row['wifeBirthOfPlace'];
	$wifeCitizenship = $row['wCitizenship'];
	//$husbanDateOfDivorce = $row['husbandDateOfDivorce'];
	$officeName =   $row['officerFullName'];
	$divorce_image1 = $row['hImage'];
	$divorce_image2 = $row['wImage'];
    //echo $divorce_image1;            
}
?>
<!DOCTYPE html>
<html>
<head>
	
	<style>
		.card {
            margin-top: 16px;
			background-color: #ffffff;
			border: 1px solid #000000;
			padding: 20px;
			width: 900px;
			/* margin: auto; */
            margin-left: 12px;
			font-family: Arial, sans-serif;
		}

		h1 {
			font-size: 24px;
			text-align: center;
			margin-bottom: 30px;
		}

		.row {
			display: flex;
			flex-wrap: wrap;
			margin-bottom: 10px;
		}

		.col-3 {
			flex-basis: 25%;
			max-width: 25%;
		}

		.col-9 {
			flex-basis: 75%;
			max-width: 75%;
		}

		.label {
			font-weight: bold;
			margin-bottom: 5px;
		}

		.value {
			margin-bottom: 15px;
		}
        .product_image{
            height: 60px;
        }
	</style>
</head>
<body>
	<div id="printable-content" class="card">
		<h1 class="text-center text-danger" >MARRIAGE CERTIFICATE</h1>
		<div class="row">
            <div class="col-6">
            <div class="row">
                husband information
			<div class="col-0">

			</div>
			<div class="col-11">
            <img src='./upload/<?php echo $divorce_image1 ?>' class='product_image'>
			</div>
		</div> 
        <div class="row">
			<div class="col-3">
				<div class="label">husband Name:</div>
			</div>
			<div class="col-9">
				<div class="value"> <?php echo $husbandFullName ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<div class="label">birth place:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $husbandbirthplace ?></div>
			</div>
		</div>
        <div class="row">
			<div class="col-3">
				<div class="label">citizenship:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $husbandCitizenship ?></div>
			</div>
		</div>
		
		
		
		
            </div>
            <div class="col-6" >
            <div class="row">
                wife information
			<div class="col-0">

			</div>
			<div class="col-11">
            <img src='./upload/<?php echo $divorce_image2 ?>' class='product_image'>
			</div>
		</div>
            <div class="row">
			<div class="col-3">
				<div class="label">wife Name:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $wifeFullName ?></div>
			</div>
		</div>
            <!-- <div class="row">
			<div class="col-6">
				<div class="label">place of birth:</div>
			</div>
			<div class="col-5">
				<div class="value"></div>
			</div>
		</div> -->
            <div class="row">
			<div class="col-4">
				<div class="label">citizenship:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $wifeCitizenship ?></div>
			</div>
		</div>
        <div class="row">
			<div class="col-4">
				<div class="label">approved by:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $officeName ?></div>
			</div>
		</div>
         </div>
	</div>
    </div>
    <button class="btn btn-primary" onclick="printContent()">print birth card</button>
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
