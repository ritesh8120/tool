$(function(){
    home_url=$('#home_url').val();	
    function onSuccess(){
        $("#cp_photo").parent("a").find("span").html("Choose another photo");
        
        var img = $("#cp_target").find("#crop_image");
        $("#cp_accept").attr('data-img-src',img.attr("data-src"));
        if(img.length === 1){            
            $("#cp_img_path").val(img.attr("src"));
            
            img.cropper({aspectRatio: 1,
                        done: function(data) {
                            $("#ic_x").val(data.x);
                            $("#ic_y").val(data.y);
                            $("#ic_h").val(data.height);
                            $("#ic_w").val(data.width);
                        }
            });
            
            $("#cp_accept").prop("disabled",false).removeClass("disabled");
            
            $("#cp_accept").on("click",function(){     
                data_img_src=$(this).attr('data-img-src');				
                $("#user_image").html('<img src="'+home_url+data_img_src+'"/>');
                $("#modal_change_photo").modal("hide");                
                $("#cp_crop").ajaxForm({target: '#user_image'}).submit();
                $("#cp_target").html("Use form below to upload file. Only .jpg files.");
                $("#cp_photo").val("").parent("a").find("span").html("Select file");
                $("#cp_accept").prop("disabled",true).addClass("disabled");
                $("#cp_img_path").val("");
				$.ajax({url: home_url+"student/upload_image_ajaxfile",
			                	data: { 
									"data_img_src": data_img_src
								},
								dataType: "json",
								type: "POST",
						        success: function(response){	                                         							
							          if(response.status=='1') {
										    alert(response.message);	
										    window.setTimeout(function(){
												// Move to a new location or you can do something else
												window.location.href = home_url+"student/edit_profile";
											});
									  }else{
										  console.log(response);										
									  }
						        }
						});
				
            });           
        }
    }
    
    $("#cp_photo").on("change",function(){
        
        if($("#cp_photo").val() == '') return false;        
        //$("#cp_target").html('<img src="img/loaders/default.gif"/>');        
        $("#cp_upload").ajaxForm({target: '#cp_target',success: onSuccess}).submit();        
    });
    
    
});      