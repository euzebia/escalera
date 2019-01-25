  <div id="content-wrapper">
   <div class="container-fluid">
        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">PRODUCTS RUNNING OUT OF STOCK</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">11 New Tasks!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View  Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">TOTAL AMOUNT IN CURRENT STOCK</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="pull-right"></span>
                  <span class="float-right">
                    <i class="fas "></i>
                    UG SHS: <?php  echo "<b style='color:white; font-size:15px;'>". number_format($total,2)."/= </b>"?>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <div class="heading">TOTAL STAFF MEMBERS</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <b class="pull-right" title data-toggle="tooltip"><?php echo $staff;?></b>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <!-- Graph representations-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Monthly sales performance as of <?php echo date('Y');?></div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30">

              </canvas>
            </div>
            <div class="card-footer small text-muted">Monthly sales rating</div>
          </div>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url();?>/assets/vendor/chart.js/Chart.min.js"></script>

    
        <!-- /.container-fluid -->
        <script type="text/JavaScript">
      // Bar chart showing Items in stock
       var Months = <?php echo $months; ?>;

        var total_amount = <?php echo $MonthlySales; ?>;
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels:Months 
            ,
            datasets: [{
              label: "Monthly sales(UG shs)",
              lineTension: 0.3,
              backgroundColor: "rgba(2,117,216,0.2)",
              borderColor: "rgba(2,117,216,1)",
              pointRadius: 5,
              pointBackgroundColor: "rgba(2,117,216,1)",
              pointBorderColor: "rgba(255,255,255,0.8)",
              pointHoverRadius: 5,
              pointHoverBackgroundColor: "rgba(2,117,216,1)",
              pointHitRadius: 50,
              pointBorderWidth: 2,
              data:total_amount,
            }],
          },
          options: {
            scales: {
              xAxes: [{
                time: {
                  unit: 'date'
                },
                gridLines: {
                  display: false
                },
                ticks: {
                  maxTicksLimit: 7
                }
              }],
              yAxes: [{
                ticks: {
                  min: 0,
                  max: 40000,
                  maxTicksLimit: 5
                },
                gridLines: {
                  color: "rgba(0, 0, 0, .125)",
                }
              }],
            },
            legend: {
              display: false
            }
          }
        });
    </script>

      