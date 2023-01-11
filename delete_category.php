<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Delete</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 bg-warning p-3">
                <h1>Delete</h1>
            </div>
        </div>
        <div class="row bg-secondary">
            <div class="col-lg-6f  p-3 text-light">
                <h4>Are you sure want to delete <?php echo "<kbd> ".$_GET['categoryName']." </kbd> ?"; ?></h4>
            </div>
            <div class="col-lg-1 p-3">
                <a href="index.php" class="btn btn-light">Cancel</a>
            </div>
            <div class="col-lg-5 p-3 text-start">
                <form action="" method="POST">
                    <input type="submit" class="btn btn-danger" name="btnDelete" value="Delete">
                </form>
            </div>
            <?php
                require "config.php";
                $object = new configClass;
                if(isset($_POST["btnDelete"])){
                    $cateID = $_GET["cateID"];

                    //normal without function
                    // $sql = "DELETE FROM tblcategory WHERE cateID=$cateID ";
                    // $query = $object -> link() -> query($sql);

                    //using function
                    $table = "tblcategory";
                    $query = $object->deleteCategory($table,"cateID",$cateID);

                    if($query){
                        echo
                        "<script> alert('Successfully delete...');</script>";
                        header ("refresh:1, url=index.php");
                    }
                    else{
                        echo " something wrong";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>