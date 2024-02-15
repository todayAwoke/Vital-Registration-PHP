
<body>
    <h3 class="text-center text-success">All orders</h3>
    <table class="table table-bordered my-3">
        <?php
        if(!isset($_SESSION['admin_name'])){
            header('location:admin_login.php');
        }
        $select_order = "SELECT*FROM user_order";
        $order_result = mysqli_query($con, $select_order);
        $count = mysqli_num_rows($order_result);

        if ($count == 0) {
            echo "<h3 class='text-center text-danger'> there is no order product";
        } else {
            echo "<thead class='bg-info'>
            <tr>
                <th>SI NO</th>
                <th>Due amount</th>
                <th>Total products</th>
                <th>Invoice number</th>
                <th>Order date</th>
                <th>Status</th>
                <th>Delete</th>
            </tr> </thead>
            <tbody class 'bg-secondary text-light'>";
            $number = 0;
            while ($row = mysqli_fetch_assoc($order_result)) {
                $order_id = $row['order_id'];
                $user_id = $row['user_id'];
                $amount = $row['amount_due'];
                $total_product = $row['total_product'];
                $invoice_number = $row['invoice_number'];
                $order_date = $row['order_date'];
                $status = $row['order_status'];
                $number++;
                echo "<tr class ='bg-secondary text-light'>
                <td>$number</td>
                <td> $amount</td>
                <td>$total_product</td>
                <td>  $invoice_number</td>
                <td> $order_date</td>
                <td> $status</td>";
        ?>
                <td> <a href='index.php?delete_order=<?php echo $order_id ?>' <button class=" text-light " data-toggle="modal" data-target="#exampleModal"> </button> <i class='fa-solid fa-trash'></i></a> </td>
                </tr>
        <?php
            }
        }
        ?>


        </tbody>
    </table>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <H3 class="text-danger"> Are you sure delete this ?</H3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal"><a href="./index.php?all_order" class="text-light text-decoration-none">NO</a></button>
                    <button type="button" class="btn btn-primary"> <a href='index.php?delete_order=<?php echo $order_id ?>' <button class=" text-light text-decoration-none "> YES </a></button>
                </div>
            </div>
        </div>
    </div>