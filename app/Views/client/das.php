<?php
echo view('client/sidebar');
    $son = session();
    $session = $son->getTempdata();
    $db      = \Config\Database::connect();
$builder = $db->table('users');
$user_id = $session['user_id'];
$array_week_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
$C_date = date("Y-m-d");

$member = $builder->where(array('fld_id' => $user_id))->get();
if ($member->getNumRows() > 0) {
    $row = $member->getRowArray();
    $memberName = $row["fld_first_name"] . " " . $row["fld_last_name"];
    $memberemail = $row["fld_email"];
    $membersparent_id = $row["fld_parent"];
    $timezone = $row['fld_timezone'];
}

$coach = $builder->where(array('fld_id' => $membersparent_id))->get();
if ($coach->getNumRows() > 0) {
    $row = $coach->getRowArray();
    $coachName = $row["fld_first_name"] . " " . $row["fld_last_name"];
    $coachemail = $row["fld_email"];
}
// echo $timezone;
date_default_timezone_set($timezone);

// echo date('d-m-Y h:m:s');
// $isMorningTime = get_userTime("now", "A") == "AM" ?: 0;
// $isEveningTime = get_userTime("now", "A") == "PM" ?: 0;

// $week = getWeekForDate($C_date);
// $weekStartDate = $week["start"];
// $weekEndDate = $week["end"];

// $d = strtotime("-1 day");
// $C_date1 = date("Y-m-d", $d);
// $WeekDay1 = date_diff(date_create($C_date1), date_create($weekStartDate));
// $WeekDay = date_diff(date_create($C_date), date_create($weekStartDate));
/*
  	* DateInterval Object (
  * 	[y] => 0
  * 	[m] => 0
  * 	[d] => 0
  * 	[h] => 0
  * 	[i] => 0
  * 	[s] => 0
  * 	[weekday] => 0
  * 	[weekday_behavior] => 0
  * 	[first_last_day_of] => 0
  * 	[invert] => 0 [days] => 0
  * 	[special_type] => 0
  * 	[special_amount] => 0
  * 	[have_weekday_relative] => 0
  * 	[have_special_relative] => 0
  * )
 */
// $WeekDay = $WeekDay->d;
// $WeekDay1 = $WeekDay1->d;
############morning
// $accomplish = $_POST['accomplish'];
// $feel = $_POST['feel'];
// $intend = $_POST['intend'];
// $universe = $_POST['universe'];
##########evening
// $special = $_POST['special'];
// $thing = $_POST['thing'];
// $imporve = $_POST['imporve'];
// $message = $_POST['message'];
// $about = $_POST['about'];
###########################MORNING
// $this->db->select('fld_morning_time');
// $this->db->order_by('fld_id', 'desc');
        $userMorningData = $db->table('daily_score_morning')->where(array('fld_user_id' => $user_id))->get();
// $userMorningData = $this->db->get_where('daily_score_morning', array('fld_user_id' => $user_id), 1, 0);
$today_s_MorningData = '0';
if ($userMorningData->getNumRows() > 0) {
    $m_ROW = $userMorningData->getRowArray();
    $m_date = date('d-m-Y', $m_ROW['fld_morning_time']);

    if (date('d-m-Y') == $m_date) {

        $accomplish = $m_ROW['fld_accomplish'];
        $feel = $m_ROW['fld_feel'];
        $intend = $m_ROW['fld_intend'];
        $universe = $m_ROW['fld_universe'];
        $today_s_MorningData = '1';
    }
}



if (isset($_POST['morning']) && ($today_s_MorningData == '0')) {
    if ($user_id != '0') {

        $morningData = array(
            'fld_user_id' => $user_id,
            'fld_accomplish' => $accomplish,
            'fld_feel'   => $feel,
            'fld_intend' => $intend,
            'fld_universe' => $universe,
            'fld_morning_time' => time(),
            'fld_date' => date('Y-m-d')
        );
        $fill = $this->db->get_where('mys_daily_score_morning', array('fld_user_id' => $user_id, 'fld_date' => date('Y-m-d')));
        if ($fill->getNumRows() > 0) {
            echo "<div   class=\"alert alert-danger\"><strong>already fill</strong>.<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a></div>";
        } else {
            $this->db->insert('mys_daily_score_morning', $morningData);
            if ($this->db->affected_rows()) {
                echo "<div   class=\"alert alert-success\"><strong>Form Submitted Successfully!</strong>.<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a></div>";
            } else {
                echo "Database Error.";
            }
        }
    }
}


############################MORNING END
//$this->db->select('fld_evening_time');
// $this->db->order_by('fld_id', 'desc');
$userEveningData = $db->table('daily_score_evening')->where(array('fld_user_id' => $user_id))->get();
// $userEveningData = $this->db->get_where('daily_score_evening', array('fld_user_id' => $user_id), 1, 0);
$today_s_EveningData = '0';
if ($userEveningData->getNumRows() > 0) {

    $m_ROW = $userEveningData->getRowArray();
    $m_date = date('d-m-Y', $m_ROW['fld_evening_time']);

    if (date('d-m-Y') == $m_date) {
        $today_s_EveningData = '1';
        $special = $m_ROW['fld_special'];
        $thing = $m_ROW['fld_thing'];
        $imporve = $m_ROW['fld_imporve'];
        $message = $m_ROW['fld_message'];
        $about = $m_ROW['fld_about'];
    }
}


if (isset($_POST['evening']) && ($today_s_EveningData == '0')) {
    if ($user_id != '0') {
        $eveningData = array(
            'fld_user_id' => $user_id,
            'fld_special' => $special,
            'fld_thing' => $thing,
            'fld_imporve' => $imporve,
            'fld_message' => $message,
            'fld_about' => $about,
            'fld_evening_time' => gmmktime(),
            'fld_date' => date('Y-m-d')
        );
        $this->db->insert('mys_daily_score_evening', $eveningData);
        if ($this->db->affected_rows()) {
            echo "<div   class=\"alert alert-success\"><strong>Form Submitted Successfully!</strong><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a></div>";
        } else {
            echo "Error..";
        }
    }
}
#################EVENING END
$wakeup = $_POST['wakeup'];
$goal_affirmations = $_POST['goal_affirmations'];
$exercise = $_POST['exercise'];
$work = $_POST['work'];
$diet = $_POST['diet'];
$centering = $_POST['centering'];
$family = $_POST['family'];
$growth = $_POST['growth'];
$entertainment = $_POST['entertainment'];
$sleep = $_POST['sleep'];
$totalscore = $wakeup + $goal_affirmations + $exercise +  $work + $diet +  $centering + $family + $growth + $entertainment + $sleep;

///$this->db->select('fld_added_date');
$userDayData = $db->table('daily_score_day')->getWhere('fld_user_id', $user_id);
// $this->db->order_by('fld_added_date', 'desc');
// $userDayData = $this->db->get_where('daily_score_day', array('fld_user_id' => $user_id), 1, 0);
$today_s_DayData = '0';
if ($userDayData->getNumRows() > 0) {
    $m_ROW = $userDayData->getRowArray();
    $m_date = date('d-m-Y', $m_ROW['fld_added_date']);
    if (date('d-m-Y') == $m_date) {
        $today_s_DayData = '1';

        $wakeup = $m_ROW['fld_wakeup'];
        $goal_affirmations = $m_ROW['fld_goal_affirmations'];
        $exercise = $m_ROW['fld_exercise'];
        $work = $m_ROW['fld_work'];
        $diet = $m_ROW['fld_diet'];
        $centering = $m_ROW['fld_centering'];
        $family = $m_ROW['fld_family'];
        $growth = $m_ROW['fld_growth'];
        $entertainment = $m_ROW['fld_entertainment'];
        $sleep = $m_ROW['fld_sleep'];
        $totalscore =  $m_ROW['fld_total'];
    }
}
/*if(check_time("12:00 AM", "11:59 PM")==false){
				  $today_s_DayData='2';
		 }*/

if (isset($_POST['submit_score']) && ($today_s_DayData == '0')) {
    if ($user_id != '0') {
        $totalscore = $wakeup + $goal_affirmations + $exercise +  $work + $diet +  $centering + $family + $growth + $entertainment + $sleep;
        $newData = array(
            'fld_user_id' => $user_id,
            'fld_wakeup' => $wakeup,
            'fld_goal_affirmations' => $goal_affirmations,
            'fld_exercise' => $exercise,
            'fld_work' => $work,
            'fld_diet' => $diet,
            'fld_centering' => $centering,
            'fld_family' => $family,
            'fld_growth' => $growth,
            'fld_entertainment' => $entertainment,
            'fld_sleep' => $sleep,
            'fld_total' => $totalscore,
            'fld_added_date' => gmmktime(),
            'fld_date' => date('Y-m-d')
        );

        /*echo "<pre>";
           			print_r ($newData);
           			echo "</pre>";
           			exit;*/
        $fill = $this->db->get_where('mys_daily_score_day', array('fld_user_id' => $user_id, 'fld_date' => date('Y-m-d')));
        if ($fill->getNumRows() > 0) {
            echo "<div   class=\"alert alert-danger\"><strong>already fill</strong>.<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a></div>";
        } else {
            $this->db->insert('mys_daily_score_day', $newData);

            if ($totalscore < 70) {
                $massage = "<head><meta http-equiv='Content-Type' content='text/html; charset=windows-1252'><meta name='GENERATOR' content='MSHTML 11.00.10570.1001'></head><body bgcolor='#ffffff'><strong></strong><strong> </strong><strong></strong><table width='600' align='center' id='TbHeader' bgcolor='#400080' border='0' cellspacing='0' cellpadding='4'><tr><td align='center' id='TdHeader' bgcolor='#400080'><p align='center'><font color='#ffffff' face='Arial, Helvetica, sans-serif' size='6'><strong>Welcome</strong></font></p></td></tr></table><table width='600' align='center' id='TbBodyRow' border='0' cellspacing='0' cellpadding='0'><tr><td id='TdBodyRow' valign='top' bgcolor='#ffffff'><table width='100%' id='TbBody' bgcolor='#ffffff' border='0' cellspacing='0' cellpadding='4'><tr><td align='center' id='TdBody' bgcolor='#ffffff'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p align='left'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='3'><strong>Hi " . $memberName . "&nbsp;<font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='3'>&nbsp;</font></strong></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p align='justify' style='margin-right: 0px;'><font color='#000000' face='Verdana, Arial, Helvetica, sans-serif' size='3'>This email is to notify you that your today’s Daily Accountability Score is quite low. <br><br>Oftentimes we have a bad day & fall off the track and most often we get right back up. However, if you feel you can use some help, please feel free to message me and I will be more than happy to support you to get back on track.<br><br>My goal is to help you stay on track and  help you maintain your score between 93-100 for the best results.</font></p><br></font></font></font></p><p align='left'><br></p></td></tr></table></td></tr></table><strong></strong><strong></strong><strong> </strong><table width='600' align='center' id='TbFooter' bgcolor='#eea000' border='0' cellspacing='0' cellpadding='4'><tr><td align='center' id='TdFooter' bgcolor='#eea000'><div style='margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);'><div style='margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);'><span style='color: rgb(0, 52, 89); line-height: inherit; font-size: inherit; font-weight: bold; text-decoration: inherit;'><span style='color: rgb(0, 52, 89); line-height: inherit; font-family: arial; font-size: inherit; font-style: normal; font-weight: inherit; text-decoration: inherit;'><br></span></span></div><div style='margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);'><span style='color: rgb(0, 52, 89); line-height: inherit; font-size: inherit; font-weight: bold; text-decoration: inherit;'><span style='color: rgb(0, 52, 89); line-height: inherit; font-family: arial; font-size: inherit; font-style: normal; font-weight: inherit; text-decoration: inherit;'>Regards,</span><br style='color: rgb(0, 52, 89);'></span></div><div style='margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);'><span style='color: rgb(0, 52, 89); line-height: inherit; font-family: arial; font-size: inherit; font-style: normal; font-weight: bold; text-decoration: inherit;'>Team MyportalX</span></div><div style='margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);'><span style='color: rgb(0, 52, 89); line-height: inherit; font-family: arial; font-size: inherit; font-style: normal; font-weight: bold; text-decoration: inherit;'><br></span></div></div></td></tr></table></body>";
                $subject = "Low DAS Score";
                $header = "From:" . $this->config->item('mail_from') . "\r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type: text/html\r\n";
                $retval = mail($memberemail, $subject, $massage, $header);
            }
            //$this->db->update('daily_accountability_score', $insertnewPassword);

            if ($this->db->affected_rows()) {
                echo "<div class=\"alert alert-success\"><strong>Submitted Successfully!</strong>.<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a></div>";
            } else {
                echo "Database Error.";
            }
        }
    }
}

?>
<style>
    label.padd-left {
        padding-left: 6px !important;
        color: red;
        padding-top: 18px !important;

    }

    .li_inline {
        display: inline-block;
        width: 40px;

    }
</style>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo base_url() . "member"; ?>">Home</a></li>
    <li class="active">Daily Accountability Score </li>
</ul>
<!-- END BREADCRUMB -->
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <!-- PAGE TITLE -->
    <div class="page-title ">
        <div class="col-md-6">
            <h2>Daily Accountability Score (DAS) <a href="javascript:void(0);"><span class="fa fa-info-circle mb-control" data-box="#message-box-success"></span></a></h2>
            <!-- <button type="button" class="btn btn-default mb-control col-md-1" data-box="#message-box-success"> <span class="fa fa-question"></span></button>-->
        </div>
        <!-- END PAGE TITLE -->
        <div class="col-md-3">
            <div class="widget widget-primary widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">DAS</div>
                    <div class="widget-subtitle">Today's Score </div>
                    <?php

                    ?>
                    <div class="widget-int num-count"><?php echo $totalscore; ?></div>
                </div>
            </div>
        </div>

        <!--  Weekly Accountability Score Average   -->
        <div class="col-md-3">
            <div class="widget widget-primary widget-item-icon  ">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">DAS</div>
                    <div class="widget-subtitle">Week's Average Score </div>
                    <?php
                    $WeekTotal = 0;
                    $WeekAverage = 0;
                    // $qryWeekTotal1 = $db->table('daily_score_day')->limit(1)->orderBy('fld_date', 'DESC')->getWhere('fld_user_id', $user_id)->getRow();
            
                    // $qryWeekTotal = $db->table('daily_score_day')->select('SELECT SUM(fld_total) AS Total')->getWhere(array('fld_user_id' => $user_id, 'fld_added_date>=' => strtotime($weekStartDate), 'fld_added_date <=' => strtotime($weekEndDate . " 23:59:59")));
                    // if ($C_date == $qryWeekTotal1->fld_date) {
                    //     if ($qryWeekTotal->getNumRows() > 0) {
                    //         $WeekTotal = $qryWeekTotal->getRow()->Total;
                    //     }
                    //     if ($WeekTotal > 0) {
                    //         $WeekAverage  = $WeekTotal;
                    //         // print_r($WeekDay);x
                    //         if ($WeekDay > 0)
                    //             $WeekAverage  = round($WeekTotal / ($WeekDay + 1));
                    //     }
                    // } else {
                    //     if ($qryWeekTotal->getNumRows() > 0) {
                    //         $WeekTotal = $qryWeekTotal->getRow()->Total;
                    //     }
                    //     if ($WeekTotal > 0) {
                    //         $WeekAverage  = $WeekTotal;
                    //         // print_r($WeekDay);x
                    //         if ($WeekDay1 > 0)
                    //             $WeekAverage  = round($WeekTotal / ($WeekDay1 + 1));
                    //     }
                    // }
                    ?>

                    <div class="widget-int num-count"><?php echo $WeekAverage; ?></div>
                </div>
            </div>
        </div>
    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div id="error_container"></div>
            <div class="col-md-6">

                <!-- START BASIC ELEMENTS -->
                <div class="panel panel-default">
                    <div class="panel-body"><br><br>
                        <h3>SET YOUR INTENTION FOR THE DAY</h3><input type="text" class="form-control dasDate pull-right" style="width:22%; margin-top: -9%;" readonly="readonly" value="<?php echo date("m/d/Y"); ?>"><br><br>
                        <p>While writing the answers, take time; think, feel & Visulize yourself accomplishing it.</p><br>

                        <h3 style="color:#006600">To be filled in at the beginning of the day</h3>

                        <form role="form" action="#" method="post" class="form-material">
                            <div class="form-group">
                                <input type="text" name="accomplish" class="form-control mrng" placeholder="Fill here..." required value="<?php echo $accomplish; ?>" <?php if ($today_s_MorningData == 1 ||  !$isMorningTime) echo "disabled='disabled'"; ?>>
                                <span class="form-bar"></span>
                                <label for="exampleInputEmail1">What would you like to accomplish today ?</label>
                            </div>

                            <div class="form-group">
                                <input type="text" name="feel" class="form-control mrng" placeholder="Fill here..." required value="<?php echo $feel; ?>" <?php if ($today_s_MorningData == 1 ||  !$isMorningTime) echo "disabled='disabled'"; ?>>
                                <span class="form-bar"></span>
                                <label for="exampleInputEmail1">How would you like to Feel?</label>
                            </div>

                            <div class="form-group">
                                <input type="text" name="intend" class="form-control mrng" placeholder="Fill here..." required value="<?php echo $intend; ?>" <?php if ($today_s_MorningData == 1 ||  !$isMorningTime) echo "disabled='disabled'"; ?>>
                                <span class="form-bar"></span>
                                <label for="exampleInputEmail1">What you intend to be, do or have ?</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="universe" class="form-control mrng" placeholder="Fill here..." required value="<?php echo $universe; ?>" <?php if ($today_s_MorningData == 1 ||  !$isMorningTime) echo "disabled='disabled'"; ?>>
                                <span class="form-bar"></span>
                                <label for="exampleInputEmail1">What you want the universe to provide?</label>
                            </div>
                            <div class="panel-footer">

                                <?php if ($today_s_MorningData == '0'  &&  $isMorningTime) { ?>
                                    <button class="btn btn-default">Clear Form</button>
                                    <input type="submit" name="morning" value="Submit" class="btn btn-primary pull-right" id="submit_once_morning" />
                                <?php } else if ($today_s_MorningData == '1') { ?>
                                    <span class="text-center text-danger ">You have already filled it.</span>
                                    <input type="submit" name="morning" value="Submit" class="btn btn-primary pull-right disabled" />
                                <?php } else if (!$isMorningTime) { ?>
                                    <span class="text-center text-danger ">This form has to be filled in the morning hour.</span>
                                    <input type="submit" name="morning" value="Submit" class="btn btn-primary pull-right disabled" />
                                <?php } ?>

                            </div>

                        </form>

                        <div style="padding-top: 20px;float: left;margin-top: 50px;"></div>
                        <h3 style="color:#006600">To be filled in at the end of the day</h3>

                        <form role="form" action="#" method="post" class="form-material">
                            <div class="form-group">
                                <input type="text" name="special" class="form-control evng" placeholder="Fill here..." required value="<?php echo $special; ?>" <?php if ($today_s_EveningData == 1  ||  !$isEveningTime) echo "disabled='disabled'"; ?>>
                                <span class="form-bar"></span>
                                <label for="exampleInputEmail1">One thing special that happened today?</label>
                            </div>

                            <div class="form-group">
                                <input type="text" name="thing" class="form-control evng" placeholder="Fill here..." required value="<?php echo $thing; ?>" <?php if ($today_s_EveningData == 1 ||  !$isEveningTime) echo "disabled='disabled'"; ?>>
                                <span class="form-bar"></span>
                                <label for="exampleInputEmail1">One thing you did right today?</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="imporve" class="form-control evng" placeholder="Fill here..." required value="<?php echo $imporve; ?>" <?php if ($today_s_EveningData == 1 ||  !$isEveningTime) echo "disabled='disabled'"; ?>>
                                <span class="form-bar"></span>
                                <label for="exampleInputEmail1">One thing you can imporve on tommorow</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="message" class="form-control evng" placeholder="Fill here..." required value="<?php echo $message; ?>" <?php if ($today_s_EveningData == 1 ||  !$isEveningTime) echo "disabled='disabled'"; ?>>
                                <span class="form-bar"></span>
                                <label for="exampleInputEmail1" style="top: -34px;">One divine thought that needs to be noted..which could be a message from your higher self.</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="about" class="form-control evng" placeholder="Fill here..." required value="<?php echo $about; ?>" <?php if ($today_s_EveningData == 1 ||  !$isEveningTime) echo "disabled='disabled'"; ?>>
                                <span class="form-bar"></span>
                                <label for="exampleInputEmail1">What are you most grateful about</label>
                            </div>
                            <div class="panel-footer">
                                <?php if (!$isEveningTime) { ?>
                                    <span class="text-center text-danger ">This form can be fill in the Evening.</span>
                                    <input type="button" name="evening" value="Submit" class="btn btn-primary pull-right disabled" />
                                <?php } else if ($today_s_EveningData == '0') { ?>
                                    <button class="btn btn-default">Clear Form</button>
                                    <input type="submit" name="evening" value="Submit" class="btn btn-primary pull-right" id="submit_once_evening" />
                                <?php } else if ($today_s_EveningData == '1') { ?>
                                    <span class="text-center text-danger ">You have already filled it.</span>
                                    <input type="button" name="evening" value="Submit" class="btn btn-primary pull-right disabled" />
                                <?php } ?>

                            </div>
                        </form>

                    </div>
                </div>
                <!-- END BASIC ELEMENTS -->
            </div>
            <div class="col-md-6">

                <!-- START BASIC ELEMENTS -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php
                        $das_score = $db->table('das')->getWhere(array('fld_coach' => $membersparent_id, 'fld_member_id' => $user_id));
                        // $das_score = $this->db->get_where('das', array('fld_coach' => $membersparent_id, 'fld_member_id' => $user_id));
                        $row = $das_score->getRowArray();
                        ?>
                        <form role="form" action="#" method="post" class="form-material">
                            <h3>Measure Today's Production</h3>
                            <p>on a scale of 1-10 ( 10 being high)</p>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label_width"><?php if ($row['fld_production'] != "") {
                                                                                        echo $row['fld_production'];
                                                                                    } else {
                                                                                        echo "Wakeup";
                                                                                    } ?>&nbsp;&nbsp;
                                    <span class="fa fa-info-circle" data-container="body" data-toggle="popover" data-placement="top" data-content="Take a few minutes to wake up- recollect the dreams and if there is an important message, write it down in the journal. Wake up with an attitude of gratitude and looking forward to the  day as another exciting day of challenges & appreciation for the opportunity- Read the affirmation aloud"></span>
                                </label>
                                <ul>
                                    <li class="li_inline"><input type="radio" name="wakeup" value="1" required <?php if ($wakeup == '1') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">1</label>
                                    <li class="li_inline"> <input type="radio" name="wakeup" value="2" <?php if ($wakeup == '2') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">2</label> </li>
                                    <li class="li_inline"> <input type="radio" name="wakeup" value="3" <?php if ($wakeup == '3') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">3</label></li>
                                    <li class="li_inline"> <input type="radio" name="wakeup" value="4" <?php if ($wakeup == '4') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">4</label> </li>
                                    <li class="li_inline"> <input type="radio" name="wakeup" value="5" <?php if ($wakeup == '5') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">5</label> </li>
                                    <li class="li_inline"> <input type="radio" name="wakeup" value="6" <?php if ($wakeup == '6') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">6</label> </li>
                                    <li class="li_inline"> <input type="radio" name="wakeup" value="7" <?php if ($wakeup == '7') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">7</label> </li>
                                    <li class="li_inline"> <input type="radio" name="wakeup" value="8" <?php if ($wakeup == '8') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">8</label></li>
                                    <li class="li_inline"> <input type="radio" name="wakeup" value="9" <?php if ($wakeup == '9') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">9</label> </li>
                                    <li class="li_inline"> <input type="radio" name="wakeup" value="10" <?php if ($wakeup == '10') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">10</label></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label_width"><?php if ($row['fld_production1'] != "") {
                                                                                        echo $row['fld_production1'];
                                                                                    } else {
                                                                                        echo "Goal affirmations";
                                                                                    } ?>
                                    &nbsp;&nbsp;
                                    <span class="fa fa-info-circle" data-container="body" data-toggle="popover" data-placement="top" data-content="After goal setting have a clear goal – or mission statement at the bed side- read aloud before going to sleep and when waking up."></span>
                                </label>
                                <ul>
                                    <li class="li_inline"><input type="radio" name="goal_affirmations" value="1" required <?php if ($goal_affirmations == '1') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">1</label></li>
                                    <li class="li_inline"> <input type="radio" name="goal_affirmations" value="2" <?php if ($goal_affirmations == '2') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">2</label> </li>
                                    <li class="li_inline"> <input type="radio" name="goal_affirmations" value="3" <?php if ($goal_affirmations == '3') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">3</label></li>
                                    <li class="li_inline"> <input type="radio" name="goal_affirmations" value="4" <?php if ($goal_affirmations == '4') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">4</label> </li>
                                    <li class="li_inline"> <input type="radio" name="goal_affirmations" value="5" <?php if ($goal_affirmations == '5') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">5</label> </li>
                                    <li class="li_inline"> <input type="radio" name="goal_affirmations" value="6" <?php if ($goal_affirmations == '6') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">6</label> </li>
                                    <li class="li_inline"> <input type="radio" name="goal_affirmations" value="7" <?php if ($goal_affirmations == '7') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">7</label> </li>
                                    <li class="li_inline"> <input type="radio" name="goal_affirmations" value="8" <?php if ($goal_affirmations == '8') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">8</label></li>
                                    <li class="li_inline"> <input type="radio" name="goal_affirmations" value="9" <?php if ($goal_affirmations == '9') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">9</label> </li>
                                    <li class="li_inline"> <input type="radio" name="goal_affirmations" value="10" <?php if ($goal_affirmations == '10') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">10</label></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label_width"><?php if ($row['fld_production2'] != "") {
                                                                                        echo $row['fld_production2'];
                                                                                    } else {
                                                                                        echo "Exercise";
                                                                                    } ?>&nbsp;&nbsp;
                                    <span class="fa fa-info-circle" data-container="body" data-toggle="popover" data-placement="top" data-content="Based on your desired level of health. A certain routine has to be set as a part of daily routine. The purpose is not only the benefit of physical exercise but to train the mind to follow your order ( you, meaning higher self- you are not your mind, thoughts or body)"></span>
                                </label>
                                <ul>
                                    <li class="li_inline"><input type="radio" name="exercise" value="1" required <?php if ($exercise == '1') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">1</label></li>
                                    <li class="li_inline"> <input type="radio" name="exercise" value="2" <?php if ($exercise == '2') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">2</label> </li>
                                    <li class="li_inline"> <input type="radio" name="exercise" value="3" <?php if ($exercise == '3') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">3</label></li>
                                    <li class="li_inline"> <input type="radio" name="exercise" value="4" <?php if ($exercise == '4') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">4</label> </li>
                                    <li class="li_inline"> <input type="radio" name="exercise" value="5" <?php if ($exercise == '5') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">5</label> </li>
                                    <li class="li_inline"> <input type="radio" name="exercise" value="6" <?php if ($exercise == '6') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">6</label> </li>
                                    <li class="li_inline"> <input type="radio" name="exercise" value="7" <?php if ($exercise == '7') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">7</label> </li>
                                    <li class="li_inline"> <input type="radio" name="exercise" value="8" <?php if ($exercise == '8') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">8</label></li>
                                    <li class="li_inline"> <input type="radio" name="exercise" value="9" <?php if ($exercise == '9') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">9</label> </li>
                                    <li class="li_inline"> <input type="radio" name="exercise" value="10" <?php if ($exercise == '10') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">10</label></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label_width"><?php if ($row['fld_production3'] != "") {
                                                                                        echo $row['fld_production3'];
                                                                                    } else {
                                                                                        echo "Work";
                                                                                    } ?>&nbsp;&nbsp;
                                    <span class="fa fa-info-circle" data-container="body" data-toggle="popover" data-placement="top" data-content=": Satisfying work. ( Job/ Entrepreneur/Business/etc)—Looking forward and excited at the beginning of the day and grateful at the end of the  day."></span>
                                </label>
                                <ul>
                                    <li class="li_inline"><input type="radio" name="work" value="1" required <?php if ($work == '1') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">1</label></li>
                                    <li class="li_inline"> <input type="radio" name="work" value="2" <?php if ($work == '2') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">2</label> </li>
                                    <li class="li_inline"> <input type="radio" name="work" value="3" <?php if ($work == '3') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">3</label></li>
                                    <li class="li_inline"> <input type="radio" name="work" value="4" <?php if ($work == '4') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">4</label> </li>
                                    <li class="li_inline"> <input type="radio" name="work" value="5" <?php if ($work == '5') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">5</label> </li>
                                    <li class="li_inline"> <input type="radio" name="work" value="6" <?php if ($work == '6') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">6</label> </li>
                                    <li class="li_inline"> <input type="radio" name="work" value="7" <?php if ($work == '7') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">7</label> </li>
                                    <li class="li_inline"> <input type="radio" name="work" value="8" <?php if ($work == '8') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">8</label></li>
                                    <li class="li_inline"> <input type="radio" name="work" value="9" <?php if ($work == '9') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">9</label> </li>
                                    <li class="li_inline"> <input type="radio" name="work" value="10" <?php if ($work == '10') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">10</label></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label_width"><?php if ($row['fld_production4'] != "") {
                                                                                        echo $row['fld_production4'];
                                                                                    } else {
                                                                                        echo "Diet";
                                                                                    } ?>&nbsp;&nbsp;
                                    <span class="fa fa-info-circle" data-container="body" data-toggle="popover" data-placement="top" data-content="The diet has to be a part of your life plan. What foods you need to eat, how often, when you can splurge etc. Focus on the food that will be good for your body and also satisfy your soul. If you are forcing yourself for certain diet or dependent on medication or similar habits, you must evaluate this area of your life."></span>
                                </label>
                                <ul>
                                    <li class="li_inline"><input type="radio" name="diet" value="1" required <?php if ($diet == '1') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">1</label></li>
                                    <li class="li_inline"> <input type="radio" name="diet" value="2" <?php if ($diet == '2') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">2</label> </li>
                                    <li class="li_inline"> <input type="radio" name="diet" value="3" <?php if ($diet == '3') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">3</label></li>
                                    <li class="li_inline"> <input type="radio" name="diet" value="4" <?php if ($diet == '4') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">4</label> </li>
                                    <li class="li_inline"> <input type="radio" name="diet" value="5" <?php if ($diet == '5') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">5</label> </li>
                                    <li class="li_inline"> <input type="radio" name="diet" value="6" <?php if ($diet == '6') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">6</label> </li>
                                    <li class="li_inline"> <input type="radio" name="diet" value="7" <?php if ($diet == '7') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">7</label> </li>
                                    <li class="li_inline"> <input type="radio" name="diet" value="8" <?php if ($diet == '8') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">8</label></li>
                                    <li class="li_inline"> <input type="radio" name="diet" value="9" <?php if ($diet == '9') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">9</label> </li>
                                    <li class="li_inline"> <input type="radio" name="diet" value="10" <?php if ($diet == '10') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">10</label></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label_width"><?php if ($row['fld_production5'] != "") {
                                                                                        echo $row['fld_production5'];
                                                                                    } else {
                                                                                        echo "Centering";
                                                                                    } ?>&nbsp;&nbsp;
                                    <span class="fa fa-info-circle" data-container="body" data-toggle="popover" data-placement="top" data-content="I have set five-alarms on my phone. When the alarm goes off, I take a minute to center myself , come in the present moment- disconnect from the outside world and measure if I am doing what I was supposed to do or I have drifted, if so I get back on track."></span>
                                </label>
                                <ul>
                                    <li class="li_inline"><input type="radio" name="centering" value="1" required <?php if ($centering == '1') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">1</label></li>
                                    <li class="li_inline"> <input type="radio" name="centering" value="2" <?php if ($centering == '2') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">2</label> </li>
                                    <li class="li_inline"> <input type="radio" name="centering" value="3" <?php if ($centering == '3') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">3</label></li>
                                    <li class="li_inline"> <input type="radio" name="centering" value="4" <?php if ($centering == '4') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">4</label> </li>
                                    <li class="li_inline"> <input type="radio" name="centering" value="5" <?php if ($centering == '5') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">5</label> </li>
                                    <li class="li_inline"> <input type="radio" name="centering" value="6" <?php if ($centering == '6') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">6</label> </li>
                                    <li class="li_inline"> <input type="radio" name="centering" value="7" <?php if ($centering == '7') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">7</label> </li>
                                    <li class="li_inline"> <input type="radio" name="centering" value="8" <?php if ($centering == '8') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">8</label></li>
                                    <li class="li_inline"> <input type="radio" name="centering" value="9" <?php if ($centering == '9') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">9</label> </li>
                                    <li class="li_inline"> <input type="radio" name="centering" value="10" <?php if ($centering == '10') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">10</label></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label_width"><?php if ($row['fld_production6'] != "") {
                                                                                        echo $row['fld_production6'];
                                                                                    } else {
                                                                                        echo "Family";
                                                                                    } ?>&nbsp;&nbsp;
                                    <span class="fa fa-info-circle" data-container="body" data-toggle="popover" data-placement="top" data-content="Take time to think about the family & friends, connect with them. If not physically, by phone or in the mind. The idea is to remind the mind about the greater things in life and remember the loved ones to nourish your soul."></span>
                                </label>
                                <ul>
                                    <li class="li_inline"><input type="radio" name="family" value="1" required <?php if ($family == '1') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">1</label></li>
                                    <li class="li_inline"> <input type="radio" name="family" value="2" <?php if ($family == '2') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">2</label> </li>
                                    <li class="li_inline"> <input type="radio" name="family" value="3" <?php if ($family == '3') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">3</label></li>
                                    <li class="li_inline"> <input type="radio" name="family" value="4" <?php if ($family == '4') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">4</label> </li>
                                    <li class="li_inline"> <input type="radio" name="family" value="5" <?php if ($family == '5') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">5</label> </li>
                                    <li class="li_inline"> <input type="radio" name="family" value="6" <?php if ($family == '6') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">6</label> </li>
                                    <li class="li_inline"> <input type="radio" name="family" value="7" <?php if ($family == '7') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">7</label> </li>
                                    <li class="li_inline"> <input type="radio" name="family" value="8" <?php if ($family == '8') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">8</label></li>
                                    <li class="li_inline"> <input type="radio" name="family" value="9" <?php if ($family == '9') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">9</label> </li>
                                    <li class="li_inline"> <input type="radio" name="family" value="10" <?php if ($family == '10') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">10</label></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label_width"><?php if ($row['fld_production7'] != "") {
                                                                                        echo $row['fld_production7'];
                                                                                    } else {
                                                                                        echo "Growth";
                                                                                    } ?>&nbsp;&nbsp;
                                    <span class="fa fa-info-circle" data-container="body" data-toggle="popover" data-placement="top" data-content="Read, watch videos, Listen to tapes or whatever activity and subject that you enjoy, but it has to be dedicated towards your growth. Five minutes to one hour."></span>
                                </label>
                                <ul>
                                    <li class="li_inline"><input type="radio" name="growth" value="1" required <?php if ($growth == '1') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">1</label></li>
                                    <li class="li_inline"> <input type="radio" name="growth" value="2" <?php if ($growth == '2') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">2</label> </li>
                                    <li class="li_inline"> <input type="radio" name="growth" value="3" <?php if ($growth == '3') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">3</label></li>
                                    <li class="li_inline"> <input type="radio" name="growth" value="4" <?php if ($growth == '4') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">4</label> </li>
                                    <li class="li_inline"> <input type="radio" name="growth" value="5" <?php if ($growth == '5') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">5</label> </li>
                                    <li class="li_inline"> <input type="radio" name="growth" value="6" <?php if ($growth == '6') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">6</label> </li>
                                    <li class="li_inline"> <input type="radio" name="growth" value="7" <?php if ($growth == '7') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">7</label> </li>
                                    <li class="li_inline"> <input type="radio" name="growth" value="8" <?php if ($growth == '8') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">8</label></li>
                                    <li class="li_inline"> <input type="radio" name="growth" value="9" <?php if ($growth == '9') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">9</label> </li>
                                    <li class="li_inline"> <input type="radio" name="growth" value="10" <?php if ($growth == '10') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">10</label></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label_width"><?php if ($row['fld_production8'] != "") {
                                                                                        echo $row['fld_production8'];
                                                                                    } else {
                                                                                        echo "Entertainment";
                                                                                    } ?>&nbsp;&nbsp;
                                    <span class="fa fa-info-circle" data-container="body" data-toggle="popover" data-placement="top" data-content="Doing something you enjoy, even if this is for a few moments and as simple as watching TV or playing with kids or loved one."></span>
                                </label>
                                <ul>
                                    <li class="li_inline"><input type="radio" name="entertainment" value="1" required <?php if ($entertainment == '1') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">1</label></li>
                                    <li class="li_inline"> <input type="radio" name="entertainment" value="2" <?php if ($entertainment == '2') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">2</label> </li>
                                    <li class="li_inline"> <input type="radio" name="entertainment" value="3" <?php if ($entertainment == '3') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">3</label></li>
                                    <li class="li_inline"> <input type="radio" name="entertainment" value="4" <?php if ($entertainment == '4') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">4</label> </li>
                                    <li class="li_inline"> <input type="radio" name="entertainment" value="5" <?php if ($entertainment == '5') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">5</label> </li>
                                    <li class="li_inline"> <input type="radio" name="entertainment" value="6" <?php if ($entertainment == '6') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">6</label> </li>
                                    <li class="li_inline"> <input type="radio" name="entertainment" value="7" <?php if ($entertainment == '7') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">7</label> </li>
                                    <li class="li_inline"> <input type="radio" name="entertainment" value="8" <?php if ($entertainment == '8') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">8</label></li>
                                    <li class="li_inline"> <input type="radio" name="entertainment" value="9" <?php if ($entertainment == '9') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">9</label> </li>
                                    <li class="li_inline"> <input type="radio" name="entertainment" value="10" <?php if ($entertainment == '10') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">10</label></li>
                                </ul>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label_width"><?php if ($row['fld_production9	'] != "") {
                                                                                        echo $row['fld_production9'];
                                                                                    } else {
                                                                                        echo "Sleep";
                                                                                    } ?>&nbsp;&nbsp;
                                    <span class="fa fa-info-circle" data-container="body" data-toggle="popover" data-placement="top" data-content="The sleep routine is the most important part of the day because your body, mind and should will be nourished during the sleep. You mind has to be empty, ideally you can write in the journal and get it out of the mind, the next thing would be to take out any negative charged emotions and experiences into the Daha-Tantra application and get it out. The positive charged emotions are noted into the diary and the neative charged emotions are put into the daha tantra. The mind is should be totally empty. If possible create a routine like the smell of a perfume or perhaps a certain music or affirmation, or use a eye pillow to relax. Once a habit and a routine is formed the sleep will be the natural result and you will feel really charged at wake up time. Your body, mind, & spirit will be refreshed."></span>
                                </label>
                                <ul>
                                    <li class="li_inline"><input type="radio" name="sleep" value="1" required <?php if ($sleep == '1') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">1</label></li>
                                    <li class="li_inline"> <input type="radio" name="sleep" value="2" <?php if ($sleep == '2') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">2</label> </li>
                                    <li class="li_inline"> <input type="radio" name="sleep" value="3" <?php if ($sleep == '3') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">3</label></li>
                                    <li class="li_inline"> <input type="radio" name="sleep" value="4" <?php if ($sleep == '4') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">4</label> </li>
                                    <li class="li_inline"> <input type="radio" name="sleep" value="5" <?php if ($sleep == '5') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">5</label> </li>
                                    <li class="li_inline"> <input type="radio" name="sleep" value="6" <?php if ($sleep == '6') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">6</label> </li>
                                    <li class="li_inline"> <input type="radio" name="sleep" value="7" <?php if ($sleep == '7') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">7</label> </li>
                                    <li class="li_inline"> <input type="radio" name="sleep" value="8" <?php if ($sleep == '8') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">8</label></li>
                                    <li class="li_inline"> <input type="radio" name="sleep" value="9" <?php if ($sleep == '9') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /><label for="crust1" class="padd-left">9</label> </li>
                                    <li class="li_inline"> <input type="radio" name="sleep" value="10" <?php if ($sleep == '10') echo "checked='checked'" ?> <?php if ($today_s_DayData == '1') echo "disabled='disabled'"; ?> /> <label for="crust1" class="padd-left">10</label></li>
                                </ul>
                            </div>
                            <div class="panel-footer">

                                <?php if ($today_s_DayData == '0') { ?>
                                    <button class="btn btn-default">Clear Form</button>
                                    <input type="submit" name="submit_score" value="Submit" class="btn btn-primary pull-right" id="submit_once_day" />
                                <?php } else if ($today_s_DayData == '1') { ?>
                                    <span class="text-center text-danger ">You have already filled it.</span>
                                <?php } ?>

                            </div>

                            <div class="form-group scroll_div">
                                <table class="table table-striped table-bordered">
                                    <tr class="total">
                                        <td width="100px"><strong>Day</strong></td>
                                        <td class="text-center"><strong>Day Score<br>(Out of 100)</strong></td>
                                        <td class="text-center"><strong>Week Average</strong></td>
                                    </tr>
                                    <?php
                                    // $queryRESULT = $db->table('daily_score_day')->orderBy("fld_added_date", "asc")->getWhere(array('fld_user_id' => $user_id, 'fld_added_date>=' => strtotime($weekStartDate), 'fld_added_date <=' => strtotime($weekEndDate . " 22:59:59")));
                                    // $result = $queryRESULT->getRowArray();

                                    // $day = 0;
                                    // $rowno = 0;
                                    // $subtotal = 0;
                                    // foreach ($array_week_days as $day_key => $day_val) {
                                    //     $_date = date_create($weekStartDate);
                                    //     $add_days = $day . " days";
                                    //     $date = date_format(date_add($_date, date_interval_create_from_date_string($add_days)), "d-m-Y");


                                    //     $dayScore = 0;
                                    //     $avgScore  = 0;
                                        // if (sizeof($result) >= $rowno) {
                                        //     $row = $queryRESULT->getRow($rowno);
                                        //     if (date("d-m-Y", $row->fld_added_date) == $date) {
                                        //         $dayScore = $row->fld_total;
                                        //         $rowno++;
                                        //     }
                                        // }
                                        //     $subtotal += $dayScore;
                                        //     if ($C_date == $qryWeekTotal1->fld_date) {
                                        //         if ($subtotal > 0 && $day <= $WeekDay)
                                        //             $avgScore = $subtotal / ($day + 1);
                                        //         echo "<tr>";
                                        //         echo "<td>" . $day_val . "</td>";
                                        //         if ($day <= $WeekDay) {
                                        //             echo "<td>" . $dayScore . "</td>";
                                        //             echo "<td>" . round($avgScore) . "</td>";
                                        //         } else {
                                        //             echo "<td>-</td>";
                                        //             echo "<td>-</td>";
                                        //         }
                                        //         echo "</tr>";
                                        //         $day++;
                                        //     } else {
                                        //         if ($subtotal > 0 && $day <= $WeekDay1)
                                        //             $avgScore = $subtotal / ($day + 1);
                                        //         echo "<tr>";
                                        //         echo "<td>" . $day_val . "</td>";
                                        //         if ($day <= $WeekDay1) {
                                        //             echo "<td>" . $dayScore . "</td>";
                                        //             echo "<td>" . round($avgScore) . "</td>";
                                        //         } else {
                                        //             echo "<td>-</td>";
                                        //             echo "<td>-</td>";
                                        //         }
                                        //         echo "</tr>";
                                        //         $day++;
                                        //     }
                                        // }
                                    ?>


                                </table>
                            </div>


                            <style>
                                .totalAvg {
                                    width: 100%;
                                    height: auto;
                                    float: left;
                                }

                                .scroll_div {
                                    width: 100%;
                                    height: auto;
                                    max-height: 200px;
                                    overflow-y: scroll;
                                }
                            </style>
                            <div class="totalAvg">
                                <table class="table table-striped">
                                    <tr>
                                        <td width="50px"><strong>Total</strong></td>
                                        <td width="200px" class="text-center"><strong><?php echo round($subtotal); ?></strong></td>
                                        <td width="200px" class="text-center"><strong>
                                                <?php
                                                if ($C_date == $qryWeekTotal1->fld_date) {
                                                    echo round($subtotal / ($WeekDay + 1));
                                                } else {
                                                    echo round($subtotal / ($WeekDay1 + 1));
                                                }
                                                ?></strong></td>
                                    </tr>

                            </div>
                        </form>
                    </div>

                </div>
                <!-- END BASIC ELEMENTS -->
            </div>
        </div>
    </div>
    <!-- success -->
    <div class="message-box message-box-success animated fadeIn popup-scroll" id="message-box-success">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title">Daily Accountability Score
                    <div class="pull-right"> <span class="fa fa-close  mb-control-close"></span></div>
                </div>
                <div class="mb-content">
                    <p><b>Daily Accountability Score: </b> Turn dreams into reality by being responsible for decisions made, actions taken and results created. Lao Tzu, the Great Zen Master, says one who knows others is wise but one who knows himself is enlightened.
                        Therefore we must be willing to let go of the life we planned so we can have the life that is waiting for us and our honesty towards ourselves will open many doors. We believe that by focusing on these different areas of life you can create a balanced life.
                        The Daily Accountability Score is based on 10 aspects of daily routines. Please take time to measure yourself on daily basis. <br><br>
                        <b>How to use it:</b> Start the day with a clear intention of what you want to manifest on that day. Answer the questions mindfully and jot it down. Take a few moments to visualize the task getting done and experience the feeling of success.
                        I had even set alarms on my phone, at an interval of every couple of hours, just to become conscious of my surrounding and become aware of what I am doing. At the end of the day I closed out and note the scores. The goal is to keep the score between 93 and 100 points for a period of 21 days.
                        If my 21 day score is not up to mark I will start over again.
                    </p>
                </div>
                <div class="mb-footer">

                </div>
            </div>
        </div>
    </div>
    <!-- end success -->

    <!-- START SCRIPTS -->
    <!-- START PLUGINS -->
    <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- END PLUGINS -->

    <!-- START THIS PAGE PLUGINS-->
    <script type='text/javascript' src='<?php echo base_url() . "assets/"; ?>js/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/bootstrap/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/bootstrap/bootstrap-file-input.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/bootstrap/bootstrap-select.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
    <!-- END THIS PAGE PLUGINS-->

    <!-- START TEMPLATE -->

    <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/actions.js"></script>

    <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->


    <?php echo view('client/footer');   ?>