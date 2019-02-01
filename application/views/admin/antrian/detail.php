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
    <div class="card">
        <div class="card-header"><strong>Lihat antrian</strong></div>
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
                    <?=$izin->nama_usaha?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="syarat" class=" form-control-label">Nomor Izin</label>
                </div>
                <div class="col-12 col-md-9">
                    <?=$izin->nomor_izin?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="syarat" class=" form-control-label">Nama Pemilik</label>
                </div>
                <div class="col-12 col-md-9">
                    <?=$izin->nama_pemilik?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="syarat" class=" form-control-label">Alamat lengkap</label>
                </div>
                <div class="col-12 col-md-9">
                    <?=$izin->alamat_usaha?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="berkas" class=" form-control-label">Berkas</label>
                </div>
                <div class="col-12 col-md-9">
                    <a href="<?=base_url('/upload/berkas/').$izin->berkas ?>"><?= $izin->berkas ?></a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nama_izin" class="form-control-label">Tanggal berdiri</label>
                </div>
                <div class="col-12 col-md-9">
                    <?=$izin->tanggal_berdiri?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="prosedur" class=" form-control-label">Status</label>
                </div>
                <div class="col-12 col-md-9">
                    <?=$izin->status_terakhir?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="prosedur" class=" form-control-label">Tanggal survey</label>
                </div>
                <div class="col-12 col-md-9">
                    <?=$izin->tanggal_survey?>
                </div>
            </div>
            
        </div>
    </div>
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




