<?php
echo view('admin/sidebar');
$db      = \Config\Database::connect();
$builder = $db->table('users');
$builder->orderBy("fld_id", "desc");
$builder->where(array('fld_user_type !=' => 'admin'));
$getData = $builder->get();

$builder->where(array('fld_user_type' => 'yogiccoach'));
$getCoach = $builder->get();

$builder->where(array('fld_user_type' => 'member'));
$getMember = $builder->get();

$builder->where(array('fld_user_type' => 'student'));
$getStudent = $builder->get(); 

// $query1 = $db->query('SELECT DISTINCT fld_user_id,MAX(fld_added_date) AS date FROM mys_chakra_reading GROUP BY fld_user_id ORDER BY MAX(fld_added_date) DESC LIMIT 5');
// $data = $query1->getResultArray();

// $userData = $this->db->table('chat')->where(array('status' => '0'))->get();
// if ($userData->getNumRows() > 0) {
//     $countMsg = $userData->getNumRows();
// } else {
//     $countMsg = 0;
// }

// $articles = $this->db->get_where("posts", array("fld_user_id" => $member_id, "status" => '0'));
// $acticleCount = $articles->num_rows();
?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Admin Dashboard</li>
</ul>
<div class="page-title">
    <h2>Dashboard <button type="button" class="btn btn-default mb-control" data-box="#message-box-success"><img src="<?php echo base_url() . "assets/images/"; ?>plus-30x30.png"></button></h2>
</div>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <!-- START WIDGETS -->
    <div class="row">
        <!-- <div class="col-md-3"> -->
        <!-- START WIDGET SLIDER -->
        <!-- <div class="widget widget-default widget-carousel">
                    <div class="owl-carousel" id="owl-example">
                                    
                        <div>                                    
                            <div class="widget-title">Total</div>
                            <div class="widget-subtitle">Coaches</div>
                            <div class="widget-int"><?php echo $getCoach->getNumRows(); ?></div>
                        </div>
                    </div>                            
                    <div class="widget-controls">                                
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
					</div>                             
                </div>      -->
        <!-- END WIDGET SLIDER -->
        <!-- </div> -->

        <div class="col-md-3">
            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon" onClick="location.href='admin/view_create_teacher';">
                <div class="widget-item-left">
                    <span class="fa fa-book"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count"><?php echo $acticleCount; ?></div>
                    <div class="widget-title">New Articles</div>
                    <div class="widget-subtitle">Click Coach List View Articles</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET MESSAGES -->
        </div>
        <div class="col-md-3">
            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon" onClick="location.href='admin/messages';">
                <div class="widget-item-left">
                    <span class="fa fa-envelope"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count"><?php echo $countMsg; ?></div>
                    <div class="widget-title">New messages</div>
                    <div class="widget-subtitle">In your mailbox</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET MESSAGES -->
        </div>
        <div class="col-md-3">

            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" onClick="location.href='admin/view_create_teacher';">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count"><?php echo $getData->getNumRows(); ?></div>
                    <div class="widget-title">Registred users</div>
                    <div class="widget-subtitle">On your website</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET REGISTRED -->
        </div>
        <div class="col-md-3">
            <!-- START WIDGET CLOCK -->
            <div class="widget widget-danger widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>
                <div class="widget-subtitle plugin-date">Loading...</div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET CLOCK -->
        </div>
    </div>
    <!-- END WIDGETS -->
    <div class="row">
        <!--<?php
            // $query1 = $this->db->query('SELECT DISTINCT fld_user_id,MAX(fld_added_date) AS date FROM mys_chakra_reading GROUP BY fld_user_id ORDER BY MAX(fld_added_date) DESC LIMIT 5');
            // $data = $query1->result_array();
            ?>-->
        <div class="col-md-12">
            <!-- START PROJECTS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>MESSAGES</h3>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;"></ul>
                </div>
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="40%">Name</th>
                                    <th width="30%">Date</th>
                                    <th width="30%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // foreach ($data as $record) {
                                    //     echo ' <tr>
                                    //                     <td><a href="' . base_url('admin/member_list') . '">' . $this->Common_model->get_user_name($record['fld_user_id']) . '</a></td>
                                    //                     <td>' . date('m/d/Y', $record['date']) . '</td>
                                    //                     <td>Unread Messages</td>
                                    //                 </tr>';
                                    // }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PROJECTS BLOCK -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- START PROJECTS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Coach Record</h3>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;"></ul>
                </div>
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <?php
                        //$list=$this->Common_model->get_table_records('users',array('fld_user_type'=>'yogiccoach'),'ORDER BY MAX(fld_added_date) DESC LIMIT 5');
                        //print_r($list);exit;
                        // $status = 'yogiccoach';
                        // $options = array('fld_user_type' => $status);
                        // $limit = 5;
                        // $this->db->order_by("fld_id", "desc");
                        // $query2 = $this->db->get_where('users', $options, $limit);
                        // $list = $query2->result_array();
                        //print_r($list);exit;
                        ?>
                        <table class="table table-condensed table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="30%">Name</th>
                                    <th width="10%">Program</th>
                                    <th width="20%">Email</th>
                                    <th width="10%">Start Date</th>
                                    <th width="10%">End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php error_reporting(0);
                                foreach ($list as $value) {
                                    echo ' <tr>
                                                    <td>' . $this->Common_model->get_student_name($value['fld_id']) . '</td>
                                                    <td>' . $value['fld_program'] . '</td>
                                                    <td>' . $value['fld_email'] . '</td>
													<td>' . date("m/d/Y", $value['fld_start_date']) . '</td>
													<td>' . date("m/d/Y", $value['fld_end_date']) . '</td>
                                                </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PROJECTS BLOCK -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- START PROJECTS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Member Record</h3>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;"></ul>
                </div>
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <?php
                        // $status = 'member';
                        // $options = array('fld_user_type' => $status);
                        // $query =  $this->db->get_where('users', $options);
                        // $limit = 5;
                        // $query4 =  $this->db->get_where('users', $options, $limit);
                        // $data4 = $query4->result_array();
                        ?>
                        <table class="table table-condensed table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="30%">Name</th>
                                    <th width="40%">Program</th>
                                    <th width="20%">Email</th>
                                    <th width="10%">Join Date</th>
                                    <th width="10%">End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // foreach ($data4 as $rslt) {
                                //     echo ' <tr>
                                //                     <td>' . $this->Common_model->get_student_name($rslt['fld_id']) . '</td>
                                //                     <td>' . $rslt['fld_program'] . '</td>
                                //                     <td>' . $rslt['fld_email'] . '</td>
								// 					<td>' . date("m/d/Y", $rslt['fld_start_date']) . '</td>
								// 					<td>' . date("m/d/Y", $rslt['fld_end_date']) . '</td>
                                //                 </tr>';
                                // }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END PROJECTS BLOCK -->
        </div>
    </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->

<!-- success -->
<div class="message-box message-box-success animated fadeIn popup-scroll" id="message-box-success">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">Dashboard</div>
            <div class="mb-content">

                <p> <b>How to use Maanas Yoga portal: </b>Research shows that it takes 21 days to create a lasting change. If you have tried to create a conscious change in the past,
                    you know that we start out with strong motivation and great intentions. However, our behavior patterns are governed by our sub conscious mind and secondly we don't always have control on the external stimulus.
                    This stimulus triggers the self sabotage and our mind falls prey to the habitual behavior and before we know we are back in the same rut. <br><br>
                    The gates of change open from within. You have the power to create the life you desire. Our portal is designed to make sure that you stay on top of your game for the 21 days,
                    by keeping a daily score you are able to make changes immediately and not fall prey to self sabotage. Besides, your personal coach can direct you, on a regular basis, to help you get past this threshold.
                    Each module is labeled with instructions. Self limiting beliefs can be removed from the sub conscious mind by use of rituals. Our negative energy detox is created with this principle in mind. <br><br>
                    Meet with your coach and create a strategy.<br /><br /> </p>

                <ul class="number">
                    <li>Start out with the wheel of life to get a real picture of the balance in your life. Measure where you are and where you want to be.</li>
                    <li>Submit your images for chakra reading and get the report. The chakra report is based on your subconscious thoughts so it will be more accurate. Compare it with the wheel of life and be very honest with yourself. Get a true picture of your beginning point.</li>
                    <li>Figure out your behavior patterns, both good and bad.</li>


                    <ul class="square">
                        <li>Find out what your self-limiting beliefs are</li>
                        <li>Find out what stories you repeat ( & brag about or use as a crutch)</li>
                        <li>Find out the triggers that prompt you to repeat the stories.</li>
                        <li>Make a decision to create the lasting change.<br /><br /></li>
                    </ul>
                    <li>Set your goal. Set milestones and weekly and daily routines to change the patterns.</li>
                    <li>Set out the intentions. Decide the daily must dos & don'ts</li>
                    <li>On a daily basis write the gratitude journal.</li>
                    <li>On daily basis follow the daily accountability score and your goal is to get an average score of 93 to 100 averages for 21 days. If you fail, start over again.</li>
                    <li>On a daily basis, get rid of the negative emotions and feelings you have experienced. Do not let anything build up. Make sure your mind is clear when you go to sleep and write down your dreams.</li>
                    <li>Use alarms & timers or get partners and use all the tools necessary to get you score average for the 21 days.</li>
                </ul>
            </div>
            <div class="mb-footer">
                <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end success -->

<?php
echo view('admin/footer');
?>