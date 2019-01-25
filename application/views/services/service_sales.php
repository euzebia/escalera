 <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Record sales</li>
          </ol>

          <!-- Page Content -->
           <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Manage service sales </div>
        <div class="card-body">
          <?php echo form_open('Welcome/manage_service_sales');?>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
				            <label>Select service type</label>
                    <select class="form-control" name="type" required="required" autofocus="autofocus">
                       <option value=0>-- Select service type --</option>
                       <?php
                          foreach ($service_types as $row) {
                            echo "<option name='type'>".$row->Name."</option>";
                          }
                       ?>
                    </select>
				        </div>
                </div>
              </div>
               <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number"  name="qty" class="form-control" required="required" autofocus="autofocus">
                </div>
                </div>
              </div>
               <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="number"  name="amount" class="form-control" required="required" autofocus="autofocus">
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
   

   

       