$(function() {
	   home_url=$('#home_url').val();	   
	  // home_url='http://192.168.2.140/manasyogashala/';	
       $(document)
		.on('click','.delete_tbl_row', function(){
		   get_confirm=confirm("Do you want to delete this item?");
		    if(get_confirm==true){
			   tbl=$(this).attr('data-tbl');
			   id=$(this).attr('data-id');	
				//alert(id);
			   $.ajax({url: home_url+"admin/tbl_delete_row", 
									data: { 
										"table": tbl,
										"id": id
									},
									dataType: "json",
									type: "POST",
									success: function(response){
										 //console.log(response);   
										if(response.status=='1') {
											window.setTimeout(function(){
												// Move to a new location or you can do something else
												alert(response.message);
												location.reload();

											}, 1000);
										}else{
											alert(response.message);
										}
									}
				});
		    }else{
			   //
		    }
		   
		})
		//delete dependence
		       $(document)
		.on('click','.delete_tbl_wd_dependence', function(){
		   get_confirm=confirm("Do you want to delete this item?");
		    if(get_confirm==true){
			   tbl=$(this).attr('data-tbl');
			   id=$(this).attr('data-id');	
			   dependence_fld=$(this).attr('data-key');
			   dependence_tbl=$(this).attr('data-dependence-tbl');
				//alert(id);
//alert(id);
			   $.ajax({url: home_url+"admin/tbl_delete_with_dependence", 
									data: { 
										"table": tbl,
										"id": id,
										'dependence_fld':dependence_fld,
										'dependence_tbl':dependence_tbl
									},
									dataType: "json",
									type: "POST",
									success: function(response){alert(id);
										 //console.log(response);   
										if(response.status=='1') {
											window.setTimeout(function(){
												// Move to a new location or you can do something else
												alert(response.message);
												location.reload();

											}, 1000);
										}else{
											alert(response.message);
										}
									}
				});
		    }else{
			   //
		    }
		  // alert(id);
		})
		///////////////////////////////////////////////
		.on('click','#remove_row a ', function(){
		    $('#remove_row').remove();
		})
		.on('click','.add_feature_row', function(){
			$('#features_list_group').append('<table>'
												+'<tr id="remove_row">'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[week][]" class="form-control" cols="" rows=""></textarea></th>'
                                                    +'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[time][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[topic][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[education][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[subject][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[objective][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[highlighted][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[manual][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[page][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[home][]" class="form-control" cols="" rows=""></textarea></th>'
                                                    +'<th class="col-md-1 col-xs-5 control-label"><a class="remove_row" href="#"><i class="glyphicon glyphicon-minus"></i></a></th>'
												+'</tr>'
											 +'</table>');
		})
		.on('click','#remove_package_row a ', function(){
		    $('#remove_package_row').remove();
		})
		.on('click','.add_package_row', function(){
			$('#package_list_group').append('<table>'
												+'<tr id="remove_package_row">'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[week][]" class="form-control" cols="" rows=""></textarea></th>'
                                                    +'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[time][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[topic][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[education][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[subject][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[objective][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[highlighted][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[manual][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[page][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[home][]" class="form-control" cols="" rows=""></textarea></th>'
                                                    +'<th class="col-md-1 col-xs-5 control-label"><a class="remove_package_row" href="#"><i class="glyphicon glyphicon-minus"></i></a></th>'
												+'</tr>'
											 +'</table>');
		})
		///////////////////////////////////////////////
	   .on('click','.accept_deny_event',function(){		  
			    event_id=$(this).attr('event-id');
			    yogi_id=$(this).attr('yogi-id');
			    member_id=$(this).attr('member-id');
			    data_status=$(this).attr('data-status');				
			   $.ajax({url: home_url+'member/page_calendar', 
								data: { 
								       "event_id":event_id,
								       "yogi_id":yogi_id,
								       "member_id":member_id,
								       "data_status":data_status
								},
							    dataType: "json",
								type: "POST",
								success: function(response){
									console.log(response);
									if(response.status=='1') {
											$('#error_container').html('<div class="alert alert-success fade in"><strong>Success!</strong> '+response.message+'</div>').show();
											$("#error_container").show().delay(3000).queue(function(n) {
											  $(this).hide();
											});
										 }else{
											$('#error_container').html('<div class="alert alert-warning fade in"><strong>Error!</strong> '+response.message+'</div>').show();
											$("#error_container").show().delay(3000).queue(function(n) {
											  $(this).hide();
											});
										 }   
								}
				});
		  })
	   
	   .on('click','.user_edit_profile', function(){
				user_id=$(this).attr('data-id');
			    window.location.href = home_url+"yogiccoach/edit_profile?user_id="+user_id;
	   })
		 
		  .on('click','#save',function(){
			    user_id=$(this).attr('data-id');
			    first_name=$('#first_name').val();
			    last_name=$('#last_name').val();
			    locations=$('#location').val();
			    phone=$('#phone').val();
			    about_me=$('#about_me').val();
			   $.ajax({url: home_url+"yogiccoach/update_users_data", 
								data: { 
								       "user_id":user_id,
								       "first_name":first_name,
								       "last_name":last_name,
								       "locations":locations,
								       "phone":phone,
								       "about_me":about_me
												 
								},
							    dataType: "json",
								type: "POST",
								success: function(response){
									console.log(response);
									       //alert(response);   
									if(response.status=='1') {
											$('#error_container').html('<div class="alert alert-success fade in"><strong>Success!</strong> '+response.message+'</div>').show();
											$("#error_container").show().delay(3000).queue(function(n) {
											  $(this).hide();
											});
												
										 }else{
											$('#error_container').html('<div class="alert alert-warning fade in"><strong>Error!</strong> '+response.message+'</div>').show();
											$("#error_container").show().delay(3000).queue(function(n) {
											  $(this).hide();
											});
										 }   
								}
				});
		  })
		  
		  .on('click','#change_password_yogi', function(){
		   oldpassword=$('#old_password').val();
		   newpassword=$('#new_password').val();
		   re_password=$('#re_password').val();
		   user_id=$(this).attr('data-id');
		   //alert(user_id);
		   if(newpassword==re_password){
			    $.ajax({url: home_url+"yogiccoach/change_password_yogi", 
								data: { 
									"oldpassword": oldpassword, 
									"newpassword": newpassword,
									"user_id": user_id
								},
								dataType: "json",
								type: "POST",
						        success: function(response){
									   console.log(response);   
							          if(response.status=='1') {
										    $('#error_container').html('<div class="alert alert-success fade in"><strong>Success!</strong> '+response.message+'</div>').show();
											$("#error_container").show().delay(3000).queue(function(n) {
											  $(this).hide();
											});
									  }else{
										    $('#error_container').html('<div class="alert alert-warning fade in"><strong></strong> '+response.message+'</div>').show();
											$("#error_container").show().delay(3000).queue(function(n) {
											  $(this).hide();
											});
									  }
						        }
						});		   
		   }else{
			   $('#error_container').html('<div class="alert alert-danger fade in"><strong></strong> New Password and Repeat Password didn\'t matched.</div>').show();
				$("#error_container").show().delay(3000).queue(function(n) {
				  $(this).hide();
				});
		   }
        })
	   .on('click','#do_email_verification', function(){
		   verification_code=$('#verification_code').val();		  
           $.ajax({url: home_url+"/member/do_email_verification", 
								data: { 
									"verification_code": verification_code
								},
								dataType: "json",
								type: "POST",
						        success: function(response){
									 if(response.status=='1'){
										 alert(response.message);
										 window.location.href = home_url+response.data;
									 }else{
										 alert(response.message);
									 }
						        }
		   });
	    
	   }); 
});
