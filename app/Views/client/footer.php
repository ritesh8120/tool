<?php 
$son = session();
$session=$son->getTempdata();
$user_id=$session['user_id'];

$db      = \Config\Database::connect();
$builder = $db->table('users');
$user = $builder->where(array('fld_id' => $user_id))->get();
if ($user->getNumRows() > 0) 
{
  $row = $user->getRowArray();
  $memberName = $row["fld_first_name"] . " " . $row["fld_last_name"];
  $memberemail = $row["fld_email"];
  $membersparent_id = $row["fld_parent"];
}

$coach = $builder->where(array('fld_id' => $membersparent_id))->get();
if ($coach->getNumRows() > 0) 
{
  $row = $coach->getRowArray();
  $coachName = $row["fld_first_name"] . " " . $row["fld_last_name"];
  $coachemail = $row["fld_email"];
}
?>
<style>
.rating > span{
  font-size: 30px;
  color: #3399ff;
}

.rating > span:hover:before {
   content: "\2605";
   position: absolute;
}
</style>
</div></div>
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
  <div class="mb-container">
    <div class="mb-middle">
      <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
      <div class="mb-content">
        <p>Are you sure you want to log out?</p>                    
        <p>Press No if you want to continue work</p>
      </div>
      <div class="mb-footer">
        <div class="pull-right">
          <a   href="#" id="get_logout" username="<?php echo $session['username']; ?>" class="btn btn-success btn-lg">Yes</a>
          &nbsp;&nbsp; <button class="btn btn-default btn-lg mb-control-close">No</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="message-box animated fadeIn" data-sound="alert" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Testimonial</h5>
        <button type="button" class="btn btn-default mb-control-close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<?php 
  $rating = "";
  $builder = $db->table('testimonial');
  $userId = $builder->where(array('client_id' => $user_id))->get();
  $ratingrow = $user->getRowArray(); ?>
        <div class="form-group">
          <h4>1. What would you say are the best qualitites of your coach?</h4>
          <h4>2. please write a couple of lines about their expertise on the subject matter.</h4>
          <h4>3. What are the top two reasons. you would recommend your coach to others?</h4>
          <h4>4. Other comments.</h4>
          <div class="rating">
            <span style="color: #000; font-size: 25px;">1 Star</span>  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<span>☆</span>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <input type="radio" name="rating" value="1" id="1" <?php if($ratingrow['star']=="1"){ echo "checked";}?> >
          </div>
          <div class="rating">
            <span style="color: #000; font-size: 25px;">2 Star</span>  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<span>☆</span><span>☆</span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<input type="radio" name="rating" value="2" id="2" <?php if($ratingrow['star']=="2"){ echo "checked";}?> >
          </div>
          <div class="rating">
            <span style="color: #000; font-size: 25px;">3 Star</span>  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<span>☆</span><span>☆</span><span>☆</span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<input type="radio" name="rating" value="3" id="3" <?php if($ratingrow['star']=="3"){ echo "checked";}?> >
          </div>
          <div class="rating">
            <span style="color: #000; font-size: 25px;">4 Star</span>  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<span>☆</span><span>☆</span><span>☆</span><span>☆</span>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<input type="radio" name="rating" value="4" id="4" <?php if($ratingrow['star']=="4"){ echo "checked";}?> >
          </div>
          <div class="rating">
            <span style="color: #000; font-size: 25px;">5 Star</span>  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="rating" value="5" id="5" <?php if($ratingrow['star']=="5"){ echo "checked";}?> >
          </div>
        </div>
        <div class="form-group">
          <input type="hidden" id="client_id" value="<?= $user_id ?>" >
          <input type="hidden" id="coach_id" value="<?= $membersparent_id ?>">
          <label for="message-text" class="col-form-label">Comments:</label>
          <textarea class="form-control" id="message-text" name="description"><?= $ratingrow['description'] ?></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default mb-control-close" data-dismiss="modal">Close</button>
        <button type="button" name="sent_rating" id="sent_rating" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="" id="home_url" value="<?=base_url();?>">
<script>
  $(document).ready(function(){
    home_url=$('#home_url').val();
    $('#get_logout').click(function() {
      var username = $(this).attr('username');
      $.ajax({
        url: "<?= base_url() ?>/get_logout",
        data: {"username": username},
        dataType: "json",
        type: "POST",
        success: function(response) {
          if (response.status == '1') {
            window.setTimeout(function() {
              // Move to a new location or you can do something else
              window.location.href = "<?= base_url() ?>/login";
            }, 0000);
          } else {}
        }
      });
    });
    
    $('#sent_rating').click(function(){
      var rating = $('input[type="radio"]:checked').val();
      var client_id = $('#client_id').val();
      var coach_id = $("#coach_id").val();
      var description = $("#message-text").val();
      if (rating != "" && client_id != "" && coach_id != "" && description != "" ) {
        $.ajax({
          url:home_url+"/testimonial",
          method:"post",
          type:"text",
          data: {rating:rating, client_id:client_id, coach_id:coach_id, description:description},
          success:function(data){
            location.reload();
          }
        });
      }else{
        alert("Please fill Testimonial !!!");
      }
    });
  });
</script>
<audio id="audio-alert" src="" preload="auto"></audio>
<audio id="audio-fail" src="" preload="auto"></audio> 
<script type="text/javascript" src="<?php echo base_url()."public/";?>js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."public/";?>js/fast-buddy.js?2"></script>
</body>
</html>