 <?php
    echo view('client/sidebar');
    $son = session();
    $session = $son->getTempdata();
    $user_id = $session['user_id'];
    $db      = \Config\Database::connect();
    ?>

 <!-- START BREADCRUMB -->
 <ul class="breadcrumb">
     <li><a href="<?php echo base_url() . "client"; ?>">Home</a></li>
     <li class="active">Reports </li>
 </ul>
 <!-- END BREADCRUMB -->

 <!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">

     <!-- PAGE TITLE -->
     <div class="page-title">
         <h2>Reports&nbsp; <a href="javascript:void(0);"><span class="fa fa-info-circle mb-control" data-box="#message-box-success"></span></a></h2>

     </div>
     <!-- END PAGE TITLE -->
     <!-- PAGE CONTENT WRAPPER -->
     <div class="page-content-wrap">

         <!-- START WIDGETS -->

         <?php
            $getDatas = $db->table('users')->where(array('fld_id' => $user_id))->get();
            foreach ($getDatas->getResult() as $rows) {
            }
            ?>
         <div class="row">

             <?php if ($rows->fld_Energy_Detox_verified == 1) { ?>
                 <div class="col-md-4">
                     <div class="panel panel-default">
                         <div class="panel-body panel-body-image">
                             <a href="<?php echo base_url() . "/client/daha_tantra_view/"; ?>"><img src="<?php echo base_url() . "/public/"; ?>images/dahatantra.png" alt="Negative Energy Detox" /></a>
                         </div>
                     </div>
                 </div><?php } else { ?>
                 <div class="col-md-4">
                     <div class="panel panel-default">
                         <div class="panel-body panel-body-image">
                             <a href="<?php echo base_url() . "/client/no_Negative"; ?>"><img src="<?php echo base_url() . "/public/"; ?>images/dahatantra.png" alt="Negative Energy Detox" /></a>
                         </div>
                     </div>
                 </div><?php } ?>

             <?php if ($rows->fld_Intention_verified == 1) { ?>
                 <div class="col-md-4">
                     <div class="panel panel-default">
                         <div class="panel-body panel-body-image">
                             <a href="<?php echo base_url() . "/client/intention_setting_report/"; ?>"><img src="<?php echo base_url() . "/public/"; ?>images/intention.jpg" alt="Intention Journal" /></a>
                         </div>
                     </div>
                 </div><?php } else { ?>
                 <div class="col-md-4">
                     <div class="panel panel-default">
                         <div class="panel-body panel-body-image">
                             <a href="<?php echo base_url() . "/client/no_intention"; ?>"><img src="<?php echo base_url() . "/public/"; ?>images/intention.jpg" alt="Intention Journal" /></a>
                         </div>
                     </div>
                 </div><?php } ?>

             <?php if ($rows->fld_Gratitude_verified == 1) { ?>
                 <div class="col-md-4">
                     <div class="panel panel-default">
                         <div class="panel-body panel-body-image">
                             <a href="<?php echo base_url() . "/client/gratitude_journal_report/"; ?>"><img src="<?php echo base_url() . "/public/"; ?>images/gratitude1.jpg" alt="Gratitude Journal" /></a>
                         </div>
                     </div>
                 </div><?php } else { ?>
                 <div class="col-md-4">
                     <div class="panel panel-default">
                         <div class="panel-body panel-body-image">
                             <a href="<?php echo base_url() . "/client/no_Gratitude"; ?>"><img src="<?php echo base_url() . "/public/"; ?>images/gratitude1.jpg" alt="Gratitude Journal" /></a>
                         </div>
                     </div>
                 </div><?php } ?>

             <?php if ($rows->fld_Daily_Score_verified == 1) { ?>
                 <div class="col-md-4">
                     <div class="panel panel-default">
                         <div class="panel-body panel-body-image">
                             <a href="<?php echo base_url() . "/client/das_view/"; ?>"><img src="<?php echo base_url() . "/public/"; ?>images/dailyaccount.jpg" alt="Daily Accountability Score" /></a>
                         </div>
                     </div>
                 </div><?php } else { ?>
                 <div class="col-md-4">
                     <div class="panel panel-default">
                         <div class="panel-body panel-body-image">
                             <a href="<?php echo base_url() . "/client/no_Daily"; ?>"><img src="<?php echo base_url() . "/public/"; ?>images/dailyaccount.jpg" alt="Daily Accountability Score" /></a>
                         </div>
                     </div>
                 </div><?php } ?>

             <?php if ($rows->fld_Wheel_verified == 1) { ?>
                 <div class="col-md-4">
                     <div class="panel panel-default">
                         <div class="panel-body panel-body-image">
                             <a href="<?php echo base_url() . "/client/wheellife_report/"; ?>"><img src="<?php echo base_url() . "/public/"; ?>images/wheel_life.jpg" alt="wheel Of life" /></a>
                         </div>
                     </div>
                 </div><?php } else { ?>
                 <div class="col-md-4">
                     <div class="panel panel-default">
                         <div class="panel-body panel-body-image">
                             <a href="<?php echo base_url() . "/client/no_wheel"; ?>"><img src="<?php echo base_url() . "/public/"; ?>images/wheel_life.jpg" alt="wheel Of life" /></a>
                         </div>
                     </div>
                 </div><?php } ?>
             <div class="col-md-4">
                 <div class="panel panel-default">
                     <div class="panel-body panel-body-image">
                         <a href="<?php echo base_url() . "/client/client_journey"; ?>"><img src="<?php echo base_url() . "/public/"; ?>images/journey.png" alt="Client Journey" title="Client Journey" /></a>
                     </div>
                 </div>
             </div>
         </div>


         <!-- END WIDGETS -->


     </div>
     <!-- END PAGE CONTENT WRAPPER -->

     <!-- success -->
     <div class="message-box message-box-success animated fadeIn popup-scroll" id="message-box-success">
         <div class="mb-container">
             <div class="mb-middle">
                 <div class="mb-title">Daily Accountability Score
                     <div class="pull-right"> <span class="fa fa-close  mb-control-close"></span></div>
                 </div>
                 <div class="mb-content">
                     <p>The daily measure has a score setting of 70 point ( this can be different) – the day is divided into segments and each segment (inspired by Vedic -chaughadiyas + the 5 times of Namaz & daily confession of church ) <br><br>
                         There are 6 segments –scoring is from 1-10 (10 being high) The last one is based on becoming present 5 times per day ( set alarms in the phone- and when the alarm goes off- at that moment or in a short time- take a moment to do 1 minute meditation—become focused and centered) This has to be done five times in the waking hours
                         At the end of the day you give yourself a score—a value from 1-10 <br><br>
                         The total score is out of 70 – The total-final score is taken into account.<br><br>
                         On a daily basis—date based- it will be added ( we can set different matrix—or graphs to see the result—based on the 7 matrix—wakeup / work etc the total can be viewed from a particular date to another date. A monthly score or a graph will be nice. ( can be added in phase II)
                         The admin or the coach can monitor this graph and know where the problem lies—whether it is the work area or daily routine of waking up or diet
                     </p>
                 </div>
                 <div class="mb-footer">
                     <!--<button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>-->
                 </div>
             </div>
         </div>
     </div>
     <!-- end success -->
     <!-- START SCRIPTS -->
     <!-- START PLUGINS -->
     <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery-ui.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap.min.js"></script>
     <!-- END PLUGINS -->

     <!-- START THIS PAGE PLUGINS-->
     <script type='text/javascript' src='<?php echo base_url() . "/public/"; ?>js/plugins/icheck/icheck.min.js'></script>
     <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

     <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-datepicker.js"></script>
     <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-file-input.js"></script>
     <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-select.js"></script>
     <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
     <!-- END THIS PAGE PLUGINS-->

     <!-- START TEMPLATE -->

     <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins.js"></script>
     <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/actions.js"></script>

     <!-- END TEMPLATE -->
     <!-- END SCRIPTS -->


     <?php
        echo view('client/footer');
        ?>