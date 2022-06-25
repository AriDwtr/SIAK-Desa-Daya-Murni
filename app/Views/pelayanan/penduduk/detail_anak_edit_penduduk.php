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
            <form action="<?= route_to('pelayanan.penduduk.anak.update', $anak['id_anak']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="form-group">
                        <input type="number" name="id_penduduk" value="<?= $anak['id_penduduk'] ?>" class="form-control" id="exampleInputEmail1" hidden>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Induk KTP (NIK) Anak</label>
                        <input type="number" name="nik" value="<?= $anak['nik_anak'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Nomor Induk KTP (NIK)">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Lengkap Anak</label>
                        <input type="text" name="nama" value="<?= $anak['nama_anak'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin Anak</label>
                        <select class="form-control" name="jk">
                        <option value="Laki - Laki"  <?= $anak['jenis_kelamin_anak']=="Laki - Laki" ? 'selected' : '' ?>>Laki - Laki</option>
                            <option value="Perempuan"  <?= $anak['jenis_kelamin_anak']=="Perempuan" ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tempat Lahir Anak</label>
                                <input type="text" name="tmpt" value="<?= $anak['tempat_lahir_anak'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Lahir Anak</label>
                                <input type="date" name="tanggal" value="<?= $anak['tgl_lahir_anak'] ?>" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Agama Anak</label>
                        <select class="form-control" name="agama">
                            <option value="Islam" <?= $anak['agama_anak']=="Islam" ? 'selected' : '' ?> >Islam</option>
                            <option value="Protestan" <?= $anak['agama_anak']=="Protestan" ? 'selected' : '' ?> >Protestan</option>
                            <option value="Katolik" <?= $anak['agama_anak']=="Katolik" ? 'selected' : '' ?> >Katolik</option>
                            <option value="Hindu" <?= $anak['agama_anak']=="Hindu" ? 'selected' : '' ?> >Hindu</option>
                            <option value="Buddha" <?= $anak['agama_anak']=="Buddha" ? 'selected' : '' ?> >Buddha</option>
                            <option value="Khonghucu" <?= $anak['agama_anak']=="Khonghucu" ? 'selected' : '' ?> >Khonghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pekerjaan Anak</label>
                        <input type="text" name="pekerjaan" value="<?= $anak['pekerjaan_anak'] ?>" class="form-control" placeholder="Pekerjaan">
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-user-plus"></i> Perbaharui Data Anak</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<?= $this->endsection() ?>