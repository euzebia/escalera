 <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>/index.php/Welcome/index">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Product Category</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header panel-title  "><i class=""></i><p class="fa fa-list"> Products</p></div>

              <!-- Page Content -->
               <div class="container" style="margin-left:-120px;">
                 <div class="card card-register mx-auto mt-2">
                    <div class="card-header">Record product category</div>
                    <div class="card-body">
                      <?php echo form_open('Welcome/recordProductCategory');?>
                        <div class="form-group">
                          <div class="form-row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Select Product</label>
                                <select class="form-control" name="item">
                                    <?php 
                                      foreach ($item_names as $product) {
                                        echo '<option name="item" value="'.$product->Name.'">'.$product->Name.'</option>';
                                      }
                                    ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-md-6">
                              <div class="form-group">
            				            <label>Add category</label>
                                <input type="text"  name="category" class="form-control" required="required" autofocus="autofocus"/>
                                <br/>
            					          <input type="submit" class="btn btn-primary " name="add" value="submit" />
            				         </div>
                            </div>
                          </div>
    			             </div> 
                       <?php echo form_close();?>
                    </div>
                  </div>
              </div>
        </div>
     </div>

    </div>
  <!-- /.container-fluid -->
   
