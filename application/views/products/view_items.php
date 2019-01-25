<style type="text/css">
  th td{
      line-height: 1.42857143;
}
 tr td{
    margin:0px !important;
    padding:5px !important;
 }
 .rowt{
  width:40px;
 }
</style>
  <div id="content-wrapper">
    <div class="container-fluid">
          
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">All products summary</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-list fa-lg"></i>
              Product names <a style="float:right; text-decoration-style:none;" class="btn btn-primary fa fa-plus"  href='<?php echo base_url();?>index.php/Welcome/AddItem'> Add</a>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="color:#007bff;">
                      <th class="rowt">ID</th>
                      <th>Name</th>
                      <th>Settings</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        foreach($item_names as $row){
                        $total =0;
                        echo " <tr class='rowt'><td >".$row->ItemId."</td>";
                        echo "<td>".$row->Name."</td>";
                        echo "<td class='text-right'>
                        <a href='http://localhost/escalera/index.php/Welcome/update_item?ID =".$row->ItemId."' class='fa fa-edit' data-toggle='modal' data-target='#editItemNameModal'></a>";
                        echo "</tr>";?>
                        <!--
                           |  
                        <a href='http://localhost/escalera/index.php/Welcome/delete_item?del=".$row->ItemId."' class='btn btn-info' onclick='deleted()'>Delete </a></td>
                        -->
                        <script type="text/javascript">
                          function deleted(){
                           confirm("Product name has been deleted");
                           }
                        </script>

                        <!-- Edit item modal-->
                          <div class="modal fade" id="editItemNameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit product Name:</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                   <input type="text" name='pdt'   class="form-control" value="<?php $name_to_edit;?>" />
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                  <a class="btn btn-primary" href="<?php echo base_url();?>index.php/">Save</a>
                                </div>
                              </div>
                            </div>
                          </div>
                     <?php  }
                      ?>  
                  </tbody>
                </table>
              </div>
            </div>
           