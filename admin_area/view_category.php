<head>

</head>
<h1 class="text-center  text-success">All Category</h1>
<table class="table table-bordered bg-info mt-4">
    <thead>
        <tr>
            <th>Category ID</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        if(!isset($_SESSION['admin_name'])){
            header('location:admin_login.php');
        }
        include('../includes/connect.php');
        $get_category = "SELECT * from catagory";
        $category_result = mysqli_query($con, $get_category);
        $number = 1;
        while ($row = mysqli_fetch_assoc($category_result)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
        ?>
            <tr class='text-center'>
                <td> <?php echo $number ?></td>
                <td><?php echo $category_title ?></td>
                <td> <a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'> <i class='fa-solid fa-pen-to-square'></i></a> </td>
                <td> <a href='index.php?delete_category=<?php echo $category_id ?>' <button class=" text-light " data-toggle="modal" data-target="#exampleModal"> </button> <i class='fa-solid fa-trash'></i></a> </td>

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
                <button type="button" class="btn btn-secondary " data-dismiss="modal"><a href="./index.php?view_category" class="text-light text-decoration-none">NO</a></button>
                <button type="button" class="btn btn-primary"> <a href='index.php?delete_category=<?php echo $category_id ?>' <button class=" text-light text-decoration-none "> YES </a></button>
            </div>
        </div>
    </div>
</div>