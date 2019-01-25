	<div id="content-wrapper">
		<div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">SERVICE SALES GENERAL DISPLAY</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              services sales <div style="float:right;"><b>TOTAL SALES FOR THIS MONTH: </b><span style="color:red;"><?php echo number_format($total_monthly_sales,2);?>/=</span></div></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead style="background:none;">
                    <tr>
                      <th>ID</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Rate (UG Shs)</th>
                      <th>Total amount (UG Shs)</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                     
                      <?php
                        foreach($sales as $row){
                          echo "<tr>";
            							echo "<td>".$row->sales_id."</td>";
            							echo "<td>".$row->Name."</td>";
            							echo "<td>".$row->Quantity."</td>";
            							echo "<td>".number_format($row->amount)."</td>";
                          echo "<td>".number_format($row->total_amount)."</td>";
                          echo "<td>".$row->recorded_date."</td>";
                          echo "</tr>";
          						  }
          					  ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
            