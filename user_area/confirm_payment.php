<?php
include('../includes/connect.php');
session_start();
if(!isset($_SESSION['username'])){
    header('location:user_login.php');
}
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_invoice = "SELECT * from user_order where order_id=$order_id";
    $result_invoice = mysqli_query($con, $select_invoice);
    $fetch_row = mysqli_fetch_array($result_invoice);
    $invoice_number = $fetch_row['invoice_number'];
    $amount_due = $fetch_row['amount_due'];
}
if(isset($_POST['confirm_payment'])){
    $invoice_number =$_POST['invoice_number'];
    $amount_due=$_POST['amount'];
    //$order_id = $_GET['order_id'];
    $payment_mode=$_POST['payment_mode'];
    $inset_payment="INSERT into user_payment(order_id,invoice_number,amout,payment_mode,payment_date)
    values($order_id,$invoice_number,$amount_due,'$payment_mode',NOW())";
    $insert_result=mysqli_query($con,$inset_payment);
    if($insert_result){
        echo "<h3 class='text-center text-success'> you have been successfully confirm the payment </h3>";
        //echo "<script> window.open('profile.php','_self') <script>";
        header('location:profile.php?my_order');
    }
    $update="UPDATE user_order set order_status='complete'where order_id='$order_id'";
    $update_result=mysqli_query($con,$update);
    if($update_result){
        //echo "awoke";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment confirm</title>
</head>

<body class="bg-secondary">

    <div class="container my-4">
        <h2 class="text-center text-light">Confirm payment</h2>
        <form action="" method="post">
            <div class="form-outline text-center w-50 m-auto ">
                <input type="text" class="form-control w-50 m-auto  " name="invoice_number" value="<?php echo $invoice_number?>">
            </div>

            <div class="form-outline text-center w-50 m-auto "><br>
                <label class="text-light">Amount:</label>
                <input type="text" class="form-control w-50 m-auto  " name="amount"  value="<?php echo  $amount_due?>">
            </div>
            <div class="form-outline text-center w-50 m-auto "><br>
                <select name="payment_mode" class="form-select m-auto w-50">
                    <option>Select payment option</option>
                    <option>paypal</option>
                    <option>netbanking</option>
                    <option>VSA</option>
                    <option>Cash on delivery</option>
                    <option>pay offline</option>
                </select>
            </div>
            <div class="form-outline text-center w-50 m-auto ">
                <input type="submit" class="py-2 px-3 my-3 border-0 bg-info " style="cursor: pointer;" name="confirm_payment" value="Confirm">
            </div>
    </div>
    </form>
    </div>
</body>

</html>