  <div id="loading"></div>
    <div id="page">
    </div>
 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  
  <div class="navbar-menu-wrapper d-flex align-items-stretch w-100">
   
    
    <ul class="navbar-nav navbar-nav-left">
      <li class="nav-item dropdown">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          
          </li>
     <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product Management</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="category.php">Manage Category</a>
              <a class="dropdown-item" href="product.php">Manage Product</a>
            </div>
          </li>
           

          <li class="nav-item dropdown">
            <a class="nav-link" href="farmprofile.php">Farm Details</a>
          
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="store.php">Farm Store</a>
          
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="sell_product.php">Sell Product</a>
          
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="invoices.php">Invoices</a>
          
          </li>
          <?php
        $aid=$_SESSION['odmsaid'];
        $sql="SELECT * from  tbladmin where ID=:aid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {  
            foreach($results as $row)
            { 
                if($row->AdminName=="Admin"  )
                { 
                    ?>
           <l

           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="product_report.php">Product Report</a>
              <a class="dropdown-item" href="stock_report.php">Stock Report</a>
               <a class="dropdown-item" href="invoice_report.php">Invoice Report</a>
            </div>
          </li>

           

         
        <?php 
                } 
            }
        } ?>
        
        </ul>
        <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <?php
        $aid=$_SESSION['odmsaid'];
        $sql="SELECT * from  tbladmin where ID=:aid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
          foreach($results as $row)
          { 
            ?>
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <?php 
                if($row->Photo=="avatar15.jpg")
                { 
                  ?>
                  <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                  <?php 
                } else { 
                  ?>
                  <img class="img-avatar" src="assets/img/profileimages/<?php  echo $row->Photo;?>" alt=""> 
                  <?php 
                } ?>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 "><?php  echo $row->FirstName;?> <?php  echo $row->LastName;?></p>
              </div>
            </a>
            <?php
          }
        } ?>

        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="profile.php">
            <i class="mdi mdi-account mr-2 text-success"></i> Profile </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="change_password.php"><i class="mdi mdi-settings mr-2 text-success"></i> Change Password </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">
              <i class="mdi mdi-logout mr-2 text-danger"></i> Logout </a>
            </div>
          </li>
        
         
        
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>




