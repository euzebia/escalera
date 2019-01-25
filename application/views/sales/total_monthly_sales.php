	<div id="content-wrapper">
		<div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Monthly sales totals</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Total sales made per month</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="50%" cellspacing="0">
                  <thead style="background:pink;">
                    <tr>
                      <th>Month</th>
                      <th>Total monthly sales</th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr>
                      <?php
                       foreach($monthly_sales as $row){
                        //get month
                        $time = $row->SoldOn;
                        $pick_month_No = strtotime($time);
                        $monthNo = date('m',$pick_month_No);
                        //get month name
                        $dateObj = DateTime::createFromFormat('!m',$monthNo);
                        $monthName= $dateObj->format('F');
                        echo "<td>".$monthName." ".date('Y',$pick_month_No)."</td>";
                        echo "<td>".number_format($row->total_month_sales,2)."/= </td></tr>";

                       }
                      ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            