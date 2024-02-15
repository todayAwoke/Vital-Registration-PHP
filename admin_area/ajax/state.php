<?php
include 'connect.php';
$region_id =   $_POST['region_data'];
$state = "SELECT * FROM zone WHERE region_id = $region_id";
$state_qry = mysqli_query($con, $state);
// $output="";
$output = '<option value="">Select State</option>';
while ($state_row = mysqli_fetch_assoc($state_qry)) {
    $output .='<option value="' . $state_row['id'] . '">' . $state_row['name'] . '</option>';
}
echo $output;
?>
