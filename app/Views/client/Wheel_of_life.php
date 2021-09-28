 <?php echo view('client/sidebar');
    $son = session();
    $session = $son->getTempdata();
    $user_id = $session['user_id'];
    ?>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/jquery-1.6.2.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery-ui.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap.min.js"></script>
 <!-- END PLUGINS -->
 <!-- START THIS PAGE PLUGINS-->
 <script type='text/javascript' src="<?php echo base_url() . "/public/"; ?>js/plugins/icheck/icheck.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-datepicker.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-file-input.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-select.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/tagsinput/jquery.tagsinput.min.js"></script>

 <!-- END THIS PAGE PLUGINS-->

 <!-- START TEMPLATE -->

 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/actions.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/fire-0.62.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/filter/demo_sliders.js?1"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/filter/ion.rangeSlider.min.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "/public/"; ?>css/filter/ion.rangeSlider.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "/public/"; ?>css/filter/ion.rangeSlider.skinFlat.css" />


 <script>
     $(document).ready(function() {
         $("#dvMsg").hide();
     });
 </script>
 <!-- END X-NAVIGATION VERTICAL -->

 <!-- START BREADCRUMB -->
 <ul class="breadcrumb">
     <li><a href="<?php echo base_url() . "member/"; ?>">Home</a></li>
     <li class="active"><a href="#">Wheel Of Life</a></li>
 </ul>
 <!-- END BREADCRUMB -->

 <!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
     <!-- PAGE TITLE -->
     <div class="page-title">
         <h2>Wheel Of Life <a href="javascript:void(0);"><span class="fa fa-info-circle mb-control" data-box="#message-box-success"></span></a></h2>
         <div class="sub_title">
             <h6>Is your life BALANCED?</h6>
         </div>
     </div>
     <!-- END PAGE TITLE -->

     <!-- PAGE CONTENT WRAPPER -->
     <div class="page-content-wrap">
         <form role="form" class="form-horizontal" method="post" action="#"> </form>
         <div class="row">
             <div class="col-md-12">

                 <!-- START BASIC ELEMENTS -->
                 <div class="panel panel-default">
                     <div class="panel-body">
                         <input type="hidden" value="<?php echo base_url(); ?>" id="homeurl">
                         <!--------------  Chakra Reading New Section  START ---------------------->
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="lifewheel_widthd">
                                     <h1>Wheel of life</h1>
                                     <p>Is your life balanced?<br />move the slider to the desired score between 0 - 10
                                         ( 10 being high )</p>
                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-md-4">
                                 <div class="form-group">

                                     <div class="col-md-8 col-xs-12">
                                         <div class="input-group">
                                             <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                             <input type="text" class="form-control " value="<?php echo date("m/d/Y"); ?>" required id="get_date" disabled style="color: #000;">
                                             <!--<input type="text" class="form-control" readonly="readonly" value="<?php echo date("Y/m/d"); ?>" id="get_date" required>-->
                                         </div>
                                     </div>

                                 </div>
                             </div>
                             <div class="col-md-8">
                                 <div class="form-group">
                                 </div>
                             </div>
                         </div>
                         <div class="clearfix"><br></div>
                         <div class="row">
                             <div id="container1">
                                 <div class="col-lg-3 col-md-3 col-sm-3">
                                     <div class="form-group1">
                                         <div class="col-md-12">
                                             <div class="demo-big__note10">Growth</div>
                                             <form role="form" class="form-horizontal">
                                                 <div class="form-group">
                                                     <input type="text" id="ise_default9" name="ise_default9" value="" />
                                                 </div>
                                             </form>
                                         </div>
                                         <div class="col-md-12">
                                             <div class="demo-big__note9">Spiritual</div>
                                             <form role="form" class="form-horizontal">
                                                 <div class="form-group">
                                                     <input type="text" id="ise_default8" name="ise_default8" value="" />
                                                 </div>
                                             </form>
                                         </div>
                                         <div class="col-md-12">
                                             <div class="demo-big__note8">Romantic Relationship</div>
                                             <form role="form" class="form-horizontal">
                                                 <div class="form-group">
                                                     <input type="text" id="ise_default7" name="ise_default7" value="" />
                                                 </div>
                                             </form>
                                         </div>
                                         <div class="col-md-12">
                                             <div class="demo-big__note7">Family</div>
                                             <form role="form" class="form-horizontal">
                                                 <div class="form-group">
                                                     <input type="text" id="ise_default6" name="ise_default6" value="" />
                                                 </div>
                                             </form>
                                         </div>
                                         <div class="col-md-12">
                                             <div class="demo-big__note6">Social</div>
                                             <form role="form" class="form-horizontal">
                                                 <div class="form-group">
                                                     <input type="text" id="ise_default5" name="ise_default5" value="" />
                                                 </div>
                                             </form>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="col-lg-6  col-md-6 col-sm-6 text-center">
                                     <div class="form-group1">
                                         <img src="<?php echo base_url(); ?>/public/img/lifewheelImg.png" class="img-responsive" style=" margin: 0 auto;" alt="Life of Wheel" />
                                     </div>
                                 </div>
                                 <div class="col-lg-3  col-md-3 col-sm-3">
                                     <div class="form-group">
                                         <div class="col-md-12">
                                             <div class="demo-big__note">Physical</div>
                                             <form role="form" class="form-horizontal">
                                                 <div class="form-group">
                                                     <input type="text" id="ise_default" name="ise_default" value="" />
                                                 </div>

                                             </form>
                                         </div>
                                         <div class="col-md-12">
                                             <div class="demo-big__note2">Emotional</div>
                                             <form role="form" class="form-horizontal">
                                                 <div class="form-group">
                                                     <input type="text" id="ise_default1" name="ise_default1" value="" />
                                                 </div>
                                             </form>
                                         </div>
                                         <div class="col-md-12">
                                             <div class="demo-big__note3">Mental</div>
                                             <form role="form" class="form-horizontal">
                                                 <div class="form-group">
                                                     <input type="text" id="ise_default2" name="ise_default2" value="" />
                                                 </div>
                                             </form>
                                         </div>
                                         <div class="col-md-12">
                                             <div class="demo-big__note4">Self worth</div>
                                             <form role="form" class="form-horizontal">
                                                 <div class="form-group">
                                                     <input type="text" id="ise_default3" name="ise_default3" value="" />
                                                 </div>
                                             </form>
                                         </div>
                                         <div class="col-md-12">
                                             <div class="demo-big__note5">Financial</div>
                                             <form role="form" class="form-horizontal">
                                                 <div class="form-group">
                                                     <input type="text" id="ise_default4" name="ise_default4" value="" />
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                         </div>
                         <div class="clearfix"><br><br></div>
                     </div>
                     <div class="panel-footer">
                         <div class="col-md-12 text-center alert alert-success" role="alert" id="dvMsg">
                             <span class="glyphicon glyphicon-ok"></span>&nbsp; Your Report has been successfully sent
                             to your coach.<br>
                         </div>
                         <button type="button" class="btn btn-primary pull-right genpdf" data-id="<?php echo $userid ?>">Submit</button>
                     </div>

                     <!--------------  Chakra Reading New Section  END  ---------------------->
                 </div>
             </div>
         </div>
         <!-- END BASIC ELEMENTS -->
     </div>

 </div>
 <!-- END PAGE CONTENT WRAPPER -->
 </div>
 </div>



 <!-- success -->
 <div class="message-box message-box-success animated fadeIn popup-scroll" id="message-box-success">
     <div class="mb-container">
         <div class="mb-middle">
             <div class="mb-title">Wheel of Life
                 <div class="pull-right"> <span class="fa fa-close  mb-control-close"></span></div>
             </div>
             <div class="mb-content">

                 <p> <b>Wheel of Life: </b>You don't need to reinvent the wheel. This tool measures the balance of ten
                     different centers of your life and produces an accurate report. The center of the wheel represents
                     "O" zero and the outer edge of the circle represents "10"ten.
                     Rank your level of satisfaction in each area of the life. Slide the tab to the desired scale in
                     each section and then hit the submit button. Don't be disappointed if it's a bumpy ride, you are
                     here to create a lasting change and knowledge is power. <br /><br />
                     <b>How to use it:</b> At the beginning of a 21 day period I start out by getting a complete report
                     regarding the state of my life. Then at the end of 21 day I will get another report to see how much
                     progress I have made and make sure I am not getting stuck in one or two aspect of my life.
                     Move the slider to the desired score; in each area of life. After each area is covered, press the
                     submit button. Your coach will receive the report and will contact you or email the report to
                     you.<br /><br />
                 </p>



             </div>
             <div class="mb-footer">
                 <!-- <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button> -->
             </div>
         </div>
     </div>
 </div>
 <script>
     $(function() {
         //Spinner
         $(".spinner_default").spinner()
         $(".spinner_decimal").spinner({
             step: 0.01,
             numberFormat: "n"
         });
         //End spinner

         //Datepicker
         $('#dp-2').datepicker();
         $('#dp-3').datepicker({
             startView: 2
         });
         $('#dp-4').datepicker({
             startView: 1
         });
         //End Datepicker
     });
 </script>
 <?php echo view('client/footer'); ?>