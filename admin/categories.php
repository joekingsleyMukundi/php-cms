<?php include "includes/admin_header.php"?>
    <div id="wrapper">

    <?php include "includes/admin_nav.php"?>
        <div id="page-wrapper">

            
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xs-6">
                        <?php insertingCategories()?>

                        <form action="" method="post">
                            <div class="form-group">
                            <label for="cat_title">Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value = "Add Category">
                            </div>
                        </form>

                        <?php if(isset($_GET["edit"])){
                            $cat_id = $_GET["edit"];
                            include "includes/edit.php";
                        } ?>

                        </div>
                        <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                               $query = "SELECT * FROM cotegories";
                               $result = mysqli_query($conn,$query);
                               while ($row=mysqli_fetch_assoc($result))
                                 {?>
                                    <tr>
                                        <td> <?php echo $row['cat_id']?>  </td>
                                        <td><?php echo $row['cat_title']?> </td>
                                        <td><?php echo "<a href='categories.php?delete={$row['cat_id']}'>delete</a>" ?> </td>
                                        <td><?php echo "<a href='categories.php?edit={$row['cat_id']}'>edit</a>" ?> </td>
                                    </tr>
                              <?php  }  ?>



                            <?php
                                delete();
                            ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php"?>