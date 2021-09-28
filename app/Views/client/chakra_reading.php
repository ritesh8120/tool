<?php
require_once FCPATH . '/vendor/autoload.php';
 echo view('client/sidebar');
$son = session();
$session = $son->getTempdata();
$user_id = $session['user_id'];
$db      = \Config\Database::connect();
$coach = $db->table('users')->where(array('fld_id' => $session["user_id"]))->get();
// $coach = $this->db->get_where('users', array('fld_id' => $session["user_id"]));
if ($coach->getNumRows() > 0) {
    $row = $coach->getRowArray();

    $coachName = $row["fld_username"] . " " . $row["fld_last_name"];
    $coachemail = $row["fld_email"];
    $coachsparent_id = $row["fld_parent"];
}

$admin =
$db->table('users')->where(array('fld_id' => $coachsparent_id))->get();
if ($admin->getNumRows() > 0) {
    $row = $admin->getRowArray();

    $adminName = $row["fld_username"] . " " . $row["fld_last_name"];
    $adminemail = $row["fld_email"];
}

$error       = false;
$ds          = DIRECTORY_SEPARATOR;
$storeFolder = 'assets/uploads/chakra-reading/';
$ProcessedstoreFolder = 'assets/uploads/admin_upload_chakra_reading/';
$is_blank = true;
$iname = array();
if (isset($_POST['submit'])) {

    if (!empty($_FILES['filename'])) {

        for ($i = 0; $i <= 8; $i++) {

            if ($_FILES['filename']['name'][$i] != '') {

                $is_blank = false;
            }
        }

        if (!$is_blank) {
            foreach ($_FILES["filename"]["name"] as $key => $name) {
                $tmp_name = $_FILES["filename"]["tmp_name"][$key];
                $names = rand() . $name;
                $iname[] = $names;
                $targetPath = FCPATH . $storeFolder . $ds;
                $targetFile =  $targetPath . $names;

                $info = getimagesize($tmp_name);

                if ($info['mime'] == 'image/jpeg') {
                    $image = imagecreatefromjpeg($tmp_name);
                } elseif ($info['mime'] == 'image/gif') {
                    $image = imagecreatefromgif($tmp_name);
                } elseif ($info['mime'] == 'image/png') {
                    $image = imagecreatefrompng($tmp_name);
                }

                imagejpeg($image, $targetFile, 60);
                // move_uploaded_file($tmp_name,$targetFile);
            }

            $insetImage = array(
                'fld_user_id' => $session['user_id'],
                'fld_image1'  => $iname[0],
                'fld_image2'  => $iname[1],
                'fld_image3'  => $iname[2],
                'fld_image4'  => $iname[3],
                'fld_image5'  => $iname[4],
                'fld_image6'  => $iname[5],
                'fld_image7'  => $iname[6],
                'fld_image8'  => $iname[7],
                'fld_image9'  => $iname[8],
                'fld_added_date' => time()
            );

            $builder = $this->db->table('chakra_reading');
            $builder->insert($insetImage);
            // $submit = $this->db->insert('chakra_reading', $insetImage);

            if ($builder->db->affected_rows()) {
                // $CI = &get_instance();
                // $CI->load->helper("functions");
                // $to = $CI->Common_model->get_yogi_emailId($session["user_id"]);

                // $email_html = '<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><meta name="GENERATOR" content="MSHTML 11.00.10570.1001"></head><body bgcolor="#ffffff"><strong></strong><strong> </strong><strong></strong><table width="600" align="center" id="TbHeader" bgcolor="#400080" border="0" cellspacing="0" cellpadding="4"><tr><td align="center" id="TdHeader" bgcolor="#400080"><p align="center"><font color="#ffffff" face="Arial, Helvetica, sans-serif" size="6"><strong>Welcome</strong></font></p></td></tr></table><table width="600" align="center" id="TbBodyRow" border="0" cellspacing="0" cellpadding="0"><tr><td id="TdBodyRow" valign="top" bgcolor="#ffffff"><table width="100%" id="TbBody" bgcolor="#ffffff" border="0" cellspacing="0" cellpadding="4"><tr><td align="center" id="TdBody" bgcolor="#ffffff">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p align="left"><font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="3"><strong>Hi ' . $adminName . '&nbsp;<font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="3">&nbsp;</font></strong></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p align="justify" style="margin-right: 0px;"><font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="3"> This is an auto-generated email to notify you that your client ' . $session["username"] . ' has uploaded Chakra images on MyportalX.&nbsp;<br><br>Please check them out and if they are okay, please forward them to admin for processing.</font></p><br></font></font></font></p><p align="left"><br></p></td></tr></table></td></tr></table><strong></strong><strong></strong><strong> </strong><table width="600" align="center" id="TbFooter" bgcolor="#eea000" border="0" cellspacing="0" cellpadding="4"><tr><td align="center" id="TdFooter" bgcolor="#eea000"><div style="margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);"><div style="margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);"><span style="color: rgb(0, 52, 89); line-height: inherit; font-size: inherit; font-weight: bold; text-decoration: inherit;"><span style="color: rgb(0, 52, 89); line-height: inherit; font-family: arial; font-size: inherit; font-style: normal; font-weight: inherit; text-decoration: inherit;"><br></span></span></div><div style="margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);"><span style="color: rgb(0, 52, 89); line-height: inherit; font-size: inherit; font-weight: bold; text-decoration: inherit;"><span style="color: rgb(0, 52, 89); line-height: inherit; font-family: arial; font-size: inherit; font-style: normal; font-weight: inherit; text-decoration: inherit;">Regards,</span><br style="color: rgb(0, 52, 89);"></span></div><div style="margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);"><span style="color: rgb(0, 52, 89); line-height: inherit; font-family: arial; font-size: inherit; font-style: normal; font-weight: bold; text-decoration: inherit;">Team MyportalX</span></div><div style="margin: 0px; padding: 0px; text-align: center; color: rgb(0, 52, 89);"><span style="color: rgb(0, 52, 89); line-height: inherit; font-family: arial; font-size: inherit; font-style: normal; font-weight: bold; text-decoration: inherit;"><br></span></div></div></td></tr></table></body>';
                // $subject = "Chakra Image Uploaded";
                // $adminEmail = get_AdminEmailID();
                // send_mail($to, $subject, $email_html, "", $adminEmail);

                $notic = array(
                    'sender_id' => $session["user_id"],
                    'reciver_id' => $coachsparent_id,
                    'message' => 'your client ' . $session["username"] . ' has uploaded Chakra images',
                    'urls' => "chakra_reading/" . $session["user_id"],
                    'fld_date' => time()
                );
                $builder = $this->db->table('notification');
                $builder->insert($notic);

                // $sid = "ACf591051c23732a4f187afc9949e30847"; // Your Account SID from www.twilio.com/console
                // $token = "ce26f21975001bf7a320dc06436f1ab9"; // Your Auth Token from www.twilio.com/console

                // $client = new Twilio\Rest\Client($sid, $token);
                // $message = $client->messages->create(
                //     '+919926496998', // Text this number
                //     array(
                //         'from' => '+12677991482', // From a valid Twilio number
                //         'body' => $subject
                //     )
                // );
                //$CI->sms->send('+13232068559', $subject);

                echo "<div class=\"alert alert-success text-center\"><strong>Chakra Images submitted successfully. You’ll receive a email/notification when the admin sends you the processed images.</strong>.<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a></div>";
            }
        } else {
            echo '<div class="alert alert-danger">Please uplaod atleast one image</div>';
        }
    } else {

        echo '<div class="alert alert-danger">How did you do that?O_o</div>';
    }
}

$imagePath = 'assets/uploads/chakra-reading/';



$defaultImages['fld_image1'] = $imagePath . 'chakra_img01.jpg';

$defaultImages['fld_image2'] = $imagePath . 'chakra_img02.jpg';

$defaultImages['fld_image3'] = $imagePath . 'chakra_img03.jpg';

$defaultImages['fld_image4'] = $imagePath . 'chakra_img04.jpg';

$defaultImages['fld_image5'] = $imagePath . 'chakra_img05.jpg';

$defaultImages['fld_image6'] = $imagePath . 'chakra_img06.jpg';

$defaultImages['fld_image7'] = $imagePath . 'chakra_img07.jpg';

$defaultImages['fld_image8'] = $imagePath . 'chakra_img08.jpg';

$defaultImages['fld_image9'] = $imagePath . 'chakra_img09.jpg';

//get last process images uploaded by admin

// $processedImages = $db->table('client_chakra_reading')->orderby('fld_id', 'desc')->limit(1)->where(array('fld_user_id' => $session['user_id']))->get()->getRowArray();
// if ($processedImages->getSize() > 0){
//     $processedImages = $processedImages[0];
// }
// //get last procssed images upload by User
// $userUploadedImages = $db->table('chakra_reading')->orderby('fld_id', 'desc')->limit(1)->where(array('fld_user_id' => $session['user_id']))->get()->getRowArray();
// if ($userUploadedImages->getSize() > 0){
//     $userUploadedImages = $userUploadedImages[0];
// }
// if ($processedImages['fld_added_date'] > $userUploadedImages['fld_added_date'] || sizeof($userUploadedImages) == 0) {
//     $imagePath = '';
//     $uploadedImages = $processedImages;
// } else 
// {
//     $uploadedImages = $userUploadedImages;
// }

// for ($idx = 1; $idx <= 9; $idx++) {
//     if ($uploadedImages['fld_image' . $idx] == ''){
//         $uploadedImages['fld_image' . $idx] = $defaultImages['fld_image' . $idx];
//     }else
//     {
//         $uploadedImages['fld_image' . $idx] =  $imagePath . $uploadedImages['fld_image' . $idx];
//     }
// }
?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">

    <li><a href="<?php echo base_url() . '/client';  ?>">Home</a></li>

    <li class="active"><a href="#">Chakra Reading</a></li>



</ul>

<!-- END BREADCRUMB -->



<!-- PAGE CONTENT WRAPPER -->

<div class="page-content-wrap">



    <!-- PAGE TITLE -->

    <div class="page-title">

        <h2>Chakra Reading <a href="javascript:void(0);"><span class="fa fa-info-circle mb-control" data-box="#message-box-success"></span></a></h2>



    </div>

    <!-- END PAGE TITLE -->



    <!-- PAGE CONTENT WRAPPER -->

    <div class="page-content-wrap">
        <?php 
        // if ($processedImages['fld_added_date'] > $userUploadedImages['fld_added_date'] || sizeof($userUploadedImages) == 0) { 
            ?>
            <style>
                label {
                    /*font-size: 1.25em;*/
                    /*font-weight: 700;*/
                    color: white;
                    background-color: #00B74A;
                    display: inline-block;
                    padding: 4px 10px;
                    font-size: 12px;
                    padding: 4px 10px;
                    line-height: 20px;
                    font-weight: 400;
                    border-radius: 5px;
                }

                .fileinput:focus+label,
                .fileinput+label:hover {
                    background-color: #00E676;
                }

                label {
                    cursor: pointer;
                    /* "hand" cursor */
                }

                .form-group img {
                    width: 200px;
                    height: 150px;
                }

                input[type=file] {
                    display: none;
                }
            </style>
            <form role="form" action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <!-- START BASIC ELEMENTS -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p> <b>Chakra reading : </b>Your body communicates with you. The chakras are the energy centers in your body. There are 7 major and 69 minor chakras that communicate via the energy system of the sub conscious mind. Our chakra imaging and report system will provide you an accurate report of what is going on in the sub-conscious mind. Upon healing and clearing a particular area of the life the energy will change color.
                                            This is a very powerful tool to provide visual evidence to yourself or your clients about the changes in the sub-conscious mind.<br /><br />
                                            <b>How to use it :</b> Precisely follow the picture taking instructions. The quality of the images, the background, lighting and the clothing are necessary for the correct reports. The reports are based on the quality of the picture and it is the client/coach responsibility to provide the images with correct specification. A processing fee is charged with each submission.
                                            The fee is non-refundable and non transferable and will be charged to the credit card on account. <br /><br />
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/GRv_R-KTaIY?rel=0&amp;showinfo=0&autoplay=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                               <div class="form-group gallery">
                                    <div class="col-md-3 col-xs-12 gallery-item" style="padding:5px;">
                                        <div id="preview10"><img src="<?php echo $uploadedImages['fld_image1']; ?>" alt="BACK"></div> <input type="file" class="fileinput10" name="filename[]" id="filename10" /><label for="filename10">Choose a file</label> <a href="<?php echo $uploadedImages['fld_image1']; ?>" class="btn btn-info" download>Download</a><span class="help-block">BACK</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-xs-12 gallery-item" style="padding:5px;">
                                        <div id="preview11"><img src="<?php echo $uploadedImages['fld_image2']; ?>" alt="FRONT: LONG"></div> <input type="file" class="fileinput11" name="filename[]" id="filename11" /><label for="filename11">Choose a file</label> <a href="<?php echo $uploadedImages['fld_image2']; ?>" class="btn btn-info" download>Download</a> <span class="help-block">FRONT: LONG</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-xs-12 gallery-item" style="padding:5px;">
                                        <div id="preview12"><img src="<?php echo $uploadedImages['fld_image3']; ?>" alt="FRONT: SHORT"></div> <input type="file" class="fileinput12" name="filename[]" id="filename12" /><label for="filename12">Choose a file</label> <a href="<?php echo $uploadedImages['fld_image3']; ?>" class="btn btn-info" download>Download</a><span class="help-block">FRONT: SHORT</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-xs-12 gallery-item" style="padding:5px;">
                                        <div id="preview13"><img src="<?php echo $uploadedImages['fld_image4']; ?>" alt="LEFT PROFILE"></div> <input type="file" class="fileinput13" name="filename[]" id="filename13" /><label for="filename13">Choose a file</label> <a href="<?php echo $uploadedImages['fld_image4']; ?>" class="btn btn-info" download>Download</a> <span class="help-block">LEFT PROFILE</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-xs-12 gallery-item" style="padding:5px;">
                                        <div id="preview14"><img src="<?php echo $uploadedImages['fld_image5']; ?>" alt="RIGHT PROFILE"></div> <input type="file" class="fileinput14" name="filename[]" id="filename14" /><label for="filename14">Choose a file</label> <a href="<?php echo $uploadedImages['fld_image5']; ?>" class="btn btn-info" download>Download</a> <span class="help-block">RIGHT PROFILE</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-xs-12 gallery-item" style="padding:5px;">
                                        <div id="preview15"><img src="<?php echo $uploadedImages['fld_image6']; ?>" alt="RIGHT HAND"></div> <input type="file" class="fileinput15" name="filename[]" id="filename15" /><label for="filename15">Choose a file</label> <a href="<?php echo $uploadedImages['fld_image6']; ?>" class="btn btn-info" download>Download</a> <span class="help-block">RIGHT HAND</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-xs-12 gallery-item" style="padding:5px;">
                                        <div id="preview16"><img src="<?php echo $uploadedImages['fld_image7']; ?>" alt="LEFT HAND"></div> <input type="file" class="fileinput16" name="filename[]" id="filename16" /><label for="filename16">Choose a file</label> <a href="<?php echo $uploadedImages['fld_image7']; ?>" class="btn btn-info" download>Download</a> <span class="help-block">LEFT HAND</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-xs-12 gallery-item" style="padding:5px;">
                                        <div id="preview17"><img src="<?php echo $uploadedImages['fld_image8']; ?>" alt="LEG FRONT"></div> <input type="file" class="fileinput17" name="filename[]" id="filename17" /><label for="filename17">Choose a file</label> <a href="<?php echo $uploadedImages['fld_image8']; ?>" class="btn btn-info" download>Download</a> <span class="help-block">LEG FRONT</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-xs-12 gallery-item" style="padding:5px;">
                                        <div id="preview18"><img src="<?php echo $uploadedImages['fld_image9']; ?>" alt="LEG BACK"></div> <input type="file" class="fileinput18" name="filename[]" id="filename18" /><label for="filename18">Choose a file</label> <a href="<?php echo $uploadedImages['fld_image9']; ?>" class="btn btn-info" download>Download</a> <span class="help-block">LEG BACK</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-default">Clear Form</button>
                                    <input type="submit" name="submit" value="submit" class="btn btn-primary pull-right" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END BASIC ELEMENTS -->
                </div>
            </form>
            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var img = $('<img />').attr('src', e.target.result);
                            $('#preview10').empty().append(img);
                            //   $().attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]); // convert to base64 string
                    }
                }

                $("#fileinput10").change(function() {
                    readURL(this);
                })
            </script>

        <?php
    //  } else {
          ?>
            <!-- <form role="form" action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row">
                    <div class="col-md-12"> -->
                        <!-- START BASIC ELEMENTS -->
                        <!-- <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p> <b>Chakra reading : </b>Your body communicates with you. The chakras are the energy centers in your body. There are 7 major and 69 minor chakras that communicate via the energy system of the sub conscious mind. Our chakra imaging and report system will provide you an accurate report of what is going on in the sub-conscious mind. Upon healing and clearing a particular area of the life the energy will change color.
                                            This is a very powerful tool to provide visual evidence to yourself or your clients about the changes in the sub-conscious mind.<br /><br />
                                            <b>How to use it :</b> Precisely follow the picture taking instructions. The quality of the images, the background, lighting and the clothing are necessary for the correct reports. The reports are based on the quality of the picture and it is the client/coach responsibility to provide the images with correct specification. A processing fee is charged with each submission.
                                            The fee is non-refundable and non transferable and will be charged to the credit card on account. <br /><br />
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/GRv_R-KTaIY?rel=0&amp;showinfo=0&autoplay=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                               </div>
                               <div class="form-group gallery">
                                    <div class="col-md-3 col-sm-4 col-xs-12 gallery-item" style="padding:5px;">
                                        <div id="preview1"><img src="<?= base_url() ?>/assets/uploads/chakra-reading/chakra_img01.jpg" alt="BACK"></div> <input type="file" class="fileinput1" name="filename[]" id="filename1 " /> <span class="help-block">BACK</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12 gallery-item" style="padding:5px;">
                                        <div id="preview2"><img src="<?= base_url() ?>/assets/uploads/chakra-reading/chakra_img02.jpg" alt="FRONT: LONG"></div> <input type="file" class="fileinput2" name="filename[]" id="filename2 " /> <span class="help-block">FRONT: LONG</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12" style="padding:5px;">
                                        <div id="preview3"><img src="<?= base_url() ?>/assets/uploads/chakra-reading/chakra_img03.jpg" alt="FRONT: SHORT"></div> <input type="file" class="fileinput3" name="filename[]" id="filename3 " /> <span class="help-block">FRONT: SHORT</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12" style="padding:5px;">
                                        <div id="preview4"><img src="<?= base_url() ?>/assets/uploads/chakra-reading/chakra_img04.jpg" alt="LEFT PROFILE"> </div><input type="file" class="fileinput4" name="filename[]" id="filename4 " /> <span class="help-block">LEFT PROFILE</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12" style="padding:5px;">
                                        <div id="preview5"><img src="<?= base_url() ?>/assets/uploads/chakra-reading/chakra_img05.jpg" alt="RIGHT PROFILE"></div> <input type="file" class="fileinput5" name="filename[]" id="filename5 " /> <span class="help-block">RIGHT PROFILE</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12" style="padding:5px;">
                                        <div id="preview6"><img src="<?= base_url() ?>/assets/uploads/chakra-reading/chakra_img06.jpg" alt="RIGHT HAND"></div> <input type="file" class="fileinput6" name="filename[]" id="filename6 " /> <span class="help-block">RIGHT HAND</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12" style="padding:5px;">
                                        <div id="preview7"><img src="<?= base_url() ?>/assets/uploads/chakra-reading/chakra_img07.jpg" alt="LEFT HAND"></div> <input type="file" class="fileinput7" name="filename[]" id="filename7 " /> <span class="help-block">LEFT HAND</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12" style="padding:5px;">
                                        <div id="preview8"><img src="<?= base_url() ?>/assets/uploads/chakra-reading/chakra_img08.jpg" alt="LEG FRONT"> </div><input type="file" class="fileinput8" name="filename[]" id="filename8 " /> <span class="help-block">LEG FRONT</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12" style="padding:5px;">
                                        <div id="preview9"><img src="<?= base_url() ?>/assets/uploads/chakra-reading/chakra_img09.jpg" alt="LEG BACK"></div> <input type="file" class="fileinput9" name="filename[]" id="filename9 " /> <span class="help-block">LEG BACK</span>
                                        <div class="form-group-separated"></div>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-default">Clear Form</button>
                                    <input type="submit" name="submit" value="submit" class="btn btn-primary pull-right" />
                                </div>
                           </div>
                        </div>
                    </div> -->
                    <!-- END BASIC ELEMENTS -->
                <!-- </div>
            </form> -->
        <?php 
        // }
         ?>

    </div>

    <!-- END PAGE CONTENT WRAPPER -->

</div>

<!-- END PAGE CONTENT WRAPPER -->



<!-- END PRELOADS -->



<!-- success -->

<div class="message-box message-box-success animated fadeIn popup-scroll" id="message-box-success">

    <div class="mb-container">

        <div class="mb-middle">

            <div class="mb-title">Chakra reading

                <div class="pull-right"> <span class="fa fa-close  mb-control-close"></span></div>

            </div>

            <div class="mb-content">



                <p> <b>Chakra reading: </b>Your body communicates with you. The chakras are the energy centers in your body. There are 7 major and 69 minor chakras that communicate via the energy system of the sub conscious mind. Our chakra imaging and report system will provide you an accurate report of what is going on in the sub-conscious mind. Upon healing and clearing a particular area of the life the energy will change color.

                    This is a very powerful tool to provide visual evidence to yourself or your clients about the changes in the sub-conscious mind.<br /><br />

                    <b>How to use it:</b> Precisely follow the picture taking instructions. The quality of the images, the background, lighting and the clothing are necessary for the correct reports. The reports are based on the quality of the picture and it is the client/coach responsibility to provide the images with correct specification. A processing fee is charged with each submission.

                    The fee is non-refundable and non transferable and will be charged to the credit card on account. <br /><br />

                    <b>Instructions:</b><br /><br />
                </p>



                <ul class="number">

                    <li>Make sure the room is dimly lit and minimal light on the client. </li>

                    <li>The client should be as close to the wall as possible. ( about 6 inches away- no shadows)</li>

                    <li>The background has to be white. ( You can use a projector screen)</li>

                    <li>The camera person should be directly in front, about 6-8 feet away from the client.</li>

                    <li>Use the close-up & wide shot button to find the right frame ( 1 feet on top and 3-4 feet on the side).</li>

                    <li>Jewelry & accessories like watch and glasses should be removed and long hair should be tied.</li>

                    <li>Collar should be tucked in and sleeves should be rolled. The foot, ankle, calves & up to the knees should be visible.</li>

                    <li>Watch the video to get precise instructions.</li>

                </ul>

            </div>

            <div class="mb-footer">

                <!-- <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>-->

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



<!-- END TEMPLATE -->

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

<!-- END SCRIPTS -->

<?php echo view('client/footer');

?>