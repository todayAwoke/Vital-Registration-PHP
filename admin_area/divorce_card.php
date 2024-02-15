<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_GET['divorce_card'])) {
    $divorce_id = $_GET['divorce_card'];
    $get_divorce = "SELECT * from divorces where id =$divorce_id";
    $divorce_result = mysqli_query($con, $get_divorce);
    $row = mysqli_fetch_assoc($divorce_result);
    //$divorce_id = $row['divorce_id'];
            
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
		<h1 class="text-center text-danger" >DIVORCE CERTIFICATE</h1>
		<div class="row">
            <div class="col-6">
            <div class="row">
                husband information
			<div class="col-0">

			</div>
			<div class="col-11">
            <img src='./upload/<?php echo $hphoto ?>' class='product_image'>
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
			<div class="col-4">
				<div class="label">citizenship:</div>
			</div>
			<div class="col-6">
				<div class="value"><?php echo $husbandCitizenship ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<div class="label">date of divorce:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $husbandDateOfDivorce ?></div>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-3">
				<div class="label">Husband signature:</div>
			</div>
			<div class="col-9">
				<input type="text" class="value"></div>
			</div>
		</div>
		 -->
		
		
            </div>
            <div class="col-6" >
            <div class="row">
                wife information
			<div class="col-0">

			</div>
			<div class="col-11">
            <img src='./upload/<?php echo $wphoto ?>' class='product_image'>
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
            <div class="row">
			<div class="col-4">
				<div class="label">place of birth:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $wifeBirthOfPlace ?></div>
			</div>
		</div>
            <div class="row">
			<div class="col-4">
				<div class="label">citizenship:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $wifeCitizenship ?></div>
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
