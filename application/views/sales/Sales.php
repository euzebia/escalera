 <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url();?>/index.php/Welcome/index">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Sales</li>
          </ol>
          
           <div class="card-body">
          <div class="card mb-3">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="card-header panel-title"><p class="fa fa-list"> Record Sales</p></div>
                </div>
                <div  style="margin-left:0px;margin-right:10px;" class="container mt-2" >
                <div class="panel-body">
                  <?php echo form_open('Welcome/recordSales'); ?>
                  <div  mt-3" style="margin-left: -10px">
                    <table class="table table-striped table-bordered table-hover" style="padding:10px;" width="100%" cellspacing="0" >
                      <tr style="color:#007bff;">
                        <th><input type="checkbox" name="check"/></th>
                        <th class="text-left">Product</th>
                        <th class="text-left">Category</th>
                        <th class="text-left">Sell price</th>
                        <th class="text-left">Quantity</th>
                        <th >Action</th>
                      </tr>
                       <tr>
                        <td>
                          <input type="checkbox" name="modify" />
                        </td>
                          <td>
                            <select class="form-control" name="item" id="product">
                                <option value=0 selected="Choose product">Product</option>
                                <?php 
                                 foreach($item_names as $row){
                                   echo '<option name="item" value="'.$row->ItemId.'">'.$row->Name.'</option>';
                                }
                              ?>
                           </select>
                          </td>
                          <td>
                            <select class="form-control col-sm-12" name="category" id="category">
                               <option value=0 >Category </option>     
                            </select>
                          </td>
                          <td>
                            <input type="number" name="sellpx" class="form-control"  required="required" autofocus="autofocus">
                          </td>
                          <td>
                              <input type="number" name="qty" class="form-control"  required="required" autofocus="autofocus">
                          </td>
                          <td>
                            <input type="submit" class="btn btn-primary btn-xs""  name="addSales" value="Add">
                          </td>
                      </tr>
                      
                    </table>
                  </div>
                  <?php echo form_close(); ?>
                </div>
              </div>
              </div>
          </div>
        </div>
        <!-- /.container-fluid -->
    <script>
    $(document).ready(function(){
      $('#product').change(function(){
      var item_id = $('#product').val();
      if(item_id != '')
      {
       $.ajax({
        url:"<?php echo base_url();?>index.php/welcome/fetch_category",
        method:"POST",
        data:{item_id:item_id},
        success:function(data)
        {
         $('#category').html(data);
        }
       });
      }
      else
      {
       $('#category').html('<option value="">Select category</option>');
      }
     });
     
    });
</script>


       