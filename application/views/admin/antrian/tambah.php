<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Perizinan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>Perizinan</li>
                    <li class="active">Tambah</li>
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
        <div class="card-header"><strong>Pengajuan antrian</strong></div>
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nama_usaha" class=" form-control-label">Nama Perusahaan</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="nama_usaha" name="nama_perusahaan" placeholder="Masukkan nama perusahaan" class="form-control">
                    <input type="hidden" name="action" value="tambah">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="syarat" class=" form-control-label">Nomor Izin</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="nomor_izin" placeholder="Masukkan nomor izin" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="syarat" class=" form-control-label">Nama Pemilik</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="nama_pemilik" placeholder="Masukkan nama pemilik" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="syarat" class=" form-control-label">Alamat lengkap</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="alamat" placeholder="Masukkan alamat lengkap" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nama_izin" class="form-control-label">Tanggal berdiri</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="tanggal_berdiri" id="tanggal_berdiri" placeholder="Masukkan tanggal berdiri" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="berkas" class=" form-control-label">Berkas</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="file-input" name="berkas" class="form-control-file">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="prosedur" class=" form-control-label">Permohonan Izin</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="jenis_usaha" class="form-control">
                        <?php foreach($jenis_usaha as $v) { ?>
                            <option value="<?=$v->id?>"><?=$v->nama?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
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

</div> <!-- .content -->

<script type="text/javascript">
$( function() {
    $("#tanggal_berdiri").datepicker({dateFormat: "yy-mm-dd"});
});
</script>



