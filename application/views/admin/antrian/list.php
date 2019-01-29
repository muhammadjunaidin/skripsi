<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Antrian</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Antrian</li>
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
                <strong class="card-title">List Antrian</strong>
                <div style="float: right;">
                    <?php if(!is_admin()){?>
                    <a href="<?=base_url('admin/tambah_antrian/')?>" class="btn btn-outline-success">Tambah</a>
                    <?php }?>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID pengajuan</th>
                            <th scope="col">Nama Izin</th>
                            <th scope="col">Tanggal Pengajuan</th>
                            <th scope="col">Status Terakhir</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($lists as $k => $pengajuan){?>
                        <tr>
                            <td><?=$pengajuan->kode_antrian?></td>
                            <td><?=$pengajuan->nama?></td>
                            <td><?=$pengajuan->created_at?></td>
                            <td><?=$pengajuan->status_terakhir ?></td>
                            <td>
                                <?php
                                    $hidden = false;
                                    if(is_admin() && $pengajuan->status_terakhir === 'diproses' && $k !== 0 ) {
                                        $hidden = true;
                                    } else if (!is_admin() && $pengajuan->status_terakhir !== 'diproses') {
                                        $hidden = true;
                                    }
                                ?>
                                <a href="<?=base_url('admin/edit_antrian/').$pengajuan->id?>" class="btn btn-outline-primary <?= $hidden ? 'hidden':''?>">Edit</a>
                                <a href="<?=base_url('admin/lihat_antrian/').$pengajuan->id?>" class="btn btn-outline-secondary">Lihat</a>
                                <a href="<?=base_url('admin/hapus_antrian/').$pengajuan->id?>" class="btn btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div> <!-- .content -->
