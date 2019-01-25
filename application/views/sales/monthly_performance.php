
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active ">Visualization of quantity of products in stock</li>
          </ol>

          <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>Products in stock</div>
            <div class="card-body">
              <canvas id="myBarChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

          <div class="row">
            <div class="col-lg-8">
            
            </div>
            
          </div>

          <p class="small text-center text-muted my-5">
            <em>More chart examples coming soon...</em>
          </p>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
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
    <script src="<?php echo base_url();?>/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>/assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script type="text/JavaScript">
      // Bar chart showing Items in stock
       var pdt_names = <?php echo $pdts; ?>;

        var pdt_qty = <?php echo $quantity_in_stock; ?>;
        var ctx = document.getElementById("myBarChart");
        var myLineChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: pdt_names,
            datasets: [{
              label: "Products",
              backgroundColor: "rgba(2,117,216,1)",
              borderColor: "rgba(2,117,216,1)",
              data: pdt_qty,
            }],
          },
          options: {
            scales: {
              xAxes: [{
                time: {
                  unit: 'Quantity'
                },
                gridLines: {
                  display: false
                },
                ticks: {
                  maxTicksLimit: 6
                }
              }],
              yAxes: [{
                ticks: {
                  min: 0,
                  max: 1600,
                  maxTicksLimit: 0
                },
                gridLines: {
                  display: true
                }
              }],
            },
            legend: {
              display: true
            }
          }
        });

    </script>
    <script src="<?php echo base_url();?>/assets/js/demo/chart-bar-demo1.js"></script>
    <script src="<?php echo base_url();?>/assets/js/demo/chart-pie-demo.js"></script>

  </body>

</html>
