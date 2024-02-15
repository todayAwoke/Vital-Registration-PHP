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
<h1 class="text-center  text-success">All divorces</h1>
<table class="table table-bordered bg-info mt-4">
    <thead>
        <tr >
            <th >resident ID</th>
            <th> husband full name</th>
            <th>husband Place of birth</th>
            <th>husband citizenship</th>
            <th> wife full name</th>
            <th>wife citizenship</th>
            <th>wife Place of birth</th>
            
            <th>hu photo</th>
            <th>wife photo</th>
        
            <th>issue card</th>
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
        $get_product = "SELECT * from divorces";
        $product_result = mysqli_query($con, $get_product);
        $number = 1;
        while ($row = mysqli_fetch_assoc($product_result)) {
            $husbandFullName = $row['husbandFullName'];
            $divorce_id = $row['id'];
            $husbandbirthplace = $row['husbandbirthPlace'];
            $husbandCitizenship = $row['husbandCitizenship'];
            $wifeFullName = $row['wifeFullName'];
            
            $wifeBirthOfPlace = $row['wifeBirthOfPlace'];
            $wifeCitizenship = $row['wifeCitizenship'];
            //$husbanDateOfDivorce = $row['husbandDateOfDivorce'];
            $officeName =   $row['officerName'];
            $divorce_image1 = $row['hphoto'];
            $divorce_image2 = $row['wphoto'];
          
        ?>
            <tr class='text-center'>
                <td> <?php echo $number ?></td>
                <td><?php echo $husbandFullName ?></td>
                <td> <?php echo $husbandbirthplace ?></td>
                <td><?php echo $husbandCitizenship ?></td>
                <td><?php echo $wifeFullName ?></td>
                <td><?php echo $wifeCitizenship ?></td>
                <td><?php echo $wifeBirthOfPlace ?></td>
        
                <td> <img src='./upload/<?php echo $divorce_image1 ?>' class='product_image'> </td>
                <td> <img src='./upload/<?php echo $divorce_image2 ?>' class='product_image'> </td>
                <td> <a href='index.php?divorce_card=<?php echo $divorce_id ?>' class='text-light'> give card</a> </td>
                <td> <a href='index.php?edit_divorce=<?php echo $divorce_id ?>' class='text-light'> <i class='fa-solid fa-pen-to-square'></i></a> </td>
                <td> <a href='index.php?delete_divorce=<?php echo $divorce_id ?>' <button  class=" text-light " data-toggle="modal" data-target="#exampleModal"> </button> <i class='fa-solid fa-trash'></i></a> </td>



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
                <button type="button"   class="btn btn-primary"> <a href='index.php?delete_divorce=<?php echo $divorce_id ?>' <button  class=" text-light text-decoration-none "> YES </a></button>
            </div>
        </div>
    </div>
</div>
    </div>
</body>
</html>