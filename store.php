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
                  <h5 class="modal-title" style="float: left;">Farm Store</h5>    
                  <div class="card-tools" style="float: right;">
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#deleted-items"  > New Item</button>
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#pay-rent"  ><i class="fas fa-plus" ></i>&nbsp; Stock In</button> 
                  </div>    
                </div>
                
                <div class="modal fade" id="pay-rent">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">New Item register</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        
                        <?php @include("newitem-form.php");?>
                      </div>
                      
                    </div>
                    
                  </div>
                  
                </div>
                

                <div class="modal fade" id="deleted-items">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">New Items</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        
                        <?php @include("deleted-items.php");?>
                      </div>
                     
                        
                      
                    </div>
                    
                  </div>
                  
                </div>
                

                <div id="itemout" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Item Out Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="info_update2">
                        
                        <?php @include("storeout.php");?>
                      </div>
                      
                    </div>
                    
                  </div>
                  
                </div>

                <div class="card-body table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                   <thead>
                    <tr>
                      <th class="text-center">Date</th>
                      <th class="text-center">Item</th>
                      <th class="text-center">Qty Remaining</th>
                      <th class="text-center">Rate</th>
                      <th class="text-center">Total</th>
                      <th class="text-center">Actions</th>
                    </tr>
                  </thead>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
                  <tbody>
                    <?php
                    $sql="SELECT * from store_stock where status='1'";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);

                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $row)
                      {  
                        $remaining=$row->quantity_remaining;
                        $rate=$row->rate;
                        $total=($remaining*$rate);  
                        ?>

                        <tr>
                         <td class="font-w600"><?php  echo htmlentities(date("d-m-Y", strtotime($row->date)));?></td>
                         <td class="font-w600"><?php  echo htmlentities($row->item);?></td>
                         <td class="font-w600"><?php  echo htmlentities($row->quantity_remaining);?></td>
                         <td class="font-w600"><?php  echo htmlentities(number_format($row->rate, 0, '.', ','));?></td>
                         <td class="font-w600"><?php  echo htmlentities(number_format($total, 0, '.', ','));?></td>
                         <td>
                          <a class="btn btn-danger btn-xs edit_data
                          href="store.php?delid=<?php echo ($row->id);?>" onclick="return confirm('Do you really want to Delete ?');" title="Delete this item"><i class="fa fa-trash fa-delete"style="color: #fff" aria-hidden="true"></i></a>
                          <button class="btn btn-danger btn-xs edit_data" id="<?php echo  ($row->id); ?>">Item Out</button>
                        </td>
                      </tr>

                      <?php 
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

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.edit_data',function(){
      var edit_id=$(this).attr('id');
      $.ajax({
        url:"storeout.php",
        type:"post",
        data:{edit_id:edit_id},
        success:function(data){
          $("#info_update2").html(data);
          $("#itemout").modal('show');
        }
      });
    });
  });
</script>
</body>
</html>
