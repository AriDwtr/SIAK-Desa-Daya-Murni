<?= $this->extend('pelayanan/theme/main_theme') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('pelayanan.dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
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
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-user-plus"></i> Proses Berhasil</h5>
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= $foto == NULL ? base_url() . '/assets/dist/profile_default.png' : base_url() . '/photo/'.$foto ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= ucwords($pegawai['nama']) ?></h3>

                        <p class="text-muted text-center">
                            <?php foreach ($profile as $data) : ?>
                                <?= $data->jabatan ?></p>
                    <?php endforeach ?>

                    <a href="<?= route_to('pelayanan.profile.photo') ?>" class="btn btn-success btn-block"><b>Ubah Foto</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Atur Password</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <form class="form-horizontal" action="<?= route_to('pelayanan.profile.update', $pegawai['id_pegawai']) ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="nik" value="<?= $pegawai['nik'] ?>" class="form-control" id="inputName" placeholder="Nomor Induk Keluarga">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">NIP</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="nip" value="<?= $pegawai['nip'] ?>" class="form-control" id="inputName" placeholder="Nomor Induk Pegawai">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" value="<?= $pegawai['nama'] ?>" class="form-control" id="inputName" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="jk">
                                                <option value="Laki - Laki" <?= $pegawai['jk'] == 'Laki - Laki' ? 'selected' : '' ?>>Laki - Laki</option>
                                                <option value="Perempuan" <?= $pegawai['jk'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="tmpt" value="<?= $pegawai['tempat_lahir'] ?>" class="form-control" id="inputName" placeholder="Tempat Lahir">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="tanggal" value="<?= $pegawai['tanggal_lahir'] ?>" class="form-control" id="inputName">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Agama</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="agama">
                                                <option value="Islam" <?= $pegawai['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
                                                <option value="Protestan" <?= $pegawai['agama'] == 'Protestan' ? 'selected' : '' ?>>Protestan</option>
                                                <option value="Katolik" <?= $pegawai['agama'] == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                                                <option value="Hindu" <?= $pegawai['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                                <option value="Buddha" <?= $pegawai['agama'] == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                                                <option value="Khonghucu" <?= $pegawai['agama'] == 'Khonghucu' ? 'selected' : '' ?>>Khonghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <?php foreach ($profile as $data) : ?>
                                            <input type="text" value="<?= $data->jabatan ?>" class="form-control" readonly>
                                             <?php endforeach ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat Tinggal"><?= $pegawai['alamat'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Perbaharui Profil</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" action="<?= route_to('pelayanan.profile.update.password', $pegawai['id_pegawai']) ?>" method="POST">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?=  $pegawai['username'] ?>" id="inputName" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" id="inputEmail" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-3 col-form-label">Re-type Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="repassword" class="form-control" id="inputName2" placeholder="Tulis Ulang Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-danger">Ubah Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endsection() ?>