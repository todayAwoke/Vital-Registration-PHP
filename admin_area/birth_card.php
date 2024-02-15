
<?php
// if(!isset($_SESSION['admin_name'])){
//     header('location:admin_login.php');
// }
include('../includes/connect.php');
if (isset($_GET['birth_card'])) {
    $birth_id = $_GET['birth_card'];
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
		<h1 class="text-center text-danger" >BIRTH CERTIFICATE</h1>
		<div class="row">
            <div class="col-6">
            <div class="row">
			<div class="col-0">
			</div>
			<div class="col-11">
            <img src='./upload/<?php echo $birth_image ?>' class='product_image'>
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
				<div class="label">Place of Birth:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $placeOfBirth ?></div>
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
				<div class="label">Father's Name:</div>
			</div>
			<div class="col-9">
				<div class="value"><?php echo $ffullname ?></div>
			</div>
		</div>
            <div class="row">
			<div class="col-6">
				<div class="label">Mother's Name:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $mfullname ?></div>
			</div>
		</div>
            <div class="row">
			<div class="col-6">
				<div class="label">Mother citizenship:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $mcitizenship ?></div>
			</div>
		</div>
        <div class="row">
			<div class="col-6">
				<div class="label">Father citizenship:</div>
			</div>
			<div class="col-5">
				<div class="value"><?php echo $fcitizenship ?></div>
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