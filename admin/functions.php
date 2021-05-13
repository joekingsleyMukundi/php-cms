<?php
function insertingCategories(){
    global $conn;
    if(isset($_POST["submit"])){
        $category = mysqli_real_escape_string($conn,$_POST['cat_title']);
        if($category == ""||empty($category)){
            echo "Category cannot be empty";
        }else{
            $query = "INSERT INTO cotegories (cat_title) VALUES ('$category')";
            $result = mysqli_query($conn,$query);
            if(!$result){
                die ("error: "  . mysqli_error($conn));
            }
            
        }
    
    }
}

function delete(){
    global $conn;
    if(isset($_GET["delete"])){
        $cat_id_to_delete = $_GET["delete"];
        $query = "DELETE FROM cotegories WHERE cat_id = $cat_id_to_delete";
        $result = mysqli_query($conn,$query);
        header("Location: categories.php");
    }
}