<?php
$son = session();
$session = $son->getTempdata();
$user_type = $session['user_type'];
$login_id = $session['user_id'];

$user_id = $session['user_id'];
$db      = \Config\Database::connect();
$builder = $db->table('users');
$userData = $builder->where(array('fld_id' => $user_id))->get();
if ($userData->getNumRows() > 0) {
    $userRow = $userData->getRowArray();
}
$image_path = ($userRow['fld_file_name'] != '') ? $userRow['fld_file_name'] : '/public/uploads/member/' . 'default.png';
$image = base_url() . $image_path;
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <!-- META SECTION -->

    <title>Member Dashboard</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="<?php echo base_url() . '/public/'; ?>new_client_dashboard/images/Myportalx logo 2.png" type="image/x-icon" />

    <!-- END META SECTION -->



    <!-- CSS INCLUDE -->

    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() . "/public/"; ?>css/theme-default.css" />

    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() . "/public/"; ?>css/responsive.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- EOF CSS INCLUDE -->

</head>

<body>

    <div id="callincoming"></div>

    <!-- START PAGE CONTAINER -->

    <div class="page-container">

        <div id="fire"></div>

        <div id="fire_for_intention" style="display:none;"><img src="<?php echo base_url() . "/public/img/"; ?>bluesmoke-1.gif"></div>

        <!-- START PAGE SIDEBAR -->

        <div class="page-sidebar">

            <!-- START X-NAVIGATION -->

            <ul class="x-navigation">
                <li>
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() . '/client' ?>">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <img src="<?php echo base_url() . '/public/'; ?>new_client_dashboard/images/Myportalx logo 2.png" width="50"><span class="brand-name">MYPORTALX.COM
                            </span>
                        </div>
                    </a>
                    <a href="#" class="x-navigation-control"></a>
                </li>

                <!--  <li class="xn-logo">

                        <a href="<?php echo base_url() . "/client" ?>"> MyPortalX</a>

                        <a href="#" class="x-navigation-control"></a>                    </li> -->

                <li class="xn-profile">

                    <a href="#" class="profile-mini">

                        <img src="<?php echo base_url() . "/public/images/users/"; ?>avatar.jpg" alt="John Doe" /> </a>

                    <div class="profile">

                        <div class="profile-image">

                            <img src="<?php echo $image ?>" />
                        </div>

                        <div class="profile-data">

                            <div class="profile-data-name">Welcome <?php echo ucwords($userRow['fld_first_name']); ?>&nbsp;<?php echo ucwords($userRow['fld_last_name']); ?></div>

                        </div>

                        <div class="profile-controls">

                            <a href="<?php echo base_url() . "/client/edit_profile"; ?>" class="profile-control-left"><span class="fa fa-info"></span></a>

                            <a href="<?php echo base_url() . "/client/messages"; ?>" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                        </div>

                    </div>



                </li>



                <li>

                    <a href="<?php echo base_url() . "/client"; ?>"><span class="xn-text">Dashboard</span></a>

                </li>



                <?php
                $getDatas = $builder->where(array('fld_id' => $user_id))->get();
                foreach ($getDatas->getResult() as $rows) {}
                ?>

                <li>

                    <a href="<?php echo ($rows->fld_Gratitude_verified == 1) ? base_url("/Gratitude_Journal") : base_url("/client/no_Gratitude") ?>"><span class="xn-text">Gratitude Journal</span></a>

                </li>


                <?php if ($rows->fld_Daily_Score_verified == 1) { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/das"; ?>"><span class="xn-text">Daily Accountability Score</span></a>

                    </li>

                <?php } else { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/no_Daily"; ?>"><span class="xn-text">Daily Accountability Score</span></a>

                    </li><?php } ?>



                <?php if ($rows->fld_Energy_Detox_verified == 1) { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/daha_tantra_form"; ?>">Negative Energy Detox</a>

                    </li>

                <?php } else { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/no_Negative"; ?>">Negative Energy Detox</a>

                    </li><?php } ?>



                <?php if ($rows->fld_Intention_verified == 1) { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/intention_setting"; ?>">Intention Setting</a>

                    </li>

                <?php } else { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/no_intention"; ?>">Intention Setting</a>

                    </li><?php } ?>



                <?php if ($rows->fld_Appointment_verified == 1) { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/appointments"; ?>"><span class="xn-text">Appointment Scheduler</span></a>

                    </li>

                <?php } else { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/no_Appointment"; ?>"><span class="xn-text">Appointment Scheduler</span></a>

                    </li><?php } ?>





                <!--<li><a href="<?php echo base_url() . "/client/schedule_view"; ?>"><span class="xn-text">Schedule View</span></a></li>-->



                <?php if ($rows->fld_Messages_verified == 1) { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/messages"; ?>"><span class="xn-text">Message</span></a>

                    </li>

                <?php } else { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/no_messages"; ?>"><span class="xn-text">Message</span></a>

                    </li><?php } ?>



                <?php if ($rows->fld_Chakra_verified == 1) { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/chakra_reading"; ?>"><span class="xn-text">Chakra Reading</span></a>

                    </li>

                <?php } else { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/no_Chakra"; ?>"><span class="xn-text">Chakra Reading</span></a>

                    </li><?php } ?>



                <?php if ($rows->fld_Wheel_verified == 1) { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/lifewheel"; ?>"><span class="xn-text">Wheel of Life</span></a>

                    </li>

                <?php } else { ?>

                    <li>

                        <a href="<?php echo base_url() . "/client/no_wheel"; ?>"><span class="xn-text">Wheel of Life</span></a>

                    </li><?php } ?>



                <?php
                if ($rows->fld_Coaching_verified == 1) {

                    // if (sizeof($coaching_forms) > 0) {

                        // echo "<li class=\"xn-openable\">";

                        // echo "  <a href=\"\"><span class=\"xn-text\">Coaching Session</span></a>";

                        // echo "<ul>";

                        // foreach ($coaching_forms as $form) {

                        //     if ($form->completed_date == '')

                        //         echo "<li><a href='{$this->config->item('base_url')}//client/{$form->view_name}'>{$form->title}</a></li>";
                        // }


                        // echo "</ul>";


                        // echo "</li>";
                    // }
                } else { ?>
                    <li><a href="<?php echo base_url() . "/client/no_coaching"; ?>"><span class="xn-text">Coaching Session</span></a></li>
                <?php } ?>



                <li><a href="<?php echo base_url() . "/client/edit_profile"; ?>"><span class="xn-text">Settings</span></a></li>

                <li><a href="<?php echo base_url() . "/client/reports"; ?>">Reports</a></li>

                <li><a href="<?php echo base_url() . "/client/payment"; ?>">Payment</a></li>

                <li><a href="<?php echo base_url() . "/client/Library"; ?>">Library</a></li>
                <li><a href="<?php echo base_url() . "/client/maya"; ?>">Maya</a></li>
                <li><a href="#" class="mb-control" data-box="#mb-signout">Logout</a></li>



            </ul>

            <!-- END X-NAVIGATION -->

        </div>

        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->

        <div class="page-content">



            <!-- START X-NAVIGATION VERTICAL -->

            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">

                <li class="pull-left" style="padding:15px 10px;">Your Time:</li>

                <li class="xn-icon-button pull-right last">

                    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-power-off"></span></a>

                    <!--<ul class="xn-drop-left animated zoomIn">

                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>

                        </ul>-->

                </li>

                <li id="testimonials" class="">

                    <a href="" class="mb-control" data-box="#exampleModal">Support Your Coach! Give TESTIMONIAL</a>

                </li>

            </ul>

            <audio id="myAudio">
                <source src="horse.ogg" type="audio/ogg">
                <source src="<?= base_url('/public/audio/skype-27014.mp3') ?>" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

            <style>
                #testimonials {

                    position: relative;

                    animation-name: example;

                    animation-duration: 25s;

                    animation-timing-function: linear;

                    animation-delay: 2s;

                    animation-iteration-count: infinite;

                    animation-direction: alternate;

                }

                @keyframes example {

                    0% {
                        background-color: #00C851;
                        left: 0px;
                        top: 0px;
                    }

                    25% {
                        background-color: #007E33;
                        left: 400px;
                        top: 0px;
                    }

                    50% {
                        background-color: #007E33;
                        left: 400px;
                        top: 0px;
                    }

                    75% {
                        background-color: #00C851;
                        left: 250px;
                        top: 0px;
                    }

                    100% {
                        background-color: #00C851;
                        left: 0px;
                        top: 0px;
                    }

                }
            </style>


            <script>
                setInterval(function() {
                    update_profile();
                }, 3000);

                function update_profile() {
                    var x = document.getElementById("myAudio");
                    $.ajax({

                        url: "<?= base_url() ?>member/update_profile",

                        method: "post",

                        type: "json",

                        success: function(response) {
                            data = JSON.parse(response);
                            console.log(data.status);
                            if (data.status == 1) {
                                x.play();
                                $('#callincoming').html('<div class="alert alert-dark" style="height: 50px;line-height: 50px;padding:0px;"><a href="' + data.url + '" style="margin-right:12px;float:right;"><img src="<?= base_url('/public/img/0e475bb9b17b3fa4f94f31fba1635b8f-telephone-call-icon-logo-by-vexels.png'); ?>" alt="callend" width="30"></a><a href="<?= base_url('member/callend/') ?>/' + data.fld_id + '" style="margin-right:12px;float:right;"><img src="<?= base_url('/public/img/png-clipart-end-call-button-telephone-call-button-computer-icons-button-text-trademark.png') ?>" alt="callend" width="25"></a></div>');
                            } else {
                                $('#callincoming').html("");
                                x.pause();

                            }
                            // x.play();
                        }

                    });

                }
            </script>

            <!-- END X-NAVIGATION VERTICAL -->