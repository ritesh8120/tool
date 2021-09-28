<?php echo view('client/sidebar');
$son = session();
$session = $son->getTempdata();
$user_id = $session['user_id'];
$db      = \Config\Database::connect();
?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo base_url() . "client"; ?>">Home</a></li>
    <li class="active">Library</li>
</ul>
<!-- END BREADCRUMB -->
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <h1>Library</h1>
    <div class="panel panel-default">
        <div class="row" style="padding:20px;">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-6 col-xl-6">
                            <h4 class="header-title m-b-30">My Files</h4>
                        </div>
                    </div>
                    <div class="row">

                        <?php
                        $userData = $db->table('library')->where(array('client_id' => $user_id))->get();
                        $files = '';
                        foreach ($userData->getResult() as $ListRow) {
                            $file = $ListRow->folder_name;
                            $data = explode(".", $file);
                            $extension = $data[1];
                            switch ($extension) {
                                case "zip":
                                    $paths = "https://coderthemes.com/highdmin/layouts/assets/images/file_icons/zip.svg";
                                    break;
                                case "pdf":
                                    $paths = "https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg";
                                    break;
                                case "txt":
                                    $paths = "https://coderthemes.com/highdmin/layouts/assets/images/file_icons/txt.svg";
                                    break;
                                default:
                                    $paths = base_url('library/' . $file);
                            }
                            $data = explode("/", $file);
                            $extension = $data[1];
                        ?>
                            <div class="col-lg-1 col-xl-2 card" style="background: #f2f2f2;padding: 10px 30px;border-radius: 10px; margin: 5px; color: #000; width:180px;height:150px;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">
                                <div class="file-man-box"><img src="<?= $paths ?>" alt="icon" width="100" height="100"> <?php echo $extension ?> </div>
                                <center><a href="<?= base_url('library/' . $file) ?>" class="file-download" style="color:#000" download><i class="fa fa-download"></i></a></center>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START PLUGINS -->

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/jquery/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/bootstrap/bootstrap.min.js"></script>

<!-- END PLUGINS -->



<!-- START THIS PAGE PLUGINS-->

<script type='text/javascript' src='<?php echo base_url() . "assets/"; ?>js/plugins/icheck/icheck.min.js'></script>

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>



<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/bootstrap/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/bootstrap/bootstrap-colorpicker.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/bootstrap/bootstrap-file-input.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/bootstrap/bootstrap-select.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/tagsinput/jquery.tagsinput.min.js"></script>

<!-- END THIS PAGE PLUGINS-->



<!-- START TEMPLATE -->





<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/actions.js"></script>



<!-- INPUT IMAGE UPLOAD VIEW -->

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/image-preview/imagepreview.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>js/plugins/image-preview/imagepreview-custom.js"></script>

<!-- INPUT IMAGE UPLOAD VIEW END -->
<?php echo view('client/footer'); ?>