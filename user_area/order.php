<?php
if(!isset($_SESSION['username'])){
    header('location:user_login.php');
}
//no one order without register
include('../includes/connect.php');
include('../functon/commen_function.php');
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    
}
$user_ip_address = getIPAddress();
$total_price = 0;
$cart_qry = "SELECT * from cart_detail where ip_address='$user_ip_address' ";
$cart_result = mysqli_query($con, $cart_qry);
$invoice_number = mt_rand();
$status = 'pending';
$count_product = mysqli_num_rows($cart_result);
while ($rows = mysqli_fetch_array($cart_result)) {
    $product_id = $rows['product_id'];
    echo  $product_id;
    $select_product = "SELECT * from product where product_id= $product_id";
    $product_result = mysqli_query($con, $select_product);
    while ($row_price = mysqli_fetch_array($product_result)) {
        $price_array = array($row_price['product_price']);
        $array_sum = array_sum($price_array);
        $total_price += $array_sum;
    }
}
//select quantity from cart
$select_quantity = "SELECT * FROM cart_detail";
$cart_price = mysqli_query($con, $select_quantity);
$quantity_row = mysqli_fetch_array($cart_price);
$quantity = $quantity_row['quantity'];
if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_price;
} else {
    $quant=$quantity;
    $subtotal = $total_price * $quant;
}

//insert to order table
$insert_qry="INSERT INTO user_order (user_id,amount_due,invoice_number,total_product,order_date,order_status) 
values($user_id, $subtotal,$invoice_number,$count_product ,NOW(),'$status')";
$insert_result=mysqli_query($con,$insert_qry);
if($insert_result){
    echo "<script> alert('Order inserted successfully!!!') </script> ";
    echo "<script>window.open('profile.php','_self')  </script> ";
    //header('location:payment.php');
}
else{
    echo "<script> alert('some error have been occur!!!') </script> "; 
}
//quary in order_pending table
$insert_order_pending="INSERT INTO order_pending (user_id,invoice_number,product_id,quantity,order_status) 
values($user_id,$invoice_number,$product_id ,$quant,'$status')";
$insert_pending=mysqli_query($con,$insert_order_pending);
//delete cart after order
$delete_qry="DELETE from cart_detail where ip_address='$user_ip_address'";
$delete_result=mysqli_query($con,$delete_qry);

?>