
                                             
                        <form action="" method="post">
                            <div class="form-group">
                            <label for="cat_title">Category</label>
                            <?php
                           if(isset($_GET["edit"])) {
                               $category_id_to_edit=$_GET["edit"] ;
                               $query = "SELECT * FROM cotegories WHERE cat_id = $category_id_to_edit";
                               $result= mysqli_query($conn,$query);
                               while($row =mysqli_fetch_assoc($result)){
                                   $cat_title = $row['cat_title']
                                ?>
                               <input type="text" class="form-control" value="<?php echo $cat_title;?> " name="cat_title">
                           
                        <?php }
                           }
                        ?>   
                               
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update" value = "Update">
                            </div>
                        </form>

                        <?php
                            if(isset($_POST["update"])){
                                $updateTo = mysqli_real_escape_string($conn,$_POST["cat_title"]);
                                $query = "UPDATE cotegories SET cat_title='$updateTo' WHERE cat_id = $cat_id";
                                $query = mysqli_query($conn,$query);
                                if(!$result){
                                    die("error: ". mysqli_error($conn));
                                }
                                header("Location: categories.php");
                            }
                        ?>