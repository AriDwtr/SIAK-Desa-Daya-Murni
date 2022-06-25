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
                            <img class="profile-user-img img-fluid img-circle" id="frame" src="<?= $foto == NULL ? base_url() . '/assets/dist/profile_default.png' : base_url() . '/photo/'.$foto ?>" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= ucwords($nama) ?></h3>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= route_to('pelayanan.profile.photo.upload', $id_pegawai) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                            <div>
                                <label for="Image" class="form-label">Upload Foto Profile</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile" onchange="preview()" accept="image/png, image/jpeg, image/jpg">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Foto</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-success mt-2">Upload Foto</button>
                        </form>
                    </div>
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