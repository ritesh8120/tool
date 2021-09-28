<?php
    echo view('client/sidebar');
    $son = session();
    $session = $son->getTempdata();
    $user_id = $session['user_id'];
    $db      = \Config\Database::connect();
    $getDatas = $db->table('users')->where(array('fld_id' => $user_id))->get();

$rows = $getDatas->getRowArray();

$membersparent_id = $rows['fld_parent'];
$coach = $db->table('users')->where(array('fld_id' => $membersparent_id))->get();
if ($coach->getNumRows() > 0) {
    $row = $coach->getRowArray();

    $coachName = $row["fld_first_name"] . " " . $row["fld_last_name"];
    $coachemail = $row["fld_email"];
    $coach_form = $row['fld_cform'];
}
?>
<style>
    .font_waight {
        color: green;
        font-weight: bold !important;
    }
</style>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo base_url() . "client"; ?>">Home</a></li>
    <li class="active">Coaching Session</li>
</ul>
<!-- END BREADCRUMB -->
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <!-- PAGE TITLE -->
    <div class="col-md-12 page-title">
        <h2>Coaching Session <a href="javascript:void(0);"><span class="fa fa-info-circle mb-control" data-box="#message-box-success"></span></a></h2>
    </div>
    <div id="fire">
        <video id="videoPlay">
            <source src="<?php echo base_url() . "/public/"; ?>video/starburst.mp4" type="video/mp4">
            <source src="<?php echo base_url() . "/public/"; ?>video/starburst.mp4" type="video/ogg">
        </video>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <form action="" method="post" role="form" class="form-material form-horizontal" id="submit_final_form">
            <div class="row">
                <div id="error_container"></div>
                <div class="col-md-12">
                    <!-- START BASIC ELEMENTS -->
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <?php
                            // print_r($coaching_forms);
                            if (sizeof($coaching_forms) > 0) {
                                echo "<table class='table'>";
                                foreach ($coaching_forms as $form) {
                                    if ($form->completed_date == '')
                                        echo "<tr><td><a href='".base_url("/member/".$form->view_name)."'> &rarr; {$form->title}</a></td></tr>";
                                }
                                echo "</table>";
                            }
                            ?>
                            <?php
                            // if ($rows->fld_marketing == '1' && $coach_form == '1') {
                                if (sizeof($marketing_forms) > 0) {
                                    echo "<table class='table'>";
                                    foreach ($marketing_forms as $form) {
                                        if ($form->completed_date == '')
                                            echo "<tr><td><a href='{base_url()}/member/{$form->view_name}'> &rarr; {$form->title}</a></td></tr>";
                                    }
                                    echo "</table>";
                                }
                            // } else {
                            // }
                            ?>

                        </div>
                    </div>
                    <!-- END BASIC ELEMENTS -->
                </div>

            </div>
        </form>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    <!-- START PLUGINS -->
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
<script>
    $('#date').on('changeDate', function(ev) {
        $(this).datepicker('hide');
    });

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
<script>
    var date = new Date();
    date.setDate(date.getDate());

    $('.datepicker').datepicker({
        startDate: date
    });
</script>
<style>
    #videoPlay {
        position: absolute;
        left: -34%;
        top: 0px;
        width: 170%;
        height: 100%;
        z-index: 10;
        display: none;
        overflow: visible !important;
    }
</style>
<script>
    var options = [];

    $('.dropdown-menu a').on('click', function(event) {

        var $target = $(event.currentTarget),
            val = $target.attr('data-value'),
            $inp = $target.find('input'),
            idx;
        options.push(val);
        setTimeout(function() {
            $inp.prop('checked', true)
        }, 0);
        $('#show_val').val($inp.attr('value'));
        $('#show_val').dropdown - menu('hide');
        $(event.target).blur();

        console.log(options);
        return false;
    });
</script>
<?php echo view('client/footer'); ?>