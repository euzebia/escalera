    <div class="container-fluid">

          <!-- Breadcrumbs-->
      <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>/index.php/Welcome/index">Dashboard</a> </li>
           <li class="breadcrumb-item active">Items </li>
      </ol>
      <div class="card mb-3">
            <div class="card-header panel-title  "><i class=""></i><p class="fa fa-list"> Products</p></div>
          <!-- Page Content -->
           <div style="float:left;" class="container" >
                <div class="card card-register mx-auto mt-2">
                  <div class="card-header fa fa-plus">Add<a  href="<?php echo base_url();?>/index.php/Welcome/view_items" style="float:right;" class="btn btn-info fa fa-eye">View products list</a></div>
                        <div class="card-body">
                          <?php echo form_open('Welcome/recordNewItem');?>
                            <div class="form-group">
                              <div class="form-row">
                                <div class="col-md-6">
                                  <div class="form-group">
                				            <label>Name</label>
                                    <input type="text"  name="item" class="form-control" required="required" autofocus="autofocus">
                                    <br/>
                					        <input type="submit" class="btn btn-primary fa fa-save " name="add" value="Add"/>
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
   

   

       