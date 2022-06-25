<?= $this->extend('pelayanan/theme/main_theme') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Surat Ket. Kelahiran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('pelayanan.dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Surat Ket. Kelahiran</li>
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
        <div class="card-header">
            <h3 class="card-title">Form Surat Ket. Kelahiran</h3>
        </div>
        <div class="card-body">
            <form action="<?= route_to('pelayanan.kelahiran.store') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div id="accordion">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                        Data Diri Ayah
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nomor Induk KTP Ayah (NIK)</label>
                                        <input type="number" name="nik_ayah" value="<?= old('nik_ayah'); ?>" class="form-control" id="exampleInputEmail1" placeholder="Nomor Induk KTP Ayah (NIK)">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Lengkap Ayah</label>
                                        <input type="text" name="nama_ayah" value="<?= old('nama_ayah'); ?>" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap Ayah">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tempat Lahir Ayah</label>
                                                <input type="text" name="tmpt_ayah" value="<?= old('tmpt_ayah'); ?>" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir Ayah">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tanggal Lahir Ayah</label>
                                                <input type="date" name="tanggal_ayah" value="<?= old('tanggal_ayah'); ?>" class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile">Upload foto KTP</label>

                                        <div class="custom-file">
                                            <input type="file" name="photo" class="custom-file-input" id="exampleInputFile" onchange="preview()" accept="image/png, image/jpeg, image/jpg">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <img id="frame" class="mt-3" src="<?= base_url() . '/assets/dist/images_default.png' ?>" width="100" height="100" alt="User profile picture">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                        Data Diri Ibu
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nomor Induk KTP Ibu (NIK)</label>
                                        <input type="number" name="nik_ibu" value="<?= old('nik_ibu'); ?>" class="form-control" id="exampleInputEmail1" placeholder="Nomor Induk KTP Ibu (NIK)">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Lengkap Ibu</label>
                                        <input type="text" name="nama_ibu" value="<?= old('nama_ibu'); ?>" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap Ibu">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tempat Lahir Ibu</label>
                                                <input type="text" name="tmpt_ibu" value="<?= old('tmpt_ibu'); ?>" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir Ibu">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tanggal Lahir Ibu</label>
                                                <input type="date" name="tanggal_ibu" value="<?= old('tanggal_ibu'); ?>" class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                        Data Diri Anak
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Lengkap Anak</label>
                                        <input type="text" name="nama_anak" value="<?= old('nama_anak'); ?>" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap Anak">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tempat Lahir Anak</label>
                                                <input type="text" name="tmpt_anak" value="<?= old('tmpt_anak'); ?>" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir Anak">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tanggal Lahir Anak</label>
                                                <input type="date" name="tanggal_anak" value="<?= old('tanggal_anak'); ?>" class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin Anak</label>
                                        <select class="form-control" name="jk">
                                            <option value="Laki - Laki">Laki - Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Agama Anak</label>
                                        <select class="form-control" name="agama">
                                            <option value="Islam">Islam</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat Lahir</label>
                                        <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat Lahir"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-copy"></i> Buat Surat Kelahiran</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<?= $this->endsection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url() ?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<?= $this->endsection() ?>

<?= $this->section('js_ex') ?>

<script>
    $(function() {
        bsCustomFileInput.init();
    });

    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
<?= $this->endsection() ?>