<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Perusahaan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>Users</li>
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
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-header"><strong>Detail Perushaan</strong></div>
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nik" class=" form-control-label">NIK</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="nik" name="nik" placeholder="Masukkan NIK" class="form-control" value="<?=$user->nik?>">
                    <input type="hidden" name="edit" value="edit">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="email" class=" form-control-label">Email</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="email" name="email" placeholder="Masukkan email" class="form-control" value="<?=$user->email?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="username" class=" form-control-label">Username</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="username" name="username" placeholder="Masukkan username" class="form-control" value="<?=$user->username?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password" class=" form-control-label">Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="password" name="password" placeholder="Masukkan password baru" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="nama_lengkap" class=" form-control-label">Nama Lengkap</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" class="form-control" value="<?=$user->nama_lengkap?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="alamat" class=" form-control-label">Alamat</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat" class="form-control" value="<?=$user->alamat?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="no_tlp" class=" form-control-label">No. Tlp</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="no_tlp" name="no_tlp" placeholder="Masukkan nomor telpon" class="form-control" value="<?=$user->no_tlp?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="kewarganegaraan" class=" form-control-label">Kewarganegaraan</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="kewarganegaraan" class="form-control">
                        <option value="wni" <?= $user->kewarganegaraan == 'wni' ? 'selected': ''?> >WNI</option>
                        <option value="wna" <?= $user->kewarganegaraan == 'wna' ? 'selected': ''?> >WNA</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="jabatan" class=" form-control-label">Jabatan</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" class="form-control" value="<?=$user->jabatan?>">
                </div>
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




