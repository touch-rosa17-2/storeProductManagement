<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Update</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <form action="" method="POST">
                    <div class="col-xl-12 bg-success text-warning p-4" >
                        <h1>Update Category</h1>
                    </div>
                    <div class="col-lg-4 p-3 bg-info bg-gradient" >
                        <label for="category">Please Update Category</label>
                        <input type="text" name="updateCategory" id="category" class="input input-focus" 
                        placeholder="Enter Category" value="<?php echo $_GET["categoryName"]; ?>">

                        <button type="submit" value="Update" name="btnUpdate" id="btnUpdate" class="btn btn-primary btn-hover">Submit</button>
                        <!-- <input type="submit" name="btnSubmit"> -->
                    </div>
                </form> 
                <?php
                    require "config.php";
                    $object = new configClass;
                    $cateID = $_GET["cateID"];
                    if(isset($_POST["btnUpdate"])){
                        $categoryUpdate = $_POST["updateCategory"];
                        if(empty($categoryUpdate)){
                            echo "Please enter new category";
                        }
                        else{
                            // normal without function
                            // $sql = "UPDATE tblcategory set cateName = '$categoryUpdate' WHERE cateID='$cateID'";
                            // $query = $object -> link() -> query($sql);

                            // using function
                            $table = "tblcategory";
                            $field = array("cateName");
                            $value = array("'$categoryUpdate'");
                            $query = $object->update_1condition($table, $field, $value, "cateID", "$cateID");
                            if($query){
                                echo
                                "<script> alert('Successfully updated...');</script>";
                                header ('refresh:1, url=index.php');
                            }
                            else{
                                echo "Please update...";

                            }
                        }
                    }
                ?>
            </div>
    </div>
</body>
</html>