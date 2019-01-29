<link rel="stylesheet" type="text/css" href="<?=get_css('fullcalendar.min.css')?>">
<!-- <link rel="stylesheet" type="text/css" href="<?=get_css('fullcalendar.print.min.css')?>"> -->

<script src="<?=get_js('moment.min.js')?>"></script>
<script src="<?=get_js('jquery.min.js')?>"></script>
<script src="<?=get_js('fullcalendar.min.js')?>"></script>

<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      eventClick: function(eventObj) {
        if (eventObj.url) {
          window.open(eventObj.url);
          return false; // prevents browser from following link in current tab.
        }
      },
      header: {
        left: 'prev,next today',
        center: 'title',
        right: ''
      },
      defaultDate: '2019-01-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: <?=$antrian?>
    });

  });

</script>
<style>

	.wrapper {
		width: 800px;
		margin: auto;
	}

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
<div class="wrapper">
	<div id='calendar'></div>
</div>