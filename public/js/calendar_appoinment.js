$(function() {
	   home_url=$('#home_url').val();	 
       $(document)
	   .on('click','.cal td.active a',function(){
			
			var month=$('table.cal > caption > .month ').html();
			var date=$('.cal td.active a').html();
			appointment_date=month+'-'+date;
			//alert(appointment_date);
			$.ajax({
				type: "POST",
				url: home_url+"member/appointment_date_schedule",
				data: {"date_Record":appointment_date},
				success: function(response) {
					if(response == 0){
						//alert('No data found');
						$('.select_date > ul').html('<b>&nbsp;&nbsp;&nbsp;No Schedule found<b>');
					}else{
				
						var obj = jQuery.parseJSON(response);
						var list='';
						$.each(obj, function (key, value) {
								  
								  list += "<option name='time' value='"+value+"'>"+value+"</option>"
								
							});
						   
						$('.select_date >#foo').html(list);
						$("#foo").multiselect('refresh');
					}
				}
			});
			
		});
			 
		$("#popup").click(function(){
			if ($("input:checkbox:checked").length > 1){
				alert('You can not select more than one.');
				$( "#abc" ).hide();
			}
			if ($("input:checkbox:checked").length < 1){
				alert('Select time first.');
				$( "#abc" ).hide();
			}
		});	
		$("#submit").click(function(){
			user_id=$(this).attr('data-user');
			
			subject=$('#subject').val();
			message=$('#message').val();
			var month=$('table.cal > caption > .month ').html();
			var date=$('.cal td.active a').html();
			//appointment_date=month+'-'+date;
			//alert(subject);
			var time=$('input[name="time"]:checked').val();
				//alert(time);
			$.ajax({type: "POST",
					url: home_url+"member/appointment_schedule",
					data: { 
						"date_months":month+'-'+date,
						"time":time,
						"user_id":user_id,
						"subject":subject,
						"message":message
					},
					dataType: "json",
					
					success: function(response){   
						if(response.status=='1') {
													
							alert(response.message);
							/* $('#error_container').html('<div class="alert alert-success fade in"><strong>Success!</strong> '+response.message+'</div>').show();
								$("#error_container").show().delay(3000).queue(function(n) {
								$(this).hide();
							}); */
							
							//location.reload();
						}else{
							alert(response.message);
							/* $('#error_container').html('<div class="alert alert-warning fade in"><strong></strong> '+response.message+'</div>').show();
							$("#error_container").show().delay(3000).queue(function(n) {
								$(this).hide();
							}); */
						}   
					}
			});
		});	
})
		