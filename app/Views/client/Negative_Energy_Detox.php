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
    <li><a href="<?php echo base_url() . "client"; ?>">Home</a></li>
    <li class="active"><a href="#">Negative Energy Detox </a></li>
</ul>
<!-- END BREADCRUMB -->
<div class="col-md-12 page-title">
    <h2>Negative Energy Detox <a href="javascript:void(0);"><span class="fa fa-info-circle mb-control"
                data-box="#message-box-success"></span></a></h2>
    <div class="sub_title">
        <h6>Clear & Shield your energy field.</h6>
    </div>
</div>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <!-- Form Feel Video Section -->

    <div id="fire">
        <video id="videoPlay">
            <source src="<?php echo base_url() . "/public/"; ?>video/Fire.mp4" type="video/mp4">
            <source src="<?php echo base_url() . "/public/"; ?>video/Fire.mp4" type="video/ogg">
        </video>
    </div>
    <!-- End Form Feel Video Section -->

    <!-- PAGE CONTENT WRAPPER -->

    <form action="" method="post" role="form" class="form-material form-horizontal" id="submit_final_form">
        <div class="row">
            <div id="error_container"></div>
            <div class="col-md-12">

                <!-- START BASIC ELEMENTS -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group" style="margin-top:20px;">

                            <!--<div class="col-md-3">
												<label for="exampleInputEmail1">Date :</label>
													<input type="text" class="form-control datepicker" placeholder="Select Date" id="date" required>
											</div>-->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label for="exampleInputEmail1">Date :</label>
                                <input type="text" class="form-control" readonly="readonly"
                                    value="<?php echo date("m/d/Y"); ?>" placeholder="Select Date" id="date" required>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12 margin-20">
                                <label>Topic :</label>
                                <div class="button-group">
                                    <input type="text" class="form-control" placeholder="Select Topic"
                                        data-toggle="dropdown" id="show_val" required>
                                    <!--<button type="button" class="form-control"    class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"> Select<span class="caret"></span></button>-->
                                    <ul class="dropdown-menu" id="sh_hd">
                                        <li class="show_click" style="font-size:15px;"><a href="#" class="small"
                                                tabIndex="-1"><input type="radio" class="input_radio"
                                                    name="radio_select" value="physical" />&nbsp;<b>Physical</b> </a>
                                        </li>
                                        <li class="show_click" style="font-size:15px;"><a href="#" class="small"
                                                tabIndex="-1"><input type="radio" class="input_radio"
                                                    name="radio_select" value="emotional" />&nbsp;<b>Emotional
                                                </b>(Overall feeling towards life & environment)</a></li>
                                        <li class="show_click" style="font-size:15px;"><a href="#" class="small"
                                                tabIndex="-1"><input type="radio" class="input_radio"
                                                    name="radio_select" value="mental" />&nbsp;<b>Mental </b>
                                                (Dominating thoughts on regular basis) </a></li>
                                        <li class="show_click" style="font-size:15px;"><a href="#" class="small"
                                                tabIndex="-1"><input type="radio" class="input_radio"
                                                    name="radio_select" value="selfworth" />&nbsp;<b>Self Worth
                                                </b>(Self talk-performance ability) </a></li>
                                        <li class="show_click" style="font-size:15px;"><a href="#" class="small"
                                                tabIndex="-1"><input type="radio" class="input_radio"
                                                    name="radio_select" value="financial" />&nbsp;<b>Financial </b></a>
                                        </li>
                                        <li class="show_click" style="font-size:15px;"><a href="#" class="small"
                                                tabIndex="-1"><input type="radio" class="input_radio"
                                                    name="radio_select" value="social" />&nbsp;<b>Social </b> </a></li>
                                        <li class="show_click" style="font-size:15px;"><a href="#" class="small"
                                                tabIndex="-1"><input type="radio" class="input_radio"
                                                    name="radio_select" value="family" />&nbsp;<b>Family</b> (Parents,
                                                Kids, Siblings)</a></li>
                                        <li class="show_click" style="font-size:15px;"><a href="#" class="small"
                                                tabIndex="-1"><input type="radio" class="input_radio"
                                                    name="radio_select" value="spouse" />&nbsp;<b>Spouse </b> (Romantic
                                                relationship)</a></li>
                                        <li class="show_click" style="font-size:15px;"><a href="#" class="small"
                                                tabIndex="-1"><input type="radio" class="input_radio"
                                                    name="radio_select" value="spiritual" />&nbsp;<b>Spiritual </b> </a>
                                        </li>
                                        <li class="show_click" style="font-size:15px;"><a href="#" class="small"
                                                tabIndex="-1"><input type="radio" class="input_radio"
                                                    name="radio_select" value="growth" />&nbsp;<b>Growth</b> </a></li>
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
                            <input type="button" name="submit" value="Submit" class="btn btn-primary pull-right"
                                id="final_submit_energy" />
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
            <div class="mb-title">Negative Energy Detox <div class="pull-right"> <span
                        class="fa fa-close  mb-control-close"></span></div>
            </div>
            <div class="mb-content">

                <p> <b>Negative Energy Detox: </b>Thoughts are energy. The negative thoughts are very heavy and dense
                    and they constipate our energy field. When the energy field is stagnated we feel stress, worry,
                    anxiety and depression.
                    If the stagnated energy is not released it will manifest as psychosomatic disease such as aches and
                    pains in the body. The best way to release this energy is to identify the emotion as well as the
                    area it is affecting and push it out of the mental & emotional field.
                    You can do this by following a simple ritual as follows:<br /><br /> </p>

                <ul class="number">
                    <li>Choose the topic of concern. The application will track the daily focus and you can pull it up
                        in a report at a later date.</li>
                    <li>Bring the thought that is creating the negative feeling, while feeling the emotions in the part
                        of the body and while doing this go ahead and write down the experience in journal. Imagine you
                        are seeing the experience on the mental screen and jot down all details.
                        By thinking, feeling and writing we push the thought out of our mental, emotional and physical
                        field.</li>
                    <li>After you have completed the exercise press the submit button and experience the flush and see
                        it disiappitates. The application also tracks your thought pattern which will allow you to
                        understand where most of your energy is being spent. The mind needs rituals to know that the
                        activity has worked</li>
                    <li>After you clear your own negative energy, anxiety, worry and strong emotions, do simple
                        breathing and meditation exercise and visualize a while light starting at the third eye chakra
                        and enveloping your whole body. This visualization will shield & protect you from other people's
                        negative energy broadcast.</li>


                    <!--<ul class="square">
                                   <li>Find out what your  self-limiting beliefs are</li>
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
                                    </ul>-->
            </div>
            <div class="mb-footer">
                <!--                                    <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>-->
            </div>
        </div>
    </div>
</div>
<!-- end success -->


<!-- START PLUGINS -->

<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap.min.js">
</script>
<!-- END PLUGINS -->
<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src="<?php echo base_url() . "/public/"; ?>js/plugins/icheck/icheck.min.js"></script>
<script type="text/javascript"
    src="<?php echo base_url() . "/public/"; ?>js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-datepicker.js">
</script>
<script type="text/javascript"
    src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-colorpicker.js">
</script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-file-input.js">
</script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-select.js">
</script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/tagsinput/jquery.tagsinput.min.js">
</script>

<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->

<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/actions.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/fire-0.62.min.js"></script> -->


<!-- END TEMPLATE -->



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

<?php echo view('client/footer');
?>