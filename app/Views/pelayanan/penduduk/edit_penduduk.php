<?= $this->extend('pelayanan/theme/main_theme') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Penduduk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('pelayanan.dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Data Penduduk</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4>Periksa Entrian Form</h4>
            </hr />
            <?php echo session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>
    <!-- Default box -->
    <div class="card card-secondary">
        <div class="card-body">
            <form action="<?= route_to('pelayanan.penduduk.update', $penduduk['id_penduduk']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Kartu Keluarga</label>
                        <input type="number" name="kk" value="<?= $penduduk['no_kk']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Nomor Kartu Keluarga">
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">RT</label>
                                <input type="number" name="rt" value="<?= $rt ?>" class="form-control" id="exampleInputPassword1" placeholder="RT">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputPassword1">RW</label>
                                <input type="number" name="rw" value="<?= $rw ?>" class="form-control" id="exampleInputPassword1" placeholder="RW">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kelurahan</label>
                        <input type="text" name="kelurahan" value="<?= $penduduk['kelurahan']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Kelurahan">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kecamatan</label>
                        <input type="text" name="kecamatan" value="<?= $penduduk['kecamatan']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Kecamatan">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"><?= $penduduk['alamat']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100"><i class="fas fa-copy"></i> Edit Data Kependudukan</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<?= $this->endsection() ?>