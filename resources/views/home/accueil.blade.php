@extends('Main')

@section('styles')
<link rel='stylesheet' href="{{ asset('assets/Plugins/fullcalendar/fullcalendar.css') }}" />
@endsection

@section('scripts')
<script src="{{ asset('assets/Plugins/fullcalendar/lib/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/Plugins/fullcalendar/lib/moment.min.js') }}"></script>
<script src="{{ asset('assets/Plugins/fullcalendar/fullcalendar.js') }}"></script>
<script>
	$(document).ready(function() {
		 $('.ui.form').form({
              fields: {
                title: {
                  identifier: 'title',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Titre est vide.'
                    }
                  ]
                },
                start: {
                  identifier: 'start',
                  rules: [{
                      type   : 'empty',
                      prompt : 'Champs Date Début est vide.'
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- -.](0[1-9]|1[012])[- -.](19|20)\\d\\d$/]",
                      prompt: "Champs Date Début n'est pas valide dd-mm-yyyy"
                    }
                    ]
                },
                end: {
                  identifier: 'end',
                  rules: [{
                      type   : 'empty',
                      prompt : 'Champs Date Fin est vide.'
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- -.](0[1-9]|1[012])[- -.](19|20)\\d\\d$/]",
                      prompt: "Champs Date Fin n'est pas valide dd-mm-yyyy"
                    }
                    ]
                }
              }
        
              
  });

   		 $('#calendar').fullCalendar({
   		 	
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2017-05-01'
				},
				{
					title: 'Long Event',
					start: '2017-05-07',
					end: '2017-05-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-05-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-05-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2017-05-11',
					end: '2017-05-13'
				},
				{
					title: 'Meeting',
					start: '2017-05-12T10:30:00',
					end: '2017-05-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2017-05-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2017-05-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2017-05-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2017-05-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2017-05-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2017-05-28'
				}
			],
 dayClick: function(date, jsEvent, view) {
 		$('.ui.modal').modal('show');
        alert('Clicked on: ' + date.format());
        alert('Current view: ' + view.name);
        // change the day's background color just for fun
        $(this).css('background-color', 'red');

    }
   		 });

});
</script>
@endsection

@section('content')
<div id='calendar'></div>
<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">Ajouter un Evenement :</div>
  <div class="content">
    <form class="ui form">
      
      		<div class="field">
                <label>Titre : </label>
                <input type="text" placeholder="Titre" name="title" id="title">
              </div>
            <div class="two fields">
              <div class="field">
                <label>Date Début : </label>
                <input type="text" placeholder="jj-mm-aaaa" name="start" id="start">
              </div>
              <div class="field">
                <label>Date Fin : </label>
                <input type="text" placeholder="jj-mm-aaaa" name="end" id="end">
              </div>
            </div>
            <button class="ui positive right floated button" type="submit">Valider</button>
          <br>
          <br>
            <div class="ui error message"></div>
    </form>
  </div>
</div>

@endsection

