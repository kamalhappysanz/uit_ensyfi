<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title><?php  echo $this->session->userdata('name'); ?></title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="viewport" content="width=device-width" />
      <!-- Bootstrap core CSS     -->
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
      <!--  Light Bootstrap Dashboard core CSS    -->
      <link href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
      <!--  CSS for Demo Purpose, don't include it in your project     -->
      <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />
      <!--     Fonts and icons     -->
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stroke/css/pe-icon-7-stroke.css">
      <!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
      <script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>


	  <!-- PDF / Excel  -->

	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/buttons.dataTables.min.css">

	  <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/pdfmake.min.js" type="text/javascript"></script>
	  <script src="<?php echo base_url(); ?>assets/js/vfs_fonts.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/jszip.min.js" type="text/javascript"></script>
	  <script src="<?php echo base_url(); ?>assets/js/buttons.colVis.min.js" type="text/javascript"></script>

	  <script src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/buttons.flash.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/buttons.html5.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/buttons.print.min.js" type="text/javascript"></script>



      <script src="<?php echo base_url(); ?>assets/js/jspdf.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/jspdf.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/FileSaver.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/jspdf.plugin.table.js" type="text/javascript"></script>

      <script src="<?php echo base_url(); ?>assets/js/jquery.table2excel.js" type="text/javascript"></script>

      <!--  Forms Validations Plugin -->
      <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
      <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

      <style>
         .navbar{
         margin-bottom:0px;}
         .caret{
         position: relative;
         top: -20px;
         float: right;
         }
         .alert button.close {
         position: relative;top:10px;
         }
         .error{
         color: red;
         font-weight: 500;
         }
         .sidebar .sidebar-wrapper > .nav {
         margin-top: 0px;
         }
         .abox{border: 1px solid grey;  }
         .title_ensyfi{
         color:white!important;padding-left: 185px !important;
         }
         .stu{background: url(<?php echo base_url(); ?>assets/img/icons/Stu.png) 0 0;}
         .topbar{height:97px;background-color: #642160;}
         .imgclass{margin:0px;float:left;}
         .imgstyle{width:40px;height:40px;}
         body{position: absolute;
         height: 100%;
         width: 100%;background-color: whitesmoke;}
         .menuimg{
         float: left;
         margin-right: 10px;
         }
      </style>
   </head>
   <body>
      <div class="wrapper">
      <nav class="navbar navbar-default topbar">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand title_ensyfi" href="#" style="margin-top: 20px;
                  font-size:28px;" ><?php  echo $this->session->userdata('name'); ?> </a>
            </div>
            <div class="collapse navbar-collapse" style="float:right;margin-top:17px;">
               <ul class="nav navbar-nav navbar-right">

                  <li class="dropdown dropdown-with-icons">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin:3px;">
                        <div class="photo">
                           <?php
                              $user_id=$this->session->userdata('user_id');
                              $user_type=$this->session->userdata('user_type');
                              $query="SELECT user_pic FROM edu_users WHERE user_id='$user_id' AND user_type='$user_type'";
                              $objRs=$this->db->query($query);
                              $row=$objRs->result();
                              foreach ($row as $rows1)
                              {
                               $pic=$rows1->user_pic;
                               if($pic!='')
                               {?>
                           <img src="<?php echo base_url(); ?>assets/admin/profile/<?php echo $pic; ?>" class="img-circle img-responsive imgstyle"/>
                           <?php }else{
                              ?> <img src="<?php echo base_url(); ?>assets/noimg.png" class="img-circle img-responsive imgstyle" />
                           <?php }} ?>
                        </div>
                        <b class="caret" style="margin-left:55px;color:white;top:-20px;"></b>
                     </a>
                     <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                           <a href="<?php echo base_url(); ?>adminlogin/profilepic">
                           <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/profile.png"/> Profile
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo base_url(); ?>adminlogin/profile">
                           <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/setting.png"/> Setting
                           </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                           <a href="<?php echo base_url(); ?>adminlogin/logout" class="text-danger">
                           <i class="pe-7s-close-circle"></i>
                           Log out
                           </a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="sidebar sidemenu">
         <div class="sidebar-wrapper" style="background-color:#323546;">
            <div class="user" style="margin-top:10px;">
               <div class="imgclass photo" style="margin-left:20px;">
                  <?php
                     $user_id=$this->session->userdata('user_id');
                     $user_type=$this->session->userdata('user_type');
                     $query="SELECT user_pic FROM edu_users WHERE user_id='$user_id' AND user_type='$user_type'";
                     $objRs=$this->db->query($query);
                     $row=$objRs->result();
                     foreach ($row as $rows1)
                     {
                      $pic=$rows1->user_pic;
                      if($pic!='')
                      {?>
                  <img class="img-responsive" style="height:75px;" src="<?php echo base_url(); ?>assets/admin/profile/<?php echo $pic; ?>" >
                  <?php }else{
                     ?> <img class="img-responsive" src="<?php echo base_url(); ?>assets/noimg.png"  />
                  <?php }} ?>
               </div>
               <div class="info" class="logo-text">
                  <a  href="" style="padding-top:25px;">
                  <?php  $user_type=$this->session->userdata('user_type');
                     if($user_type==1)
                     {echo "<p> Welcome Admin </p>";}else { echo "Welcome";}?>
                  </a>
               </div>
            </div>
            <ul class="nav" >
               <li id="dash">
                  <a href="<?php echo base_url(); ?>adminlogin/dashboard">
                     <i class="pe-7s-home"></i>
                     <p>Dashboard</p>
                  </a>
               </li>
               <li id="master">
                  <a data-toggle="collapse" href="#mastersmenu" id="masters">
                     <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/masters.png"/>
                     <p>Masters</p>
                     <b class="caret"></b>
                  </a>
                  <div class="collapse" id="mastersmenu">
                     <ul class="nav">
                   <li id="masters1"><a href="<?php echo base_url();  ?>years/home">Academic Years</a></li>
                    <li id="masters2"><a href="<?php echo base_url();  ?>time/home">Timing</a></li>
                   <li id="masters3"><a href="<?php echo base_url(); ?>trade/addtrade">Trade & Batch</a></li>
                   <li id="masters5"><a href="<?php echo base_url(); ?>classmanage/home">Trade & Batch Management </a></li>

                  <li id="masters6"><a href="<?php echo base_url();  ?>scheme/home">Scheme</a></li>
                  <li id="masters7"><a href="<?php echo base_url();  ?>center/home">Center</a></li>
                     </ul>
                  </div>
               </li>
               <li id="admission">
                  <a data-toggle="collapse" href="#admissionmenu">
                     <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/admission.png"/>
                     <!-- <i class="pe-7s-add-user"></i> -->
                     <p>Student's Admission	</p>
                     <b class="caret"></b>
                  </a>
                  <div class="collapse" id="admissionmenu">
                     <ul class="nav">
                        <li id="admission1"><a href="<?php echo base_url(); ?>admission/home">Student Detail</a></li>
                        <li id="admission2"><a href="<?php echo base_url(); ?>admission/view">Student Search</a></li>
                     </ul>
                  </div>
               </li>

               <li id="enroll">
                  <a data-toggle="collapse" href="#enrollmentmenu">
                     <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/register.png"/>
                     <p>Registration	</p>
                     <b class="caret"></b>
                  </a>
                  <div class="collapse" id="enrollmentmenu">
                     <ul class="nav">
                        <li id="enroll1"><a href="<?php echo base_url(); ?>enrollment/home">Student Registration</a></li>
                        <li id="enroll2"><a href="<?php echo base_url(); ?>enrollment/view">List of Registration</a></li>
                     </ul>
                  </div>
               </li>
               <li id="tradematerial">
                  <a data-toggle="collapse" href="#tradematerialmenu">
                     <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/material.png"/>
                     <p>Trade Material	</p>
                     <b class="caret"></b>
                  </a>
                  <div class="collapse" id="tradematerialmenu">
                     <ul class="nav">
                        <li id="trade1"><a href="<?php echo base_url(); ?>tradematerial/home">Create</a></li>
                        <li id="trade2"><a href="<?php echo base_url(); ?>tradematerial/view">View</a></li>
                     </ul>
                  </div>
               </li>
               <?php  $user_type=$this->session->userdata('user_type');

               if($user_type==1){ ?>
               <li id="teacher">
                  <a data-toggle="collapse" href="#teachermenu">
                     <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/teachers.png"/>
                     <p>Staff	</p>
                     <b class="caret"></b>
                  </a>
                  <div class="collapse" id="teachermenu">
                     <ul class="nav">
                        <li id="teacher1"><a href="<?php echo base_url(); ?>staff/home">Create staff</a></li>
                        <li id="teacher2"><a href="<?php echo base_url(); ?>staff/view">View Staff list</a></li>
                     </ul>
                  </div>
               </li>
             <?php }else{

             } ?>


               <li id="event">
                  <a data-toggle="collapse" href="#eventmenu">
                     <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/calender.png"/>
                     <p>Calendar</p>
                     <b class="caret"></b>
                  </a>
                  <div class="collapse" id="eventmenu">
                     <ul class="nav">
                        <li id="event2"><a href="<?php echo base_url(); ?>event/create">Add / View Event</a></li>
                        <li id="event1"><a href="<?php echo base_url(); ?>event/home">Event Calendar</a></li>
                     </ul>
                  </div>
               </li>


              <li id="communication">
                  <a data-toggle="collapse" href="#communcicationmenu">
                     <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/circular.png"/>
                     <p>Task</p>
                     <b class="caret"></b>
                  </a>
                  <div class="collapse" id="communcicationmenu">
                     <ul class="nav">
                        <li id="communication1"><a href="<?php echo base_url(); ?>task/add_circular">Add Task </a></li>
                        <li id="communication2"><a href="<?php echo base_url(); ?>task/view_circular">View Task </a></li>
                        <li id="communication3"><a href="<?php echo base_url(); ?>task/view_mobilizer_task">View Mobile User Task </a></li>
                     </ul>
                  </div>
               </li>
               <li id="grouping">
                  <a data-toggle="collapse" href="#groupingmenu">
                     <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/grp.png"/>
                     <p>Tracking</p>
                     <b class="caret"></b>
                  </a>
                  <div class="collapse" id="groupingmenu">
                     <ul class="nav">
                        <li id="group1"><a href="<?php echo base_url(); ?>tracking/home">Track</a></li>
                        <!-- <li id="group2"><a href="<?php echo base_url(); ?>grouping/send">Send Message </a></li> -->
                     </ul>
                  </div>
               </li>

               <?php  $user_type=$this->session->userdata('user_type');

               if($user_type==1){ ?>
                 <li id="user">
                    <a data-toggle="collapse" href="#usermanagement">
                       <i class="pe-7s-settings"></i>
                       <p>Control Panel</p>
                       <b class="caret"></b>
                    </a>
                    <div class="collapse" id="usermanagement">
                       <ul class="nav">
                          <li id="user1"><a href="<?php echo base_url(); ?>userrolemanage/teachers">Trainer</a></li>
                          <li id="user2"><a href="<?php echo base_url(); ?>userrolemanage/mobilizer">Mobilizer</a></li>
                          <li id="user3"><a href="<?php echo base_url(); ?>userrolemanage/students">Students</a></li>
                       </ul>
                    </div>
                 </li>
            <?php   }else{

               } ?>


            </ul>
         </div>
      </div>
