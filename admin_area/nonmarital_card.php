
<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_GET['nonmarital_card'])) {
    $nonmarital_id = $_GET['nonmarital_card'];
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
		<h1 class="text-center text-danger" >NON MARITAL CERTIFICATE</h1>
		<div class="row">
            <div class="col-6">
            <div class="row">
                
			<div class="col-0">

			</div>
			<div class="col-11">
            <img src='./upload/<?php echo $nonmarital_image1 ?>' class='product_image'>
			</div>
		</div> 
        <div class="row">
			<div class="col-3">
				<div class="label"> Name:</div>
			</div>
			<div class="col-9">
				<div class="value"> <?php echo $fullName ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<div class="label">gender:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $sex ?></div>
			</div>
		</div>
        <div class="row">
			<div class="col-3">
				<div class="label">DOB:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $DOB?></div>
			</div>
		</div>
		
		
		
		
            </div>
            <div class="col-6" >
            
            <div class="row">
			<div class="col-3">
				<div class="label">citizenship:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $citizenship ?></div>
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
				<div class="label">Place of birth:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $placeOfBirth ?></div>
			</div>
		</div>
        <div class="row">
			<div class="col-4">
				<div class="label">marital Status:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $maritalStatus ?></div>
			</div>
		</div>
        <div class="row">
			<div class="col-4">
				<div class="label">address:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $address ?></div>
			</div>
		</div>
        <div class="row">
			<div class="col-4">
				<div class="label">issue date:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $issuedDate ?></div>
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
