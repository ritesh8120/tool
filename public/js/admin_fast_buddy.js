$(function() {
	home_url=$('#home_url').val();	 
    $(document)
      
	.on('click','.add_feature_row', function(){
		alert('hello');
		    $('#features_list_group').append('<table>'
												+'<tr>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[week][]" class="form-control" cols="" rows=""></textarea></th>'
                                                    +'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[time ][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[topic][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[education ][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[subject ][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[objective][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[highlighted ][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[manual][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[page ][]" class="form-control" cols="" rows=""></textarea></th>'
													+'<th class="col-md-1 col-xs-5 control-label"><textarea name="features_list[home ][]" class="form-control" cols="" rows=""></textarea></th>'
                                                    +'<th class="col-md-1 col-xs-5 control-label"><a class="remove_price_row" href="#"><i class="glyphicon glyphicon-minus"></i></a></th>'
												+'</tr>'
											 +'</table>');
	})


});