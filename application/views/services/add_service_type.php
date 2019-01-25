 <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Service types </li>
          </ol>

          <!-- Page Content -->
           <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add service type  <a  href="<?php echo base_url();?>index.php/Welcome/view_service_types" style="float:right;" class="btn btn-info">Service types list</a></div>
        <div class="card-body">
          <?php echo form_open('Welcome/manage_service_types');?>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
				            <label>Type</label>
                    <input type="text"  name="service_type" class="form-control" required="required" autofocus="autofocus">
                    <br/>
					        <input type="submit" class="btn btn-primary " name="add" value="Add"/>
				        </div>
                </div>
              </div>
			     </div>
            </div>
           </form>
        </div>
      </div>
     </div>

    </div>
    <!-- /.container-fluid -->
   

   

       