<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-10">
               <div class="card">
                  <div class="header">
                     <h4 class="title">Add Trade</h4>
                     <p class="pull-right btn btn-wd" style="margin-top:-30px;"><a href="<?php echo base_url(); ?>batch/add_batch">Add / View Batch</a></p>
                  </div>
                  <div class="content">
                     <form action="<?php echo base_url(); ?>trade/create_trade" method="post" enctype="multipart/form-data" id="tradeform">

                         <div class="row">
                           <div class="col-md-5">
                              <div class="form-group">
                                 <label class="col-sm-4 control-label">Center Name</label>
                               <select name="center_id"  class="selectpicker form-control">
                                 <?php foreach ($cenert as $res) { ?>
                                    <option value="<?php echo $res->id; ?>"><?php echo $res->center_name; ?></option>
                                   <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="form-group">
                                 <label class="col-sm-4 control-label">Trade Name</label>
                                 <input type="text" class="form-control"  placeholder="Enter Trade Name" id="tradename" name="tradename">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-5">
                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Status</label>
                                 <select name="status"  class="selectpicker form-control">
                                    <option value="Active">Active</option>
                                    <option value="Deactive">DeActive</option>
                                 </select>
                              </div>
                             </div>

                              <div class="col-md-5">
                              <div class="form-group" style="margin-top: 22px;">
                                 <label class="col-sm-4 control-label"></label>
                                   <button type="submit" class="btn btn-info btn-fill pull-left">Add</button>
                      
                              </div>
                           </div>
                           
                          
                        </div>
                       
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php if($this->session->flashdata('msg')): ?>
      <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
         ×</button> <?php echo $this->session->flashdata('msg'); ?>
      </div>
      <?php endif; ?>
      <div class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="content">
                        <div class="fresh-datatables">
                           <table id="bootstrap-table" class="table">
                              <thead>
                                 <th>ID</th>
                                 <th>Trade</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </thead>
                              <tbody>
                                 <?php
                                    $i=1;
                                    foreach($result as $rows){
                                      $sta=$rows->status;
                                    ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rows->trade_name; ?></td>
                                    <td>
                                       <?php 
                                          if($sta=='Active'){?>
                                       <button class="btn btn-success btn-fill btn-wd">Active</button>
                                       <?php  }else{?>
                                       <button class="btn btn-danger btn-fill btn-wd">De Active</button>
                                       <?php } ?>
                                    </td>
                                    <td>
                                       <a href="<?php echo base_url();  ?>trade/edit_trade/<?php echo $rows->id; ?>" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                    </td>
                                 </tr>
                                 <?php $i++;  }  ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!-- end content-->
                  </div>
                  <!--  end card  -->
               </div>
               <!-- end col-md-12 -->
            </div>
            <!-- end row -->
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
     $('#mastersmenu').addClass('collapse in');
     $('#master').addClass('active');
     $('#masters3').addClass('active');

    $('#tradeform').validate({ // initialize the plugin
        rules: {
          tradename:{required:true},
        },
        messages: {
         tradename: "Please Enter Trade Name"
          }
    });
   });
  
    var $table = $('#bootstrap-table');
          $().ready(function(){
              $table.bootstrapTable({
                  toolbar: ".toolbar",
                  clickToSelect: true,
                  showRefresh: true,
                  search: true,
                  showToggle: true,
                  showColumns: true,
                  pagination: true,
                  searchAlign: 'left',
                  pageSize: 10,
                  clickToSelect: false,
                  pageList: [10,25,50,100,150],
   
                  formatShowingRows: function(pageFrom, pageTo, totalRows){
                      //do nothing here, we don't want to show the text "showing x of y from..."
                  },
                  formatRecordsPerPage: function(pageNumber){
                      return pageNumber + " rows visible";
                  },
                  icons: {
                      refresh: 'fa fa-refresh',
                      toggle: 'fa fa-th-list',
                      columns: 'fa fa-columns',
                      detailOpen: 'fa fa-plus-circle',
                      detailClose: 'fa fa-minus-circle'
                  }
              });
   
              //activate the tooltips after the data table is initialized
              $('[rel="tooltip"]').tooltip();
   
              $(window).resize(function () {
                  $table.bootstrapTable('resetView');
              });
   
   
          });
</script>

