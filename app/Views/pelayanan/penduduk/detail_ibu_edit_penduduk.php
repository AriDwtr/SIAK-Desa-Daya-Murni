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
            <form action="<?= route_to('pelayanan.penduduk.ibu.update', $ibu['id_ibu']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="form-group">
                        <input type="number" name="id_penduduk" value="<?= $ibu['id_penduduk'] ?>" class="form-control" id="exampleInputEmail1" hidden>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Induk KTP (NIK) Istri</label>
                        <input type="number" name="nik" value="<?= $ibu['nik_ibu'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Nomor Induk KTP (NIK)">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Lengkap Istri</label>
                        <input type="text" name="nama" value="<?= $ibu['nama_ibu'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin Istri</label>
                        <select class="form-control" name="jk">
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tempat Lahir Istri</label>
                                <input type="text" name="tmpt" value="<?= $ibu['tempat_lahir_ibu'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Lahir Istri</label>
                                <input type="date" name="tanggal" value="<?= $ibu['tgl_lahir_ibu'] ?>" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Agama Istri</label>
                        <select class="form-control" name="agama">
                            <option value="Islam" <?= $ibu['agama_ibu']=="Islam" ? 'selected' : '' ?> >Islam</option>
                            <option value="Protestan" <?= $ibu['agama_ibu']=="Protestan" ? 'selected' : '' ?> >Protestan</option>
                            <option value="Katolik" <?= $ibu['agama_ibu']=="Katolik" ? 'selected' : '' ?> >Katolik</option>
                            <option value="Hindu" <?= $ibu['agama_ibu']=="Hindu" ? 'selected' : '' ?> >Hindu</option>
                            <option value="Buddha" <?= $ibu['agama_ibu']=="Buddha" ? 'selected' : '' ?> >Buddha</option>
                            <option value="Khonghucu" <?= $ibu['agama_ibu']=="Khonghucu" ? 'selected' : '' ?> >Khonghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pekerjaan Istri</label>
                        <input type="text" name="pekerjaan" value="<?= $ibu['pekerjaan_ibu'] ?>" class="form-control" placeholder="Pekerjaan">
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-user-plus"></i> Perbaharui Data Istri</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<?= $this->endsection() ?>