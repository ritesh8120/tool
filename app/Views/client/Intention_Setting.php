<?php echo view('client/sidebar');
    $son = session();
    $session = $son->getTempdata();
?>
<style>
    .font_waight {
        color: green;
        font-weight: bold !important;
    }
</style>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo base_url() . "member"; ?>">Home</a></li>
    <li class="active">Intention Setting</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <!-- PAGE TITLE -->
    <div class="col-md-12 page-title">
        <h2>Intention Setting <a href="javascript:void(0);"><span class="fa fa-info-circle mb-control" data-box="#message-box-success"></span></a></h2>
        <div class="sub_title">
            <h6>Is your life BALANCED?</h6>
        </div>
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
                            <div class="form-group" style="margin-top:20px;">

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label for="exampleInputEmail1">Date :</label>
                                    <input type="text" class="form-control " value="<?php echo date("m/d/Y"); ?>" disabled id="date" required>

                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-12 margin-20">
                                    <label>Topic :</label>
                                    <div class="button-group">
                                        <input type="text" class="form-control" placeholder="Select Topic" data-toggle="dropdown" id="show_val" required>
                                        <!--<button type="button" class="form-control"    class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"> Select<span class="caret"></span></button>-->
                                        <ul class="dropdown-menu" id="sh_hd">
                                            <li class="show_click" style="font-size:15px;"><a href="#" class="small" tabIndex="-1"><input type="radio" class="input_radio" name="radio_select" value="physical" />&nbsp;<b>Physical</b> </a></li>
                                            <li class="show_click" style="font-size:15px;"><a href="#" class="small" tabIndex="-1"><input type="radio" class="input_radio" name="radio_select" value="emotional" />&nbsp;<b>Emotional </b>(Overall feeling towards life & environment)</a></li>
                                            <li class="show_click" style="font-size:15px;"><a href="#" class="small" tabIndex="-1"><input type="radio" class="input_radio" name="radio_select" value="mental" />&nbsp;<b>Mental </b> (Dominating thoughts on regular basis) </a></li>
                                            <li class="show_click" style="font-size:15px;"><a href="#" class="small" tabIndex="-1"><input type="radio" class="input_radio" name="radio_select" value="selfworth" />&nbsp;<b>Self Worth </b>(Self talk-performance ability) </a></li>
                                            <li class="show_click" style="font-size:15px;"><a href="#" class="small" tabIndex="-1"><input type="radio" class="input_radio" name="radio_select" value="financial" />&nbsp;<b>Financial </b></a></li>
                                            <li class="show_click" style="font-size:15px;"><a href="#" class="small" tabIndex="-1"><input type="radio" class="input_radio" name="radio_select" value="social" />&nbsp;<b>Social </b> </a></li>
                                            <li class="show_click" style="font-size:15px;"><a href="#" class="small" tabIndex="-1"><input type="radio" class="input_radio" name="radio_select" value="family" />&nbsp;<b>Family</b> (Parents, Kids, Siblings)</a></li>
                                            <li class="show_click" style="font-size:15px;"><a href="#" class="small" tabIndex="-1"><input type="radio" class="input_radio" name="radio_select" value="spouse" />&nbsp;<b>Spouse </b> (Romantic relationship)</a></li>
                                            <li class="show_click" style="font-size:15px;"><a href="#" class="small" tabIndex="-1"><input type="radio" class="input_radio" name="radio_select" value="spiritual" />&nbsp;<b>Spiritual </b> </a></li>
                                            <li class="show_click" style="font-size:15px;"><a href="#" class="small" tabIndex="-1"><input type="radio" class="input_radio" name="radio_select" value="growth" />&nbsp;<b>Growth</b> </a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group" style="margin-top:15px;">
                                <textarea id="message1" style="width: 100%" rows="3" placeholder="Write here..."></textarea>
                            </div>
                            <input type="hidden" id="message2" class="form-control" placeholder="">
                            <input type="hidden" id="message3" class="form-control" placeholder="">
                            <input type="hidden" id="message4" class="form-control" placeholder="">
                            <input type="hidden" id="message5" class="form-control" placeholder="">
                            <input type="hidden" id="message6" class="form-control" placeholder="">


                            <div>
                                <button class="btn btn-default">Clear Form</button>
                                <input type="button" name="submit" value="Submit" class="btn btn-primary pull-right" id="intention_setting_submit" />
                            </div>


                        </div>
                    </div>
                    <!-- END BASIC ELEMENTS -->
                </div>

            </div>
        </form>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->

    <!-- success -->
    <div class="message-box message-box-success animated fadeIn popup-scroll" id="message-box-success">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title">Intention Setting
                    <div class="pull-right"> <span class="fa fa-close  mb-control-close"></span></div>
                </div>
                <div class="mb-content">

                    <p> <b>Intention Setting: </b>Follow your passion. Intention gives purpose. It activates the universal energy of creation. So set it and forget it, and stay open to different possibilities. Our brain is limited and we know only certain possibilities, whereas, the universe has infinite possibilities.
                        So connect with the field and tap into the potential of your mind (the quantum field) and unleash the power of your spirit. <br /><br />

                        <b>How to use it:</b> Start out by setting up small intentions to create a belief system that the universe is working with you. You can keep on expanding your intentions and there are no limits to what you can set out the intention for. Your belief matrix is the key and the limit is in your head.
                        The system will track your intentions and a report can be generated at a later time. This allows you to make adjustments in your behavior and thinking and jot it in the gratitude journal.<br /><br />
                    </p>



                </div>
                <div class="mb-footer">
                    <!-- <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>-->
                </div>
            </div>
        </div>
    </div>
    <!-- end success -->

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
    <!-- <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/fire-0.62.min.js"></script> 
		
		
         END TEMPLATE -->



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
        })
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

    <!-- END SCRIPTS -->
    <?php echo view('client/footer'); ?>