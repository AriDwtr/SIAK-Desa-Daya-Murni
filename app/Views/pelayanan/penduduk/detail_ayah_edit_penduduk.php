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
            <form action="<?= route_to('pelayanan.penduduk.ayah.update', $ayah['id_ayah']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="form-group">
                        <input type="number" name="id_penduduk" value="<?= $ayah['id_penduduk'] ?>" class="form-control" id="exampleInputEmail1" hidden>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Induk KTP (NIK) Suami</label>
                        <input type="number" name="nik" value="<?= $ayah['nik_ayah'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Nomor Induk KTP (NIK)">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Lengkap Suami</label>
                        <input type="text" name="nama" value="<?= $ayah['nama_ayah'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin Suami</label>
                        <select class="form-control" name="jk">
                            <option value="Laki - Laki">Laki - Laki</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tempat Lahir Suami</label>
                                <input type="text" name="tmpt" value="<?= $ayah['tempat_lahir_ayah'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Lahir Suami</label>
                                <input type="date" name="tanggal" value="<?= $ayah['tgl_lahir_ayah'] ?>" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Agama Suami</label>
                        <select class="form-control" name="agama">
                            <option value="Islam" <?= $ayah['agama_ayah']=="Islam" ? 'selected' : '' ?> >Islam</option>
                            <option value="Protestan" <?= $ayah['agama_ayah']=="Protestan" ? 'selected' : '' ?> >Protestan</option>
                            <option value="Katolik" <?= $ayah['agama_ayah']=="Katolik" ? 'selected' : '' ?> >Katolik</option>
                            <option value="Hindu" <?= $ayah['agama_ayah']=="Hindu" ? 'selected' : '' ?> >Hindu</option>
                            <option value="Buddha" <?= $ayah['agama_ayah']=="Buddha" ? 'selected' : '' ?> >Buddha</option>
                            <option value="Khonghucu" <?= $ayah['agama_ayah']=="Khonghucu" ? 'selected' : '' ?> >Khonghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pekerjaan Suami</label>
                        <input type="text" name="pekerjaan" value="<?= $ayah['pekerjaan_ayah'] ?>" class="form-control" placeholder="Pekerjaan">
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-user-plus"></i> Perbaharui Data Suami</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<?= $this->endsection() ?>