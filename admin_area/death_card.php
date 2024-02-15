
<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_GET['death_card'])) {
    $death_id = $_GET['death_card'];
    $get_death = "SELECT * from deaths where id =$death_id";
    $death_result = mysqli_query($con, $get_death);
    $row = mysqli_fetch_assoc($death_result);
    $fullName = $row['deceased_name'];
    // $father_fullName = $row['fname'];
    $sex = $row['sex'];
    $death_id = $row['id'];
    $DOB = $row['date_of_birth'];
    $citizenship = $row['citizenship'];
    $placeOfdeath = $row['place_of_death'];
    $dateOfDeath = $row['date_of_death'];
    $certificate_date = $row['certificate_issue_date'];
    $officer_name = $row['name_officer'];
         $death_image1 = $row['photo'];
         
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
		<h1 class="text-center text-danger" >DEATH CERTIFICATE</h1>
		<div class="row">
            <div class="col-6">
            <div class="row">
			<div class="col-0">
			</div>
			<div class="col-11">
            <img src='./upload/<?php echo $death_image1 ?>' class='product_image'>
			</div>
		</div> 
        <div class="row">
			<div class="col-3">
				<div class="label">Name:</div>
			</div>
			<div class="col-9">
				<div class="value"> <?php echo $fullName ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<div class="label">Date of Birth:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $DOB ?></div>
			</div>
		</div>
        <div class="row">
			<div class="col-3">
				<div class="label">citizenship:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $citizenship ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<div class="label">Place of death:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $placeOfdeath ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<div class="label">Gender:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $sex ?></div>
			</div>
		</div>
		
		
            </div>
            <div class="col-6" >
            <div class="row">
			<div class="col-3">
				<div class="label">Date of death:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $dateOfDeath ?></div>
			</div>
		</div>
            <div class="row">
			<div class="col-6">
				<div class="label">issue date:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $certificate_date ?></div>
			</div>
		</div>
            <div class="row">
			<div class="col-6">
				<div class="label">place Of Birth:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $placeOfdeath ?></div>
			</div>
		</div>
        <div class="row">
			<div class="col-6">
				<div class="label">approved by:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $officer_name ?></div>
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