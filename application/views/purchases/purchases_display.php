<style type="text/css">
  tr td{
     padding: 4px!important;
     margin: 2px!important;
     font-size:14px;
     font-family:HELVETICA;
     text-align: center;
  }
</style>
  <div id="content-wrapper" style="background: #ffffff">
		<div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb" style="margin-top:none;">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">GENERAL PRICE LIST</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header fa fa-line-chart fa-lg">
              <i class="fa fa-list fa-lg"></i>
              Price Information</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="dataTable" width="100%" cellspacing="0">
                  <thead >
                    <tr style="padding:1px;font-size:13px;">
                      <th class="text-left">ID</th>
                      <th class="text-left">Item</th>
                      <th class="text-left">Category</th>
                      <th class="text-left">Unit price</th>
                      <th class="text-left">Selling price</th>
                      <th class="text-left">Quantity </th>
                      <th class="text-left"> Unit Cost (Total Amount)</th>
                      <th class="text-left">Expected Profits </th>
                      <th class="text-left">Recorded On</th>
					            <th class="text-right">Edit</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                     <?php
                      echo "<tr style='padding:1px;font-size:13px;'>";
        					    foreach($purchases as $row){
        							echo "<td class='text-left' style='padding-left:13px;'>".$row->PurchaseId."</td>";
        							echo "<td class='text-left' >".$row->Name."</td>";
        							echo "<td class='text-left'>".$row->Option."</td>";
        							echo "<td class='text-right'>".number_format($row->UnitPrice)."</td>";
                      echo "<td class='text-right'>".number_format($row->SellPrice)."</td>";
        							echo "<td class='text-right'>".$row->Quantity."</td>";
                      echo "<td class='text-right'>".number_format($row->InitialAmount)."</td>";
                      echo "<td class='text-right'>".number_format($row->Profit)."</td>";
                      echo "<td class='text-right' >".$row->DateOfPurchase."</td>";
        							echo "<td class='text-center'><button type='button' class='btn btn-primary btn-sm'><span class='fa fa-edit'></span></button</td></tr>";
        						  }
        					  ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Escalera Investments Ltd</div>
          </div>

          <p class="small text-center text-muted my-5">
            <em>Jeremiah 29:11</em>
          </p>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Escalera investments ltd <?php echo date('M:Y');?></span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url();?>/assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>/assets/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>/assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url();?>/assets/js/demo/datatables-demo.js"></script>

  </body>

</html>
