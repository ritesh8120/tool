 <?php
    echo view('site/header');
    ?>
 <style>
     #otp_box {
         display: none;
     }

     #otp_success {
         display: none;
     }
 </style>
 <!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
     <div class="row">
         <div class="col-md-12">
             <div class="panel panel-default">
                 <div class="panel-body">
                     <div class="row">
                         <div class="col-md-6"></div>
                         <div class="col-md-5 col-lg-offset-1"><strong>
                                 <span id="error_msg" style="color:red"></span>
                             </strong></div>
                     </div>


                     <div class="row" style="padding-top:0px;">

                         <div class="col-md-6">
                             <img src="<?php echo base_url() . "/public/"; ?>img/portal3Dbox.png" class="img-responsive" style="padding-left:50px; padding-top:20px;">
                         </div>
                         <!-- step 1 -->
                         <div class="col-md-6" id="hide_div">
                             <div class="registration-container">
                                 <div class="registration-box animated fadeInDown">

                                     <div class="registration-body">
                                         <div class="registration-title"><strong>Registration</strong>, use form below</div>

                                         <form action="#" class="form-horizontal" method="post" id="jvalidate" role="form" autocomplete="off">

                                             <!--<h4>Personal info</h4>-->
                                             <div class=" form-group">
                                                 <div class="col-md-12">
                                                     <input type="text" name="first_name" class="form-control" placeholder="Name *" value="<?php echo $first_name; ?>" maxlength="50" required />
                                                 </div>
                                             </div>

                                             <div class="form-group">
                                                 <div class="col-md-12">
                                                     <input type="email" name="email" class="form-control" placeholder="E-mail *" value="<?php echo $email; ?>" required />
                                                 </div>
                                             </div>
                                             <div class="form-group">
                                                 <div class="col-md-12">
                                                     <input type="password" name="password" id="password" class="form-control" placeholder="Password *" autocomplete="off" value="<?php echo $password; ?>" max="40" required />
                                                 </div>
                                             </div>
                                             <div class="form-group">
                                                 <div class="col-md-12">
                                                     <input type="password" name="confirm_password" id="confirm_password" class="form-control" autocomplete="off" placeholder="Confirm Password *" value="<?php echo $confirm_password; ?>" max="40" required />
                                                 </div>
                                             </div>
                                             <div class="form-group push-up-30">

                                                 <div class="col-md-6">
                                                     <input type="submit" name="submit" id="step_first" class="btn btn-danger btn-block" value="Sign Up" />
                                                 </div>
                                             </div>
                                         </form>
                                     </div>
                                     <div id="otp_box">
                                         <div class="registration-title"><strong>Verify</strong>, your Email Address</div>
                                         <div class="clearfix"></div>
                                         <div>
                                             A verification email has been sent to your given email address.<br>
                                             Click on the verification link in the email to verify your Email address.
                                             <br><br>
                                             Please check your <strong>Spam</strong> or <strong>Junk</strong> email folders if you do not see the email within the next 2 minutes.
                                             <br><br>
                                             If you still not received the email, click on the button below to resend the verification mail.
                                             <br><br>
                                             <form action="#" class="form-horizontal" method="post" id="otpverify" role="form" autocomplete="off">
                                                 <div class="form-group">
                                                     <div class="col-md-12">
                                                         <input id="fld_id" name="fld_id" type="hidden">
                                                         <input type="text" name="otp" id="otp" class="form-control" autocomplete="off" placeholder="OTP" />
                                                         <div id="errorotp" style="color:red"></div>
                                                     </div>
                                                 </div>
                                                 <div class="form-group push-up-30">
                                                     <div class="col-md-6">
                                                         <button type="submit" class="btn btn-primary">OTP Verify</button>
                                                     </div>
                                                 </div>

                                             </form>
                                             <br><br>
                                         </div>
                                     </div>
                                     <div id="otp_success">
                                         <div class="registration-title"><strong>Verify</strong>, your Email Address</div>
                                         <a href="<?= base_url('/login') ?>" class="btn btn-success ">Login</a>
                                         <br><br>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div> <!-- Body Panel -->
             </div>
         </div>
         <!-- PAGE CONTENT WRAPPER -->
     </div>
     <!-- END PAGE CONTENT -->
 </div>
 <script>
     var password = document.getElementById("password"),
         confirm_password = document.getElementById("confirm_password");

     function validatePassword() {
         if (password.value != confirm_password.value) {
             confirm_password.setCustomValidity("Passwords Don't Match");
         } else {
             confirm_password.setCustomValidity('');
         }
     }

     password.onchange = validatePassword;
     confirm_password.onkeyup = validatePassword;

     $(document).ready(function() {
         $('#jvalidate').submit(function(event) {
             event.preventDefault();
             $.ajax({
                 url: "<?= base_url("/Registration/submit_form") ?>",
                 type: "post",
                 dataType: "JSON",
                 data: new FormData(this),
                 processData: false,
                 contentType: false,
                 success: function(responce) {
                     //  console.log(responce.id);
                     if (responce.success_message == '0') {
                         $('#error_msg').html(responce.error_message);
                         $('#otp_box').hide();
                         $('.registration-body').show();
                     } else {
                         $('#error_msg').html("");
                         $('#otp_box').show();
                         $('.registration-body').hide();
                         $('#fld_id').val(responce.id);
                     }
                 },
                 error: function(xhr, desc, err) {}
             });
         });
         $('#otpverify').submit(function(event) {
             event.preventDefault();
             $.ajax({
                 url: "<?= base_url("/Registration/verify") ?>",
                 type: "post",
                 dataType: "JSON",
                 data: new FormData(this),
                 processData: false,
                 contentType: false,
                 success: function(responce) {
                    //   console.log(responce);
                     if (responce.success_message == '0') {
                         $('#errorotp').html(responce.error_message);
                         $('#otp_box').show();
                         $('.registration-body').hide();
                         $('#otp_success').hide();
                     } else {
                         $('#errorotp').html("");
                         $('#otp_box').hide();
                         $('.registration-body').hide();
                         $('#otp_success').show();
                     }
                 },
                 error: function(xhr, desc, err) {}
             });
         });
     });
 </script>

 <?php
    echo view('site/footer');
    ?>