<?php
session_start();
error_reporting(1);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
  $sectorname=$_POST['sectorname'];
  $sectordes=$_POST['sectordes'];
  $sql="insert into tblservice(ServiceName,SerDes)values(:sectorname,:sectordes)";
  $query=$dbh->prepare($sql);
  $query->bindParam(':sectorname',$sectorname,PDO::PARAM_STR);
  $query->bindParam(':sectordes',$sectordes,PDO::PARAM_STR);
  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) {
    echo '<script>alert("Sector has been added.")</script>';
    echo "<script>window.location.href ='newsector.php'</script>";
    }
  else
    {
     echo '<script>alert("Something Went Wrong. Please try again")</script>';
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
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Sector Form </h4>
                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <label for="exampleInputName1">Sector Name</label>
                        <input type="text" name="sectorname" class="form-control" id="sectorname" placeholder="Sector Name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Sector Description</label>
                        <textarea class="form-control" name="sectordes" id="sectordes" rows="4" required></textarea>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2">Submit</button>
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