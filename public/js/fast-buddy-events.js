$(function() {
	      var home_url=$('#home_url').val();
	      var date = new Date();
		  var d = date.getDate();
		  var m = date.getMonth();
		  var y = date.getFullYear();

		  var calendar = $('#calendar').fullCalendar({
			    editable: true,
				   header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				   },
			   
			   events: home_url+"events",
			   
			   // Convert the allDay from string to boolean
			   eventRender: function(event, element, view) {
					if (event.allDay === 'true') {
					 event.allDay = true;
					} else {
					 event.allDay = false;
					}
					
			   },
			   selectable: true,
			   selectHelper: true,
			   select: function(start, end, allDay) {
				   
			   var title = prompt('Event Title:');
			   if (title) {
			   var start = $.fullCalendar.moment(start).format('YYYY-MM-DD H:m:s');
			   var end = $.fullCalendar.moment(end).format('YYYY-MM-DD H:m:s');
			   $.ajax({
				   url: home_url+"events/add_events",
				   data: 'title='+ title+'&start='+ start +'&end='+ end  ,
				   type: "POST",
				   dataType: "json",
				   success: function(json) {
					    alert(json.message);
				   }
			   });
			   calendar.fullCalendar('renderEvent',
			   {
				   title: title,
				   start: start,
				   end: end,
				   allDay: allDay
			   },
			   true // make the event "stick"
			   );
			   }
			   calendar.fullCalendar('unselect');
			   },
			   
			   editable: true,
			   eventDrop: function(event, delta) {
			   var start = $.fullCalendar.moment(start).format('YYYY-MM-DD H:m:s');
			   var end = $.fullCalendar.moment(end).format('YYYY-MM-DD H:m:s');
			   $.ajax({
				   url: 'http://localhost:8888/fullcalendar/update_events.php',
				   data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
				   type: "POST",
				   success: function(json) {
					alert("Updated Successfully");
				   }
			   });
			   },
			   eventResize: function(event) {
				   var start = $.fullCalendar.moment(start).format('YYYY-MM-DD H:m:s');
				   var end = $.fullCalendar.moment(end).format('YYYY-MM-DD H:m:s');
				   $.ajax({
						url: 'http://localhost:8888/fullcalendar/update_events.php',
						data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
						type: "POST",
						success: function(json) {
						 alert("Updated Successfully");
						}
				   });
			  }
		  });
		  
		
	   /**************************************************
	      var fullCalendar = function(){
				
			var calendar = function(){
				
				if($("#calendar").length > 0){
					
					function prepare_external_list(){
						
						$('#external-events .external-event').each(function() {
								var eventObject = {title: $.trim($(this).text())};

								$(this).data('eventObject', eventObject);
								$(this).draggable({
										zIndex: 999,
										revert: true,
										revertDuration: 0
								});
						});                    
						
					}
					
					
					var date = new Date();
					var d = date.getDate();
					var m = date.getMonth();
					var y = date.getFullYear();

					prepare_external_list();

					var calendar = $('#calendar').fullCalendar({
						header: {
							left: 'prev,next today',
							center: 'title',
							right: 'month,agendaWeek,agendaDay'
						},
						editable: true,
						eventSources: {url: home_url+"events"},
						type: "POST",
						droppable: true,
						selectable: true,
						selectHelper: true,
						select: function(start, end, allDay) {
							var title = prompt('Event Title:');
							if (title) {
								calendar.fullCalendar('renderEvent',
								{
									title: title,
									start: start,
									end: end,
									allDay: allDay
								},
								true
								);
							}
							calendar.fullCalendar('unselect');
						},
						drop: function(date, allDay) {

							var originalEventObject = $(this).data('eventObject');

							var copiedEventObject = $.extend({}, originalEventObject);

							copiedEventObject.start = date;
							copiedEventObject.allDay = allDay;

							$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);


							if ($('#drop-remove').is(':checked')) {
								$(this).remove();
							}

						}
					});
					
					$("#new-event").on("click",function(){
						var et = $("#new-event-text").val();
						if(et != ''){
							$("#external-events").prepend('<a class="list-group-item external-event">'+et+'</a>');
							prepare_external_list();
						}
					});
					
				}            
			}
			
			return {
				init: function(){
					calendar();
				}
			}
		}();
		fullCalendar.init();
	**************************************************/
    
	
});
