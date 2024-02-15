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
    <div class ="container">
<h1 class="text-center  text-success">All birth</h1>
<table class="table table-bordered bg-info mt-4">
    <thead>
        <tr >
            <th >resident ID</th>
            <th>full name</th>
            <th>gender</th>
            <!-- <th>DOB </th> -->
            <th>Place of birth</th>
            <th>citizenship</th>
            <th>mother name</th>
            <th>father name</th>
            <th>mother citizenship </th>
            <th>father citizenship </th>
            <th>profile</th>
            <th>give id</th>
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
        $get_product = "SELECT * from births";
        $product_result = mysqli_query($con, $get_product);
        $number = 1;
        while ($row = mysqli_fetch_assoc($product_result)) {
            $fullName = $row['cname'];
            $birth_id = $row['b_id'];
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
          
        ?>
            <tr class='text-center'>
                <td> <?php echo $number ?></td>
                <td><?php echo $fullName ?></td>
                <td> <?php echo $sex ?></td>
                <td><?php echo $placeOfBirth ?></td>
                <td><?php echo $citizenship ?></td>
                <td><?php echo $mfullname ?></td>
                <td> <?php echo $ffullname ?></td>
                <td><?php echo $fcitizenship ?></td>
                <td><?php echo $mcitizenship ?></td>
                <td> <img src='./upload/<?php echo $birth_image ?>' class='product_image'> </td>
                <td> <a href='index.php?birth_card=<?php echo $birth_id ?>' class='text-light'> give card</a> </td>
                <td> <a href='index.php?edit_birth=<?php echo $birth_id ?>' class='text-light'> <i class='fa-solid fa-pen-to-square'></i></a> </td>
                <td> <a href='index.php?delete_birth=<?php echo $birth_id ?>' <button  class=" text-light " data-toggle="modal" data-target="#exampleModal"> </button> <i class='fa-solid fa-trash'></i></a> </td>



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
                <button type="button" class="btn btn-secondary " data-dismiss="modal"><a href="index.php" class="text-light text-decoration-none">NO</a></button>
                <button type="button"   class="btn btn-primary"> <a href='index.php?delete_birth=<?php echo $birth_id ?>' <button  class=" text-light text-decoration-none "> YES </a></button>
            </div>
        </div>
    </div>
</div>
    </div>
</body>
</html>