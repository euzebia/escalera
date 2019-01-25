  <div id="content-wrapper">
    <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Sales</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Sales information</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product</th>
                      <th>Category</th>
                      <th>Price(@)</th>
                      <th>Quantity sold</th>
                      <th>Sold on</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach($daily_sales as $row){
                          
                        echo " <tr><td>".$row->SalesId."</td>";
                        echo "<td>".$row->Name."</td>";
                        echo "<td>".$row->Option."</td>";
                        echo "<td>".$row->Sellingpx."</td>";
                         echo "<td>".$row->Quantity."</td>";
                         //get date and time from time stamp
                         $timestamp = strtotime($row->SoldOn);
                         $date = date('d-m-Y',$timestamp);
                        echo "<td>".$date." at " .date("h:i a",$timestamp)."</td>";
                        echo "</tr>";
                      }
                      ?>  
                  </tbody>
                </table>
              </div>
            </div>