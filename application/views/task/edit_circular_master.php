<div class="main-panel">
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10">
          <div class="card">
            <div class="header">
              <h4 class="title">Update Task Master</h4>
            </div>
            <?php foreach($result as $res) { } ?>
            <div class="content">
              <form method="post" action="<?php echo base_url(); ?>task/update_circular_master" class="form-horizontal" enctype="multipart/form-data" id="circularmaster" name="circularmaster">
                <fieldset>
                  <div class="form-group">
                    <input type="hidden" name="year_id"  value="<?php  echo $res->academic_year_id; ?>">
                    <input type="hidden" name="cid"  value="<?php  echo $res->id; ?>">
                       <label class="col-sm-2 control-label">Academic Year</label>
                              <?php
                                 $status=$years['status'];
                                  if($status=="success"){
                                 foreach($years['all_years'] as $rows){}
                                 ?>
                                <div class="col-sm-4">
                              <input type="hidden" name="years_id"  value="<?php  echo $rows->year_id; ?>">
                              <input type="text" name="year_name"  class="form-control" value="<?php echo date('Y', strtotime($rows->from_month));  echo "-"; echo date('Y', strtotime( $rows->to_month));  ?>" readonly="">
                              <?php   }?>
                            </div>
                    <label class="col-sm-2 control-label">Circular Title</label>
                    <div class="col-sm-4">
                      <input type="text" name="ctitle"  value="<?php echo $res->circular_title;?>" required class="form-control"  />
                    </div>

                  </div>
                </fieldset>
                <fieldset>
                  <div class="form-group">

                <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-4">
                      <select name="status"  class="selectpicker form-control" >
                        <option value="Active">Active</option>
                        <option value="Deactive">DeActive</option>
                      </select>
                      <script language="JavaScript">
                        document.circularmaster.status.value="<?php echo $res->status; ?>";
                      </script>
                    </div>

                    <label class="col-sm-2 control-label"> Description</label>
                    <div class="col-sm-4">
                      <textarea name="cdescription" MaxLength="500" placeholder="MaxLength 500" rows="4" cols="80" id="cdescription" class="form-control"><?php echo $res->circular_description;?> </textarea>
                    </div>
                  </div>
                </fieldset>
                <div class="form-group">
                  <label class="col-sm-2 control-label">&nbsp;</label>
                  <div class="col-sm-4">
                    <button type="submit" id="save" class="btn btn-info btn-fill center">Update</button>
                  </div>
                </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $().ready(function(){
    $('#communcicationmenu').addClass('collapse in');
    $('#communication').addClass('active');
    $('#communication1').addClass('active');

  $('#circularmaster').validate({ // initialize the plugin
  rules: {
  year_id:{required:true},
  ctype:{required:true },
  ctitle:{required:true },
  cdescription:{required:true },
  status:{required:true },

  },
  messages: {
  ctype: "Enter Type",
  year_id:"Year Id Not Found",
  ctitle: "Enter Title",
  cdescription:"Enter Description",
  status: "Select Status",
  }
  });


  });
</script>
