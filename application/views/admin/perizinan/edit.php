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
    <form action="<?=base_url('admin/simpan_usaha')?>" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header"><strong>Jenis Usaha</strong></div>
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nama_izin" class=" form-control-label">Nama Izin</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="nama_izin" name="nama_izin" placeholder="Masukkan nama izin" class="form-control" value="<?=$usaha->nama?>">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="<?=$usaha->id?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="syarat" class=" form-control-label">Syarat</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea id="syarat" name="syarat" cols="80" rows="10">
                        <?=$usaha->syarat?>
                    </textarea>
                </div>
                <script>
                    CKEDITOR.replace('syarat');
                    CKEDITOR.add;
                </script>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="prosedur" class=" form-control-label">Prosedur</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea id="prosedur" name="prosedur" cols="80" rows="10">
                        <?=$usaha->prosedur?>
                    </textarea>
                </div>
                <script>
                    CKEDITOR.replace('prosedur');
                    CKEDITOR.add;
                </script>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="berkas" class=" form-control-label">Berkas</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="file-input" name="berkas" class="form-control-file">
                    <input type="hidden" name="berkas_lama" value="<?=$usaha->file_pengesahan?>" >
                    <a href="<?=base_url('upload/').$usaha->file_pengesahan?>"><?=$usaha->file_pengesahan?></a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="estimasi" class=" form-control-label">Estimasi Proses</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="estimasi" name="estimasi" placeholder="Masukkan estimasi proses" class="form-control" value="<?=$usaha->estimasi_proses?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="deskripsi" class=" form-control-label">Deskripsi</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea id="deskripsi" name="deskripsi" cols="80" rows="10">
                        <?=$usaha->deskripsi?>
                    </textarea>
                </div>
                <script>
                    CKEDITOR.replace('deskripsi');
                    CKEDITOR.add;
                </script>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-outline-success btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
        </div>
    </div>
    </form>

</div> <!-- .content -->




