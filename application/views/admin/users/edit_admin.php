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
                    <label for="email" class=" form-control-label">Email</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="email" name="email" placeholder="Masukkan email" class="form-control" value="<?=$user->email?>">
                    <input type="hidden" name="edit" value="edit">
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
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" class="form-control" value="<?=$user->nama?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="alamat" class=" form-control-label">Jenis Kelamin</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="jenis_kelamin" class="form-control">
                        <option value="pria" <?= $user->jenis_kelamin == 'pria' ? 'selected': ''?> >Pria</option>
                        <option value="wanita" <?= $user->jenis_kelamin == 'wanita' ? 'selected': ''?> >Wanita</option>
                    </select>
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




