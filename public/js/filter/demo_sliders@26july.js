$(function(){
    /* ION Range Slider Samples */
    
    //Default
    $('#chartData tr td').click(function()
		{
		var subject = $(this).closest("tr").find('td.pie_height_width').text();
        console.log(subject);
		});
	$("#ise_default").ionRangeSlider({
        min: 0,
        max: 10,
        from: 500,
		onChange: function (data) {
        var low = $('#ise_default').data().from;
		console.log(low);
    }
    });
    //End Default
	
	 //Default1
   
	$("#ise_default1").ionRangeSlider({
        min: 0,
        max: 10,
        from: 500,
		onChange: function (data) {
        var low = $('#ise_default1').data().from;
		console.log(low);
    }
    });
    //End Default1
	
	//Default2
   
	$("#ise_default2").ionRangeSlider({
        min: 0,
        max: 10,
        from: 500,
		onChange: function (data) {
        var low = $('#ise_default2').data().from;
		console.log(low);
    }
    });
    //End Default2
	
	
	//Default3
   
	$("#ise_default3").ionRangeSlider({
      min: 0,
        max: 10,
        from: 500,
		onChange: function (data) {
        var low = $('#ise_default3').data().from;
		console.log(low);
    }
		
    });
    //End Default3
	
	//Default4
   
	$("#ise_default4").ionRangeSlider({
       min: 0,
        max: 10,
        from: 500,
		onChange: function (data) {
        var low = $('#ise_default4').data().from;
		console.log(low);
    }
    });
    //End Default5
	
	//Default5
   
	$("#ise_default5").ionRangeSlider({
         min: 0,
        max: 10,
        from: 500,
		onChange: function (data) {
        var low = $('#ise_default5').data().from;
		console.log(low);
    }
    });
    //End Default5
	
	//Default6
   
	$("#ise_default6").ionRangeSlider({
         min: 0,
        max: 10,
        from: 500,
		onChange: function (data) {
        var low = $('#ise_default6').data().from;
		console.log(low);
    }
    });
    //End Default6
	
	//Default7
   
	$("#ise_default7").ionRangeSlider({
        min: 0,
        max: 10,
        from: 500,
		onChange: function (data) {
        var low = $('#ise_default7').data().from;
		console.log(low);
    }
    });
    //End Default7
	
	//Default8
   
	$("#ise_default8").ionRangeSlider({
         min: 0,
        max: 10,
        from: 500,
		onChange: function (data) {
        var low = $('#ise_default8').data().from;
		console.log(low);
    }
    });
    //End Default8
	
	//Default9
   
	$("#ise_default9").ionRangeSlider({
         min: 0,
        max: 10,
        from: 500,
		onChange: function (data) {
        var low = $('#ise_default9').data().from;
		console.log(low);
    }
    });
    //End Default9
	var options = [];

$( '.dropdown-menu a' ).on( 'click', function( event ) {

   var $target = $( event.currentTarget ),
       val = $target.attr( 'data-value' ),
       $inp = $target.find( 'input' ),
       idx;
      options.push( val );
      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
   $('#show_val').val($inp.attr('value'));
   $('#show_val').dropdown-menu('hide');
   $( event.target ).blur();
      
   console.log( options );
   return false;
});
		 

    $('.genpdf').click(function(e){
		 e.preventDefault();
		var date = $('#get_date').datepicker({ dateFormat: 'dd,MM,yyyy' }).val();
		  var arr = date.split('-');
		  //alert(arr);
		  
		  var date1 = new Date(arr[0], arr[1]-1, arr[2]);
var weekday = new Array("sunday", "monday", "tuesday", "wednesday",
                    "thursday", "friday", "saturday");

   var day=weekday[date1.getDay()];
    //alert(day);
		  
		//var day=$('#show_val').val();
		//alert(day);
		var subject = $('#chartData tr td').closest("tr").find('td.pie_height_width.highlight').text();
	   if(parseInt($('#ise_default').data().from)>0)
	    {
			var low=$('#ise_default').data().from;
		}
		 else if(parseInt($('#ise_default1').data().from)>0)
		 {
			 var low=$('#ise_default1').data().from;
		 }			 
		else if(parseInt($('#ise_default2').data().from)>0)
	    {
			var low=$('#ise_default2').data().from;
		}
		else if(parseInt($('#ise_default3').data().from)>0)
	    {
			var low=$('#ise_default3').data().from;
		}
		else if(parseInt($('#ise_default4').data().from)>0)
	    {
			var low=$('#ise_default4').data().from;
		}
		else if(parseInt($('#ise_default5').data().from)>0)
	    {
			var low=$('#ise_default5').data().from;
		}
		else if(parseInt($('#ise_default6').data().from)>0)
	    {
			var low=$('#ise_default6').data().from;
		}
		else if(parseInt($('#ise_default7').data().from)>0)
	    {
			var low=$('#ise_default7').data().from;
		}
		else if(parseInt($('#ise_default8').data().from)>0)
	    {
			var low=$('#ise_default8').data().from;
		}
		else if(parseInt($('#ise_default9').data().from)>0)
	    {
			var low=$('#ise_default9').data().from;
		}
		//alert(low);
	
		var home_url=$('#homeurl').val();
		//alert(home_url);
		 //$link = $(this);
		 //alert($link);exit;
		$.ajax
		({
			url:home_url+"member/genpdf",
			data:{"date":date,"day":day,"subject":subject,"low":low},
			dataType:"json",
			type: "POST",
			success:function (response)
			{
				//alert(response);
				
				if(response.status == '1')
				{
					 
					 //alert('monali');
				     //alert("You will now be redirected.");
					 window.location.assign(home_url+"member/loadpdfcontent");
					 
					 
                  
				}
				else
				{
					alert("Please fill all the feilds");
				}
		     
			}
			
		});
		   window.setTimeout('location.reload()', 3000);
	});
  
    /* END ION Range Slider Samples */
});      