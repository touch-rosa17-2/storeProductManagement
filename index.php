<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Category</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="" method="POST">
                <div class="col-xl-12 bg-success text-warning p-4" >
                    <h1>Add Category</h1>
                </div>
                <div class="col-lg-4 p-3 bg-info bg-gradient" >
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" class="input input-focus" value="" placeholder="Enter Category">
                    <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-primary btn-hover">Submit</button>
                    <!-- <input type="submit" name="btnSubmit"> -->
                </div>
            </form>
        </div>
        
        <!-- write data to mysql -->
        <?php
            require "config.php";
            $object = new configClass;
            if(isset($_POST["btnSubmit"])){
                $category = $_POST["category"];

                //normal without function
                // $insert = "INSERT INTO tblcategory VALUES('','$category')";
                // $sql = $object -> link() ->query($insert);
                
                //use function
                $table = "tblcategory";
                $field = array("cateName");
                $value = array("'$category'");  
                $sql = $object -> insert($table,$field,$value);
                if(!empty($sql)){
                    echo
                    "<script> alert('Successfully...');</script>";
                }
                else{
                    echo
                    "<script> alert('Error connection...');</script>";
                }
            }

        ?>
        
        <!-- output data -->
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover table-primary table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Categort</th>
                        <th colspan="2" class="text-center">Option</th>
                    </tr>
                    <?php
                        // nomal output without function
                        // $sql = "SELECT * FROM tblcategory";
                        // $query = $object  -> link() -> query($sql);

                        // using function
                        $query = $object -> display("tblcategory");
                        // for make id run from 1
                        $i=0;
                        while($row = mysqli_fetch_assoc($query)){
                            $i++; 
                            $cateID = $row["cateID"];
                            $cateName = $row["cateName"];
                            echo
                            "<tr>
                                <td>$i</td>
                                <td>$cateName</td>
                                <td>
                                    <a href='update_category.php?cateID=$cateID & categoryName=$cateName'>Update</a>
                                </td>
                                <td>
                                    <a href='delete_category.php?cateID=$cateID & categoryName=$cateName'>Delete</a>
                                </td>
                            </tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

</body>
</html>