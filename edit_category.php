<?php
session_start();
error_reporting(1);
include('includes/dbconnection.php');
if(isset($_POST['insert']))
{
    $eib= $_SESSION['editbid'];
    $category=$_POST['category'];
    $code=$_POST['code'];
    $sql4="update tblcategory set CategoryName=:category,CategoryCode=:code where id=:eib";
    $query=$dbh->prepare($sql4);
    $query->bindParam(':category',$category,PDO::PARAM_STR);
    $query->bindParam(':code',$code,PDO::PARAM_STR);
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
    $sql2="SELECT tblcategory.id,tblcategory.CategoryName,tblcategory.CategoryCode,tblcategory.PostingDate from tblcategory  where tblcategory.id=:eid";
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
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-sm-12 pl-0 pr-0">Category Name</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="category" id="category" class="form-control" value="<?php  echo $row->CategoryName;?>" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 ">
                        <label class="col-sm-12 pl-0 pr-0">Category Code</label>
                        <div class="col-sm-12 pl-0 pr-0">
                            <input type="text" name="code" value="<?php  echo $row->CategoryCode;?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="submit" name="insert" class="btn btn-primary btn-fw mr-2" style="float: left;">Update</button>
            </form>
            <?php 
        }
    } ?>
</div>