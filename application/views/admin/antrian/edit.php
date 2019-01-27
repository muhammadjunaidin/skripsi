<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Perizinan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>Perizinan</li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/ckeditor/ckeditor.js');?>"></script> 
<div class="content mt-3">
    <?php 
        if(($this->session->flashdata('alert')) !== null){
            $message = $this->session->flashdata('alert');
            $this->load->view('layouts/alert', ['class' => $message['class'], 'message' => $message['message']]);
        }
    ?> 
    <form action="<?=base_url('admin/simpan_antrian')?>" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header"><strong>Edit antrian</strong></div>
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nama_usaha" class=" form-control-label">Kode Antrian</label>
                </div>
                <div class="col-12 col-md-9">
                    <span><?=$izin->kode_antrian?></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nama_usaha" class=" form-control-label">Nama Perusahaan</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="nama_usaha" name="nama_perusahaan" placeholder="Masukkan nama perusahaan" class="form-control" value="<?=$izin->nama_usaha?>">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="<?=$izin->id?>">
                    <input type="hidden" name="kode_antrian" value="<?=$izin->kode_antrian?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="syarat" class=" form-control-label">Nomor Izin</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="nomor_izin" placeholder="Masukkan nomor izin" class="form-control" value="<?=$izin->nomor_izin?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="syarat" class=" form-control-label">Nama Pemilik</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="nama_pemilik" placeholder="Masukkan nama pemilik" class="form-control" value="<?=$izin->nama_pemilik?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="syarat" class=" form-control-label">Alamat lengkap</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="alamat" placeholder="Masukkan alamat lengkap" class="form-control" value="<?=$izin->alamat_usaha?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nama_izin" class="form-control-label">Tanggal berdiri</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="tanggal_berdiri" id="tanggal_berdiri" placeholder="Masukkan tanggal berdiri" class="form-control" value="<?=$izin->tanggal_berdiri?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="prosedur" class=" form-control-label">Permohonan Izin</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="jenis_usaha" class="form-control">
                        <?php foreach($jenis_usaha as $v) { ?>
                            <option value="<?=$v->id?>" <?=$v->id === $izin->id_izin_usaha ? 'selected': '';?>><?=$v->nama?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <?php if($is_admin):?>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="prosedur" class=" form-control-label">Status</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="status" class="form-control">
                        <option value="ditolak" <?=$izin->status_terakhir == 'ditolak' ? 'selected':''?>>Ditolak</option>
                        <option value="diterima" <?=$izin->status_terakhir == 'diterima' ? 'selected':''?>>Diterima</option>
                        <option value="diproses" <?=$izin->status_terakhir == 'diproses' ? 'selected':''?>>Diproses</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="prosedur" class=" form-control-label">Pilih tanggal survey</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="tanggal_survey" id="tanggal_survey" placeholder="Masukkan tanggal survey" class="form-control" value="<?=$izin->tanggal_survey?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="prosedur" class=" form-control-label">Pesan</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="pesan" placeholder="Masukkan pesan" class="form-control" value="<?=$log[(count($log) - 1)]->pesan?>">
                </div>
            </div>
            <?php endif;?>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-outline-success btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <button type="reset" class="btn btn-outline-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
    </div>
    </form>
    <div class="card">
        <div class="card-header"><strong>Antrian Log</strong></div>
        <div class="card-body card-block">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aktor</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($log as $l){?>
                        <tr>
                            <td><?=$l->created_at?></td>
                            <td><?=$l->nama?></td>
                            <td><?=$l->status_permohonan ?></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- .content -->

<script type="text/javascript">
$( function() {
    $("#tanggal_berdiri").datepicker({dateFormat: "yy-mm-dd"});
    $("#tanggal_survey").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        minDate: new Date(),
        dateFormat: "yy-mm-dd"
    });
});
</script>


