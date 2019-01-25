<div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Purchases in batch</li>
          </ol>

          <!-- Page Content -->
          <h1>Upload purchases</h1>
          <hr>
          <?php 
			if(isset($response)){
				echo "<div class='panel panel-success'>".$response."</div>";
			}
			?>
			<form method='post' action='' enctype="multipart/form-data">
				<input type='file' name='file' >
				<input type='submit' value='Upload' name='upload' class="btn btn-primary">
			</form>

</div>
        <!-- /.container-fluid -->