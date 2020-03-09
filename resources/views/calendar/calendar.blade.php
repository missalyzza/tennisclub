@extends('layouts.app') 
@section('content')
@include('calendar.assets')
@include('calendar.modalbooking') 
<div id="calendar"></div> 
<script> 
    document.addEventListener('DOMContentLoaded', function() { 
        var calendarEl = document.getElementById('calendar'); 
        var calendar = new FullCalendar.Calendar(calendarEl, { 
          plugins: [ 'dayGrid', 'timeGrid', 'list', 'interaction' ],
          header: { left: 'prev,next today', center: 'title', right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek' }, 
          slotDuration: '00:10:00', 
          defaultDate: '2017-01-01', 
          editable: true, 
          eventLimit: true, // allow "more" link when too many events   
          events: '{{route('calendar.json)}}',
		  dateClick: function(info) {
            $('#starttime').val(info.date.toISOString().substring(11,16));
            $('#bookingDate').val(info.date.toISOString().substring(0,10));
            $('#fullCalModal').modal('show');
			}
     }); 
	$(function () {
    $('body').on('click', '#submitButton', function (e) {
        $(this.form).submit();
        $('#fullCalModal').modal('hide');
		});
	});
calendar.render(); }); 
</script> 
@endsection 