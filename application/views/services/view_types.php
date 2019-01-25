	<div id="content-wrapper">
		<div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Service types</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              services </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead style="background:none;">
                    <tr>
                      <th>Type ID</th>
                      <th>Name</th> 
                    </tr>
                  </thead>
                  
                  <tbody>
                     
                      <?php
                        foreach($types as $row){
                          echo "<tr>";
                          echo "<td>".$row->Id."</td>";
            							echo "<td>".$row->Name."</td>";
                          echo "</tr>";
          						  }
          					  ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
            