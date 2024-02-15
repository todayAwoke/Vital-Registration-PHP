<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <?php
    include('../includes/connect.php');
    @session_start();
    if(!isset($_SESSION['username'])){
        header('location:user_login.php');
    }
    //
    $user_name = $_SESSION['username'];
    $select = "SELECT *from user_data where user_name='$user_name'";
    $result = mysqli_query($con, $select);
    $fetch_row = mysqli_fetch_assoc($result);
    $user_id = $fetch_row['user_id'];
    ?>
    <h3 class="text-success">All My Orders</h3>
    <table class="table table-bordered ">
        <thead class="bg-info ">
            <tr>
                <th>SI No</th>
                <th>Amount Due</th>
                <th>Total product </th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status </th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">

            <?php
            $get_order_detail = "SELECT * from user_order where user_id='$user_id'";
            $order_result = mysqli_query($con, $get_order_detail);
            $serial_number = 1;
            while ($rows = mysqli_fetch_assoc($order_result)) {
                $order_id = $rows['order_id'];
                $amount_due = $rows['amount_due'];
                $total_product = $rows['total_product'];
                $invoice_number = $rows['invoice_number'];
                $date = $rows['order_date'];
                // $complete = $rows['order_id'];
                $status = $rows['order_status'];
                if ($status == 'pending') {
                    $status = 'Incomplete';
                } else {
                    $status = 'Complete';
                }

                echo "<tr>
            <td scope='row'>$serial_number </td>
            <td>$amount_due</td>
            <td>$total_product</td>
            <td> $invoice_number</td>
            <td>$date</td>
            <td> $status</td>";
            ?>
            <?php
                if ($status == 'Complete') {
                    echo "<td class='text-success'> Paid</td>";
                } else
                    echo " <td> <a href='confirm_payment.php?order_id=$order_id' class='text-light bg-primary text-center' > conform</td>
            </tr>";
                $serial_number++;
            } ?>
        </tbody>
    </table>
</body>

</html>