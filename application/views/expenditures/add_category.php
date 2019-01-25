 <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>/index.php/Welcome/index">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Expenditures</li>
          </ol>

          <!-- Page Content -->
           <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register new expenditure category</div>
        <div class="card-body">
          <?php echo form_open('Welcome/add_expenditure_category');?>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
				            <label>Name</label>
                    <input type="text"  name="exp_category" class="form-control" required="required" autofocus="autofocus"/>
				          </div>
                  <div class="form-group">
                    <label>Budget Line</label>
                    <input type="text"  name="budget_line" class="form-control" required="required" autofocus="autofocus"/>
                    <br/>
                    <input type="submit" class="btn btn-primary " name="add" value="Add"/>
                  </div>
                </div>
              </div>
			      </div>
            </div>
           <?php echo form_close();?>
        </div>
      </div>
     </div>

    </div>
        <!-- /.container-fluid -->
   
   

       