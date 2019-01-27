<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Perizinan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Perizinan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <?php 
        if(($this->session->flashdata('alert')) !== null){
            $message = $this->session->flashdata('alert');
            $this->load->view('layouts/alert', ['class' => $message['class'], 'message' => $message['message']]);
        }
    ?>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Tabel Jenis Usaha</strong>
                <div style="float: right;">
                    <a href="<?=base_url('admin/tambah_usaha/')?>" class="btn btn-outline-success">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($jenis_usaha as $usaha){?>
                        <tr>
                            <td><?=$usaha->nama?></td>
                            <td>
                                <a href="<?=base_url('admin/edit_usaha/').$usaha->id?>" class="btn btn-outline-primary">Edit</a>
                                <a href="<?=base_url('admin/lihat_usaha/').$usaha->id?>" class="btn btn-outline-secondary">Lihat</a>
                                <a href="<?=base_url('admin/hapus_usaha/').$usaha->id?>" class="btn btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div> <!-- .content -->
