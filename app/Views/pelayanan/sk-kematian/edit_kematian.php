<?= $this->extend('pelayanan/theme/main_theme') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Surat Ket. Kematian</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('pelayanan.dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Surat Ket. Kematian</li>
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
            <h3 class="card-title">Edit Surat Domisili</h3>
        </div>
        <div class="card-body">
            <form action="<?= route_to('pelayanan.kematian.update', $kematian['id_kematian']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Induk KTP (NIK)</label>
                        <input type="number" name="nik" value="<?= $kematian['nik'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Nomor Induk KTP (NIK)">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Lengkap</label>
                        <input type="text" name="nama" value="<?= $kematian['nama'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option value="Laki - Laki" <?= $kematian['jenis_kelamin']=="Laki - Laki" ? 'selected' : '' ?> >Laki - Laki</option>
                            <option value="Perempuan" <?= $kematian['jenis_kelamin']=="Perempuan" ? 'selected' : '' ?> >Perempuan</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tempat Lahir</label>
                                <input type="text" name="tmpt" value="<?= $kematian['tempat_lahir'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Lahir</label>
                                <input type="date" name="tanggal" value="<?= $kematian['tgl_lahir'] ?>" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Agama</label>
                        <select class="form-control" name="agama">
                            <option value="Islam" <?= $kematian['agama']=="Islam" ? 'selected' : '' ?> >Islam</option>
                            <option value="Protestan" <?= $kematian['agama']=="Protestan" ? 'selected' : '' ?> >Protestan</option>
                            <option value="Katolik" <?= $kematian['agama']=="Katolik" ? 'selected' : '' ?> >Katolik</option>
                            <option value="Hindu" <?= $kematian['agama']=="Hindu" ? 'selected' : '' ?> >Hindu</option>
                            <option value="Buddha" <?= $kematian['agama']=="Buddha" ? 'selected' : '' ?> >Buddha</option>
                            <option value="Khonghucu" <?= $kematian['agama']=="Khonghucu" ? 'selected' : '' ?> >Khonghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Pekerjaan</label>
                        <input type="text" name="pekerjaan" value="<?= $kematian['pekerjaan'] ?>" class="form-control" placeholder="Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat Tinggal"><?= $kematian['alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Wafat</label>
                        <input type="date" name="tanggal_wafat" value="<?= $kematian['tanggal_wafat'] ?>" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Lokasi Pemakaman</label>
                        <input type="text" name="pemakaman" value="<?= $kematian['alamat_makam'] ?>" class="form-control" placeholder="Lokasi Pemakaman">
                    </div>
                    <div class="form-group">
                        <label for="customFile">Upload foto KTP</label>

                        <div class="custom-file">
                            <input type="file" name="photo" value="<?= $kematian['foto_dokumen'] ?>" class="custom-file-input" id="exampleInputFile" onchange="preview()" accept="image/png, image/jpeg, image/jpg">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <img  id="frame" class="mt-3" src="<?= base_url().'/berkas/'.$kematian['foto_dokumen'] ?>" width="100" height="100" alt="User profile picture">
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-copy"></i> Perbaharui Surat</button>
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