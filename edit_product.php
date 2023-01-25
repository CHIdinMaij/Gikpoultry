<?php
session_start();
error_reporting(1);
include('includes/dbconnection.php');
if(isset($_POST['insert']))
{
    $eib= $_SESSION['editbid'];
    $category=$_POST['category'];
    $product=$_POST['product'];
    $price=$_POST['price'];
    $sql4="update tblproducts set CategoryName=:category,ProductName=:product,ProductPrice=:price where id=:eib";
    $query=$dbh->prepare($sql4);
    $query->bindParam(':category',$category,PDO::PARAM_STR);
    $query->bindParam(':product',$product,PDO::PARAM_STR);
    $query->bindParam(':price',$price,PDO::PARAM_STR);
    $query->bindParam(':eib',$eib,PDO::PARAM_STR);
    $query->execute();
    if ($query->execute())
    {
        echo '<script>alert("updated successfuly")</script>';
    }else{
        echo '<script>alert("update failed! try again later")</script>';
    }
}
?>
<div class="card-body">
    <?php
    $eid=$_POST['edit_id4'];
    $sql2="SELECT tblproducts.id,tblproducts.CategoryName,tblproducts.ProductName,tblproducts.PostingDate,tblproducts.ProductPrice,tblproducts.ProductImage from tblproducts where tblproducts.id=:eid";
    $query2 = $dbh -> prepare($sql2);
    $query2-> bindParam(':eid', $eid, PDO::PARAM_STR);
    $query2->execute();
    $results=$query2->fetchAll(PDO::FETCH_OBJ);
    if($query2->rowCount() > 0)
    {
        foreach($results as $row)
        {
            $_SESSION['editbid']=$row->id;
            ?>

            <form class="form-sample"  method="post" enctype="multipart/form-data">
                <div class="control-group">
                    <label class="control-label" for="basicinput">Product Image</label>
                    <div class="controls">
                        <img style="height: 100px; width: 100px;" src="productimages/<?php  echo $row->ProductImage;?>" width="150" height="100">
                        <a href="update_productimage.php?imageid=<?php echo ($row->id) ?>">Change Image</a>
                    </div>
                </div>  
                <div>&nbsp;</div>
                
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-sm-12 pl-0 pr-0">Category Name</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="category" id="category" class="form-control" value="<?php  echo $row->CategoryName;?>" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-sm-12 pl-0 pr-0">Product Name</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="product" value="<?php  echo $row->ProductName;?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 ">
                        <label class="col-sm-12 pl-0 pr-0">Product Price</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="price" value="<?php  echo $row->ProductPrice;?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="submit" name="insert" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
            </form>
            <?php 
        }
    } ?>
</div>