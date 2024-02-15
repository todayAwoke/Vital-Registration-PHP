<body>
    <h3 class="text-center text-success">All Payment</h3>
    <table class="table table-bordered my-3">
        <?php
        if(!isset($_SESSION['admin_name'])){
            header('location:admin_login.php');
        }
        $select_payment = "SELECT*FROM user_payment";
        $payment_result = mysqli_query($con, $select_payment);
        $count = mysqli_num_rows($payment_result);

        if ($count == 0) {
            echo "<h3 class='text-center text-danger'> there is no paid product";
        } else {
            echo "<thead class='bg-info'>
            <tr>
                <th>SI NO</th>
                <th>Invoice number</th>
                <th> amount</th>
                <th>Payment mode</th>
                <th>payment date</th>
                <th>Delete</th>
            </tr> </thead>
            <tbody class 'bg-secondary text-light'>";
            $number = 0;
            while ($row = mysqli_fetch_assoc($payment_result)) {
                $payment_id = $row['payment_id'];
                //$user_id = $row['user_id'];
                $amount = $row['amout'];
                $payment_mode = $row['payment_mode'];
                $invoice_number = $row['invoice_number'];
                $payment_date = $row['payment_date'];
                
                $number++;
                echo "<tr class ='bg-secondary text-light'>
                <td>$number</td>
                <td>$invoice_number</td>
                <td> $amount</td>
                <td>  $payment_mode</td>
                <td> $payment_date</td>";
        ?>
                <td> <a href='index.php?delete_payment=<?php echo $payment_id ?>' <button class=" text-light " data-toggle="modal" data-target="#exampleModal"> </button> <i class='fa-solid fa-trash'></i></a> </td>
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
                    <button type="button" class="btn btn-secondary " data-dismiss="modal"><a href="./index.php?all_payment" class="text-light text-decoration-none">NO</a></button>
                    <button type="button" class="btn btn-primary"> <a href='index.php?delete_payment=<?php echo $payment_id ?>' <button class=" text-light text-decoration-none "> YES </a></button>
                </div>
            </div>
        </div>
    </div>