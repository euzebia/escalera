<div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">sales in batch</li>
          </ol>

          <!-- Page Content -->
          <h1 class="panel-title">Upload Sales</h1>
          <hr>
          <?php 
			if(isset($response)){
				echo "<div class='panel panel-success'>".$response."</div>";
			}
			?>
			<form method='post' action='' enctype="multipart/form-data">
				<input type='file' name='file' >
				<input type='submit' value='Upload sales' name='upload' class="btn btn-info">
			</form>

</div>
        <!-- /.container-fluid -->