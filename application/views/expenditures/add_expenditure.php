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
        <div class="card-header">Manage expenses</div>
        <div class="card-body">
          <?php echo form_open('Welcome/manage_expenses');?>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
				            <label>Type</label>
                    <select name='type' class="form-control">
                        <option>--- Select expenditure type ---</option>
                        <?php
                          foreach($types as $row){
                             echo "<option value='$row->Id'>".$row->Name."</option>";
                          }
                        ?>
                    </select>
				           </div>
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="number"  name="amount" class="form-control" required="required" autofocus="autofocus"/>
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
   
   
   

       