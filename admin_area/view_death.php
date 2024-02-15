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
<h1 class="text-center  text-success">view deaths </h1>
<table class="table table-bordered bg-info mt-4">
    <thead>
        <tr >
            <th >resident ID</th>
            <th> deceased  name</th>
            <th>gender</th>
            <th>DOB </th>
            <th>citizenship</th>
            <th>Place of death</th>
            <th>date of death</th>
            <th>issue date</th>
            <th>officer name </th>
            <th>profile </th>
            <th>give card </th>
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
        $get_product = "SELECT * from deaths";
        $product_result = mysqli_query($con, $get_product);
        $number = 1;
        while ($row = mysqli_fetch_assoc($product_result)) {
            $fullName = $row['deceased_name'];
    // $father_fullName = $row['fname'];
    $sex = $row['sex'];
    $death_id = $row['id'];
    $DOB = $row['date_of_birth'];
    $citizenship = $row['citizenship'];
    $placeOfdeath = $row['place_of_death'];
    $dateOfDeath = $row['date_of_death'];
    $certificate_date = $row['certificate_issue_date'];
    $officer_name = $row['name_officer'];
         $death_image1 = $row['photo'];
          
        ?>
            <tr class='text-center'>
                <td> <?php echo $number ?></td>
                <td><?php echo $fullName ?></td>
                <td><?php echo $DOB  ?></td>
                <td> <?php echo $sex ?></td>
                <td><?php echo $citizenship ?></td>
                
                <td><?php echo $placeOfdeath ?></td>
                <td> <?php echo $dateOfDeath ?></td>
                <td><?php echo $certificate_date ?></td>
                <td><?php echo $officer_name?></td>
                <td> <img src='./upload/<?php echo $death_image1 ?>' class='product_image'> </td>
                <td> <a href='index.php?death_card=<?php echo $death_id ?>' class='text-light'> give card </a> </td>
                <td> <a href='index.php?edit_death=<?php echo $death_id ?>' class='text-light'> <i class='fa-solid fa-pen-to-square'></i></a> </td>
                <td> <a href='index.php?delete_death=<?php echo $death_id ?>' <button  class=" text-light " data-toggle="modal" data-target="#exampleModal"> </button> <i class='fa-solid fa-trash'></i></a> </td>



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
                <button type="button"   class="btn btn-primary"> <a href='index.php?delete_death=<?php echo $death_id ?>' <button  class=" text-light text-decoration-none "> YES </a></button>
            </div>
        </div>
    </div>
</div>
    </div>
</body>
</html>