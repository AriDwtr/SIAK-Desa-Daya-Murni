<?= $this->extend('admin/theme/main_theme') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content ml-2">
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-user-plus"></i> Proses Berhasil</h5>
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>
    <!-- Default box -->
    <a href="<?= route_to('admin.pegawai.create') ?>" class="btn btn-primary mb-2"><i class="fas fa-user-plus"></i> Tambah Pegawai</a>
    <a href="<?= route_to('admin.pegawai.report') ?>" class="btn btn-secondary mb-2"><i class="fas fa-print"></i> Cetak Laporan Pegawai</a>
    <div class="row">
        <?php foreach ($pegawai as $data) : ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        <?= strtoupper($data->jabatan) ?>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b><?= ucwords($data->nama) ?></b></h2>
                                <p class="text-muted text-sm"><b>akses: </b><?= ucfirst($data->role) ?></p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-address-book"></i></span>NIK: <?= $data->nik ?></li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-venus-mars"></i></span>Gender: <?= $data->jk ?></li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="<?= $data->foto == NULL ? base_url() . '/assets/dist/profile_default.png' : base_url() . '/photo/' . $data->foto ?>" alt="user-avatar" class="img-circle img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php
                        if ($data->id_pegawai == $id_pegawai) { ?>
                            <div class="text-right">
                                <a href="<?= route_to('admin.profile') ?>" class="btn btn-sm bg-info">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                        <?php } elseif ($data->role == 'kades') { ?>
                            <div class="text-right">
                                <a href="<?= route_to('admin.pegawai.edit', $data->id_pegawai) ?>" class="btn btn-sm bg-info">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                        <?php } else { ?>
                            <div class="text-right">
                                <a href="<?= route_to('admin.pegawai.edit', $data->id_pegawai) ?>" class="btn btn-sm bg-info">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="<?= route_to('admin.pegawai.delete', $data->id_pegawai) ?>" class="btn btn-sm bg-danger" onclick='return window.confirm("Are you sure you want to delete this?")'>
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<?= $this->endsection() ?>