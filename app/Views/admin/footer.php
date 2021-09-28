<?php
    $son = session();
    $session = $son->getTempdata();
?>
</div>
<!-- END PAGE CONTENT -->
</div>
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <!--<a href="../pages-login.html" class="btn btn-success btn-lg">Yes</a>-->
                    <a href="#" id="get_logout" username="<?php echo $session['username']; ?>" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->
<script>
    $(document).ready(function() {
        setInterval(function() {
            update_profile();
        }, 3000);

        function update_profile() {
            $.ajax({
                url: home_url + '/admin/update_profile',
                method: "post",
                type: "text",
                success: function(data) {

                }
            });
        }
    });
</script>

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<input type="hidden" id="home_url" value="<?php echo base_url(); ?>">

<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/image-preview/imagepreview.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/image-preview/imagepreview-custom.js"></script>
<!-- END TEMPLATE -->

<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src='<?php echo base_url() . "/public/"; ?>js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/rickshaw/d3.v3.js"></script>
<script type='text/javascript' src='<?php echo base_url() . "/public/"; ?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='<?php echo base_url() . "/public/"; ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
<script type='text/javascript' src='<?php echo base_url() . "/public/"; ?>js/plugins/bootstrap/bootstrap-datepicker.js'></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/owl/owl.carousel.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins/daterangepicker/daterangepicker.js"></script>
<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->


<!-- <script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/plugins.js"></script>       -->
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/actions.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/fast-buddy-n.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "/public/"; ?>js/fast-buddy.js"></script>

<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
</body>

</html>