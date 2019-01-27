<div class="row">
	<div class="col-md-12">
		<nav>
			<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-deskripsi" role="tab" aria-controls="nav-deskripsi" aria-selected="true">Deskripsi</a>
				<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-syarat" role="tab" aria-controls="nav-syarat" aria-selected="false">Syarat</a>
				<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-prosedur" role="tab" aria-controls="nav-prosedur" aria-selected="false">Prosedur</a>
				<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-other" role="tab" aria-controls="nav-other" aria-selected="false">Lain-lain</a>
			</div>
		</nav>
		<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
			<div class="tab-pane fade show active" id="nav-deskripsi" role="tabpanel" aria-labelledby="nav-home-tab">
				<h4><?=$usaha->nama?></h4>
				<?=$usaha->deskripsi?>
			</div>
			<div class="tab-pane fade" id="nav-syarat" role="tabpanel" aria-labelledby="nav-profile-tab">
				<?=$usaha->syarat?>
			</div>
			<div class="tab-pane fade" id="nav-prosedur" role="tabpanel" aria-labelledby="nav-contact-tab">
				<?=$usaha->prosedur?>
			</div>
			<div class="tab-pane fade" id="nav-other" role="tabpanel" aria-labelledby="nav-about-tab">
				File pengesahan	:   <a href="<?=base_url('upload/').$usaha->file_pengesahan?>"><?=$usaha->file_pengesahan?></a> <br>
				Estimasi waktu	:   <strong><?=$usaha->estimasi_proses?></strong>
			</div>
		</div>
	</div>
</div>