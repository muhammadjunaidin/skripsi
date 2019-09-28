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
        left: '',
        center: 'title',
        right: 'prev,next today'
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
		margin: 30px auto;
	}

  #calendar {
    max-width: 900px;
  }

</style>
<div class="wrapper">
  <div class="list-usaha" <?=isset($tampil_kalendar) && $tampil_kalendar?'style="display:none"':''?>>
    <h3 style="padding-bottom:20px;">pilih jenis usaha</h3>  
    <ul class="list-group">
      <?php foreach($jenis_usaha as $k => $v){?>
        <li class="list-group-item">
          <a href="/perizinan/admin/jadwal?ijin_usaha=<?=$v->id?>"><?=$v->nama?></a>
        </li>
      <?php } ?>
    </ul>
  </div>
  <div class="calendar-wrapper" <?=isset($tampil_kalendar) && !$tampil_kalendar?'style="display:none"':''?>>
    <a href="/perizinan/admin/jadwal"><< kembali</a>
	  <div id='calendar'></div>
  </div>
</div>