  <div id="content-wrapper">
    <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">AMOUNT IN CURRENT STOCK: <?php  echo "<b style='color:red;'>". number_format($total,2)."/= </b>";?></li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Stock Information</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product</th>
                      <th>Category</th>
                      <th>Quantity</th>
                      <th>Settings</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach($stock as $row){
                        echo " <tr><td>".$row->PurchaseId."</td>";
                        echo "<td>".$row->Name."</td>";
                        echo "<td>".$row->Option."</td>";
                        echo "<td>".$row->current_stock."</td>";
                        echo "<td><a href='' class='btn btn-primary'>Edit </a></td>";
                        echo "</tr>";
                      }
                       
                      ?>  
                  </tbody>
                </table>
              </div>
            </div>
           