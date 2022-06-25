<?= $this->extend('admin/theme/main_theme') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pegawai</h1>
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
<section class="content">

    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4>Periksa Entrian Form</h4>
            </hr />
            <?php echo session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>
    <!-- Default box -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Pegawai [ <?= strtoupper($pegawai['nama']).'- 0'.$pegawai['id_pegawai'] ?> ]</h3>
        </div>
        <div class="card-body">
            <form action="<?= route_to('admin.pegawai.update', $pegawai['id_pegawai']) ?>" method="POST">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Induk KTP (NIK)</label>
                                <input type="number" name="nik" value="<?= $pegawai['nik'] ; ?>" class="form-control" id="exampleInputEmail1" placeholder="Nomor Induk KTP (NIK)">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Induk Pegawai (NIP)</label>
                                <input type="number" name="nip" value="<?= $pegawai['nip'] ; ?>" class="form-control" id="exampleInputEmail1" placeholder="Nomor Induk Pegawai (NIP)">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Lengkap</label>
                        <input type="text" name="nama" value="<?= $pegawai['nama'] ; ?>" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option value="Laki - Laki" <?= $pegawai['jk']=='Laki - Laki' ? 'selected': '' ?>>Laki - Laki</option>
                            <option value="Perempuan" <?= $pegawai['jk']=='Perempuan' ? 'selected': '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tempat Lahir</label>
                                <input type="text" name="tmpt" value="<?= $pegawai['tempat_lahir'] ; ?>" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Lahir</label>
                                <input type="date" name="tanggal" value="<?= $pegawai['tanggal_lahir'] ; ?>" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" name="jabatan">
                            <?php foreach ($jabatan as $jabatan) : ?>
                               <option value="<?= $jabatan['id_jabatan'] ?>" <?= $pegawai['id_jabatan']==$jabatan['id_jabatan'] ? 'selected' : ' ' ?>> <?= $jabatan['jabatan'] ?></option>;
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-user-plus"></i> Perbaharui Pegawai</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<?= $this->endsection() ?>