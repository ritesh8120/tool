 <?php
    echo view('client/sidebar');
    $son = session();
    $session = $son->getTempdata();
    $user_id = $session['user_id'];
    $offset = 0;
    $limit = 3;
    $db      = \Config\Database::connect();
    $OLDlimit = isset($_GET['limit']) ? $_GET['limit'] : 3;
    if (isset($_POST['submit'])) {
        $text_journal = $_POST['journal_text'];
        $text_journal2 = $_POST['journal_text2'];
        $text_journal3 = $_POST['journal_text3'];
        $text_journal4 = $_POST['journal_text4'];
        $text_journal5 = $_POST['journal_text5'];
        $text_journal6 = $_POST['journal_text6'];
        $text_journal7 = $_POST['journal_text7'];
        $text_journal8 = $_POST['journal_text8'];
        $text_journal9 = $_POST['journal_text9'];
        $text_journal10 = $_POST['journal_text10'];
        $text_journal11 = $_POST['journal_text11'];
        $text_journal12 = $_POST['journal_text12'];
        $text_journal13 = $_POST['journal_text13'];
        $text_journal14 = $_POST['journal_text14'];
        $text_journal15 = $_POST['journal_text15'];

        $newData = array(
            'fld_text_journal' => $text_journal,
            'fld_text_journal2' => $text_journal2,
            'fld_text_journal3' => $text_journal3,
            'fld_text_journal4' => $text_journal4,
            'fld_text_journal5' => $text_journal5,
            'fld_text_journal6' => $text_journal6,
            'fld_text_journal7' => $text_journal7,
            'fld_text_journal8' => $text_journal8,
            'fld_text_journal9' => $text_journal9,
            'fld_text_journal10' => $text_journal10,
            'fld_text_journal11' => $text_journal11,
            'fld_text_journal12' => $text_journal12,
            'fld_text_journal13' => $text_journal13,
            'fld_text_journal14' => $text_journal14,
            'fld_text_journal15' => $text_journal15,
            'fld_user_id' => $user_id,
            'fld_date_view' => date('Y-m-d'),
            'fld_added_date' => time()
        );
        $builder = $this->db->table('daily_journal');
        $builder->insert($newData);
        // $this->db->insert('daily_journal', $newData);
        if ($builder->db->affected_rows()) {

            echo "<div   class=\"alert alert-success\"><strong>Form Submitted Successfully!</strong><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a></div>";
        } else {
            echo " ErrDatabaseor..";
        }
    }
    //$journalquery = $this->db->query("SELECT * FROM mys_daily_journal ORDER BY fld_id DESC limit $offset,$OLDlimit");
    // $this->db->order_by("fld_id", "desc");
    $coach = $db->table('daily_journal')->limit($OLDlimit, $offset)->where(array('fld_user_id' => $user_id))->get();
    // $journalquery = $this->db->get_where("daily_journal", array('fld_user_id' => $user_id), $OLDlimit, $offset);

    ?>

 <!-- START BREADCRUMB -->
 <ul class="breadcrumb">
     <li><a href="<?php echo base_url() . "client"; ?>">Home</a></li>
     <li class="active">Gratitude Journal</li>
 </ul>
 <!-- END BREADCRUMB -->

 <!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
     <div class="row">
         <div class="col-md-12 page-title">
             <h2>Gratitude Journal <a href="javascript:void(0);"><span class="fa fa-info-circle mb-control" data-box="#message-box-success"></span></a></h2>
             <div class="sub_title">
                 <h6>Keep Grounded. Turn pain into Joy</h6>
             </div>

             <!-- START NEW RECORD -->
             <div class="panel panel-default">
                 <div class="panel-body">
                     <h3>Today's Highlight</h3>
                     <form class="form-horizontal" method="post" action="#" role="form">
                         <div class="form-group">
                             <div class="col-md-12">
                                 <h4><strong>How was my day? The score for my day as I start this journal is</strong></h4>
                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <label for="journal_text">(This is your INITIAL gut-feel score from +5 to -5 that represent that how your day went - at first glance)</label>
                                     <textarea name="journal_text" class="form-control" placeholder="Write something" required></textarea>
                                 </div>
                             </div>
                         </div>

                         <div class="panel panel-default">
                             <div class="panel-body">
                                 <h4><strong>My progress and success today</strong></h4>
                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <label for="success_today">3 Things you have had success or made progress with- : Lower your standards until you find 3 things!</label>
                                     <textarea class="form-control" name="journal_text2" placeholder="Fill here..." required></textarea>
                                 </div>

                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <textarea class="form-control" name="journal_text3" placeholder="Fill here..." required></textarea>
                                 </div>

                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <textarea class="form-control" name="journal_text4" placeholder="Fill here..." required></textarea>
                                 </div>
                             </div>
                         </div>

                         <div class="panel panel-default">
                             <div class="panel-body">
                                 <h4><strong>Pat yourself on the back.</strong></h4>
                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <label for="exampleInputEmail1">What did you do today that required courage</label>
                                     <textarea class="form-control" name="journal_text5" placeholder="Fill here..." required></textarea>
                                 </div>

                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <label for="exampleInputEmail1">What positive action did you take that was consistence with who you want to become?</label>
                                     <textarea class="form-control" name="journal_text6" placeholder="However small,write it here." required></textarea>
                                 </div>
                             </div>
                         </div>


                         <div class="panel panel-default">
                             <div class="panel-body">
                                 <h4><strong>What you have Learned</strong></h4>
                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <label for="exampleInputEmail1">What did you learn about yourself today, what inspired you?</label>
                                     <textarea class="form-control" name="journal_text7" placeholder="Fill here..." required></textarea>
                                 </div>
                             </div>
                         </div>

                         <div class="panel panel-default">
                             <div class="panel-body">
                                 <h4><strong>Goals or Intentions.</strong></h4>
                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <label for="exampleInputEmail1">What action, thoughts or step did you take today that moves you towards your goals.</label>
                                     <textarea class="form-control" name="journal_text8" placeholder="Fill here..." required></textarea>
                                 </div>
                             </div>
                         </div>

                         <div class="panel panel-default">
                             <div class="panel-body">
                                 <h4><strong>What, if anything, triggered me today?</strong></h4>
                                 <div class="form-group">
                                     <textarea class="form-control" name="journal_text9" placeholder="Fill here..." required></textarea>
                                     <span class="form-bar"></span>
                                 </div>
                             </div>
                         </div>

                         <div class="panel panel-default">
                             <div class="panel-body">
                                 <h4><strong>Where do i need to be kinder to myself?</strong></h4>
                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <label for="exampleInputEmail1">Where could you have been kinder to yourself-and therefore happier & more product her?</label>
                                     <textarea class="form-control" name="journal_text10" placeholder="Fill here..." required></textarea>
                                 </div>
                             </div>
                         </div>


                         <div class="panel panel-default">
                             <div class="panel-body">
                                 <h4><strong>Looking after You!</strong></h4>
                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <label for="exampleInputEmail1">What did i do today just for me?</label>
                                     <textarea class="form-control" name="journal_text11" placeholder="Fill here..." required></textarea>
                                 </div>
                             </div>
                         </div>


                         <div class="panel panel-default">
                             <div class="panel-body">
                                 <h4><strong>Gratitude & Appreciation.</strong></h4>
                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <label for="exampleInputEmail1">3 Things you are grateful (or appreciated) today. ( Lower your standards until you find 3 things.)</label>
                                     <textarea class="form-control" name="journal_text12" placeholder="Fill here..." required></textarea>
                                 </div>
                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <textarea class="form-control" name="journal_text13" placeholder="Fill here..." required></textarea>
                                 </div>
                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <textarea class="form-control" name="journal_text14" placeholder="Fill here..." required></textarea>
                                 </div>

                             </div>
                         </div>

                         <div class="panel panel-default">
                             <div class="panel-body">
                                 <h4><strong>What else do I want to make note of ?</strong></h4>
                                 <div class="form-group">
                                     <span class="form-bar"></span>
                                     <label for="exampleInputEmail1">Anything else our may want to record, things you noticed as you reflected, things you may want to do differently tomorrow etc.</label>
                                     <textarea class="form-control" rows="5" name="journal_text15" required></textarea>
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <div class="col-md-12">
                                 <div class="pull-right">
                                     <input type="submit" name="submit" value="Submit" class="btn btn-danger" />
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
             <!-- END NEW RECORD -->
         </div>
     </div>
 </div>
 <!-- END PAGE CONTENT WRAPPER -->

 <!-- BLUEIMP GALLERY -->
 <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
     <div class="slides"></div>
     <h3 class="title"></h3>
     <a class="prev">‹</a>
     <a class="next">›</a>
     <a class="close">×</a>
     <a class="play-pause"></a>
     <ol class="indicator"></ol>
 </div>
 <!-- END BLUEIMP GALLERY -->

 <!-- success -->
 <div class="message-box message-box-success animated fadeIn popup-scroll" id="message-box-success">
     <div class="mb-container">
         <div class="mb-middle">
             <div class="mb-title">Gratitude Journal
                 <div class="pull-right"> <span class="fa fa-close  mb-control-close"></span></div>
             </div>
             <div class="mb-content">

                 <p> <b>Gratitude Journal: </b>Gratitude is the quality of being thankful and taking time to notice & reflect upon the things that you're thankful for. It gives you positive emotions and makes you feel more alive. It helps you sleep better, and also helps you physically because the positive thoughts empower your immune system.
                     The benefits of practicing gratitude are endless but most of all it expedites the manifestation process. So, keep grounded and turn your pain into joy by focusing on the positive things in your life.<br /><br />
                     <b>How to use it:</b> Take time at the end of the day, ideally before bed time to write down the daily gratitude journal. Take time to reflect on the day and the achievements you have made today. Give thanks to the universe for giving you this wonderful day, think of each area of your life and write down something positive and what you need to do to make it positive.
                     Feel the emotions as you are writing it. Also show gratitude for things that are on its way to you. This will expedite the manifestation process.
                 </p>


             </div>
             <div class="mb-footer">

             </div>
         </div>
     </div>
 </div>
 <!-- end success -->

 <!-- START SCRIPTS -->
 <!-- START SCRIPTS -->
 <!-- START PLUGINS -->
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery-ui.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap.min.js"></script>
 <!-- END PLUGINS -->

 <!-- START THIS PAGE PLUGINS-->
 <script type='text/javascript' src='<?php echo base_url() . "/public/"; ?>js/plugins/icheck/icheck.min.js'></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-datepicker.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-select.js"></script>
 <!-- END THIS PAGE PLUGINS-->

 <!-- START TEMPLATE -->

 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/actions.js"></script>
 <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/demo_maps.js"></script>
 <!-- END TEMPLATE -->




 <script>
     document.getElementById('links').onclick = function(event) {
         event = event || window.event;
         var target = event.target || event.srcElement,
             link = target.src ? target.parentNode : target,
             options = {
                 index: link,
                 event: event,
                 onclosed: function() {
                     setTimeout(function() {
                         $("body").css("overflow", "");
                     }, 200);
                 }
             },
             links = this.getElementsByTagName('a');
         blueimp.Gallery(links, options);
     };
 </script>

 <!-- END SCRIPTS -->

 <?php echo view('client/footer'); ?>