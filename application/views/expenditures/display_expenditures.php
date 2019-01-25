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
              Expenditures incurred<div style="float:right;"><?php echo strtoupper(date('M'))." EXPENDITURES: <b>" .number_format($monthly_expenditures,1)."/=</b>"; ?></div></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="50%" cellspacing="0">
                  <thead style="background:lightblue;">
                    <tr>
                      <th>Id</th>
                      <th>Description</th>
                      <th>Amount</th>
                      <th>Recorded on </th>
                    </tr>
                  </thead>
                  <tbody>
                     
                      <?php

                       foreach($expenses as $row){
                        echo "<tr>";
                        echo "<td>".$row->exp_id."</td>";
                        echo "<td>".$row->Name."</td>";
                        echo "<td>".$row->amount."</td>";
                        echo "<td>".$row->exp_date."</td>";
                        echo "</tr>";

                       }
                      ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            