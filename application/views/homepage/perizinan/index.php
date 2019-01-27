<div class="content izin-usaha">
  <form action="<?=base_url('izin-usaha/tracking');?>" method="get" accept-charset="utf-8">
    <div class="input-group mb-3 input-group-lg">
      <input type="text" class="form-control" placeholder="Masukkan nomer registrasi untuk melacak perizinan" aria-describedby="basic-addon2"name="q">
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
      </div>
    </div>
  </form>
    <div class="title">
        <h3>Izin Usaha</h3>
    </div>
    <div id="accordion">
     <?php foreach ($list as $k => $usaha) {?>
     <div class="card">
        <div class="card-header" id="heading-<?= $k ?>">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-<?= $k ?>" aria-expanded="true" aria-controls="collapse-<?= $k ?>">
              <?= $usaha->nama ?>
           </button>
          </h5>
        </div>

        <div id="collapse-<?= $k ?>" class="collapse show" aria-labelledby="heading-<?= $k ?>" data-parent="#accordion">
          <div class="card-body">
            <?= $usaha->deskripsi ?>
           <div class="readmore">
                <a href="<?=base_url('izin-usaha/detail/').$usaha->id?>" class="readmore" ">Lihat selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
   </div>
</div>