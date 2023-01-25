<?php
include('includes/checklogin.php');
check_login();
// Uploads files
$imgid=intval($_GET['imageid']);
if(isset($_POST['submit'])) { // if save button on the form is clicked
  $aimage=$_FILES["imagename"]["name"];
  move_uploaded_file($_FILES["imagename"]["tmp_name"],"productimages/".$_FILES["imagename"]["name"]);
  $sql="update tblproducts set ProductImage=:aimage where id=:imgid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':imgid',$imgid,PDO::PARAM_STR);
  $query->bindParam(':aimage',$aimage,PDO::PARAM_STR);
  $query->execute();
  if( $query->execute()){
    echo '<script>alert(" image has been Updated.")</script>';

  }else{
    echo '<script>alert("Something went wrong please try a.")</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
  <div class="container-scroller">
    
    <?php @include("includes/header.php");?>
    
    <div class="container-fluid page-body-wrapper">
      
      
      <div class="main-panel">
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">Update Product Image</h5>
                </div>
                
                <div class="card-body ">
                 <form class="form-horizontal" name="image" method="post" enctype="multipart/form-data">
                  <?php 
                  $imgid=intval($_GET['imageid']);
                  $sql = "SELECT * from tblproducts where id=:imgid";
                  $query = $dbh -> prepare($sql);
                  $query -> bindParam(':imgid', $imgid, PDO::PARAM_STR);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount() > 0)
                  {
                    foreach($results as $row)
                    { 
                      ?>  
                      <div class="form-group ml-4">
                        <label for="focusedinput" class=" control-label">Current Image </label>
                        <div class="">
                          <img src="productimages/<?php  echo $row->ProductImage;?>" width="200">
                        </div>
                      </div>

                      <div class="form-group ml-4">
                        <label for="focusedinput" class=" control-label">New Image</label>
                        <div class="">
                          <input type="file" name="imagename" id="imagename" required>
                        </div>
                      </div>  
                      <?php 
                    }
                  } ?>

                  <div class="row mb-4 ml-4" >
                    <div class="col-sm-8 col-sm-offset-2">
                      <button type="submit" name="submit" class="btn-primary btn">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <?php @include("includes/footer.php");?>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
      
    </div>
    
  </div>
  
</div>

<?php @include("includes/foot.php");?>

</body>
</html>
