<head>
    <style>
        .product_image {
            width: 30%;
            height: 30%;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class ="container-fluid">
    <h1 class="text-center  text-success">All residents</h1>
        <table  class="table table-bordered bg-info mt-4">
    <thead>
        <tr >
            <th  >resident ID</th>
            <th> name</th>
           
            <th>gender</th>
            <th>region</th>
            <th>zone  </th>
            <th>woreda</th>
            <th>citizenship</th>
            <th>phone</th>
            <th>marital status</th>
            <th>profile</th>
            <th> give card </th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        // if(!isset($_SESSION['admin_name'])){
        //     header('location:admin_login.php');
        // }
        include('../includes/connect.php');
        $get_product = "SELECT * from residence";
        $product_result = mysqli_query($con, $get_product);
        $number = 1;
        while ($row = mysqli_fetch_assoc($product_result)) {
            $residence_id= $row['id'];
            $fullName = $row['fullName'];
            $father_fullName = $row['father_fullName'];
            $mother_fullName = $row['mother_fullName'];
            $sex = $row['sex'];
            $region = $row['region'];
            $zone = $row['zone'];
            $woreda = $row['woreda'];
            $citizenship = $row['citizenship'];
            $phone = $row['phone'];
            $residence_image = $row['photo'];
            $placeOfBirth = $row['placeOfBirth'];
            $maritalStatus = $row['maritalStatus'];
        ?>
            <tr class='text-center'>
                <td> <?php echo $number ?></td>
                <td><?php echo $fullName ?></td>
                
                <td> <?php echo $sex ?></td>
                <td><?php echo $region ?></td>
                <td><?php echo $zone ?></td>
                <td> <?php echo $woreda ?></td>
                <td><?php echo $citizenship ?></td>
                <td><?php echo $phone ?></td>
                <td> <?php echo $maritalStatus ?></td>
                <td> <img src='./upload/<?php echo $residence_image ?>' class='product_image'> </td>
                <td > <a href='index.php?give_card=<?php echo $residence_id ?>' class='text-light'> verify </a> </td>
                <td> <a href='index.php?edit_residence=<?php echo $residence_id ?>' class='text-light'> <i class='fa-solid fa-pen-to-square'></i></a> </td>
                <td> <a href='index.php?delete_residence=<?php echo $residence_id ?>' <button  class=" text-light " data-toggle="modal" data-target="#exampleModal"> </button> <i class='fa-solid fa-trash'></i></a> </td>



            </tr>
        <?php
            $number++;
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
                <button type="button" class="btn btn-secondary " data-dismiss="modal"><a href="index.php?view_residence" class="text-light text-decoration-none">NO</a></button>
                <button type="button"   class="btn btn-primary"> <a href='index.php?delete_residence=<?php echo $residence_id ?>' <button  class=" text-light text-decoration-none "> YES </a></button>
            </div>
        </div>
    </div>
</div>
    </div>
</body>
</html>