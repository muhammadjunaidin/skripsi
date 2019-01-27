<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Users</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Users</li>
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
                <strong class="card-title">Tabel User</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. Tlp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($users as $user){?>
                        <tr>
                            <th scope="row"><?=$i;?></th>
                            <td><?=$user->nama_lengkap?></td>
                            <td><?=$user->email?></td>
                            <td><?=$user->no_tlp?></td>
                            <td><?=$user->alamat?></td>
                            <td><a href="<?=base_url('admin/delete_user/').$user->id?>" class="btn btn-outline-danger">Delete</a></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div> <!-- .content -->
