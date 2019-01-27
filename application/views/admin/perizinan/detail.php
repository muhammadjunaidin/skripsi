<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail Perizinan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>Perizinan</li>
                    <li class="active">Detail</li>
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
    <form action="<?=base_url('admin/simpan_usaha')?>" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header"><strong>Detail Usaha</strong></div>
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nama_izin" class=" form-control-label">Nama Izin</label>
                </div>
                <div class="col-12 col-md-9">
                    <?= $usaha->nama ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="syarat" class=" form-control-label">Syarat</label>
                </div>
                <div class="col-12 col-md-9">
                    <?= $usaha->syarat ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="prosedur" class=" form-control-label">Prosedur</label>
                </div>
                <div class="col-12 col-md-9">
                    <?= $usaha->prosedur ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="berkas" class=" form-control-label">Berkas</label>
                </div>
                <div class="col-12 col-md-9">
                    <a href="<?=base_url('/upload/').$usaha->file_pengesahan ?>"><?= $usaha->file_pengesahan ?></a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="estimasi" class=" form-control-label">Estimasi Proses</label>
                </div>
                <div class="col-12 col-md-9">
                    <?= $usaha->estimasi_proses ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="deskripsi" class=" form-control-label">Deskripsi</label>
                </div>
                <div class="col-12 col-md-9">
                    <?= $usaha->deskripsi ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?=base_url('admin/edit_usaha/').$usaha->id?>" class="btn btn-outline-success btn-sm">
                <i class="fa fa-dot-circle-o"></i> Edit
            </a>
        </div>
    </div>
    </form>

</div> <!-- .content -->




