<?php
include('includes/checklogin.php');
check_login();
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
                  <h5 class="modal-title" style="float: left;">Invoice Report</h5>
                </div>
                
                <div class="card-body table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                   <thead>
                    <tr>
                      <th>#</th>
                      <th>Invoice Number</th>
                      <th>Customer Name</th>
                      <th>Customer Contact no.</th>
                      <th>Payment Mode</th>
                      <th>Payment Date</th>
                      
                    </tr>
                  </thead>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
                  <tbody>
                    <?php
                    $rno=mt_rand(10000,99999); 
                    $sql="select distinct InvoiceNumber,CustomerName,CustomerContactNo,PaymentMode,InvoiceGenDate    from tblorders ORDER BY id DESC";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $row)
                      {  
                        ?>
                        <tr>
                          <td><?php echo $cnt;?></td>

                          <td class="font-w600"><?php  echo htmlentities($row->InvoiceNumber);?></td>
                          <td class="font-w600"><?php  echo htmlentities($row->CustomerName);?></td>
                          <td class="font-w600">0<?php  echo htmlentities($row->CustomerContactNo);?></td>
                          <td class="font-w600"><?php  echo htmlentities($row->PaymentMode);?></td>
                          <td class="font-w600"><?php  echo htmlentities(date("d-m-Y", strtotime($row->InvoiceGenDate)));?></td>
                          
                        </tr>

                        <?php 
                        $cnt++;
                      }
                    }?>
                  </tbody>                  
                </table>
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
