<?= $this->extend('kades/theme/main_theme') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endsection() ?>

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
                    <li class="breadcrumb-item"><a href="<?= route_to('kades.dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card card-primary card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Report Pelayanan Domisili
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Pekerjaan</th>
                        <th>Alamat</th>
                        <th>Tanggal Pembuatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($domisili as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><b><?= $data['nik'] ?></b></td>
                            <td><?= ucwords($data['nama']) ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= ucwords($data['tempat_lahir']) . ', ' . date('j F Y', strtotime($data['tgl_lahir'])) ?></td>
                            <td><?= ucwords($data['pekerjaan']) ?></td>
                            <td><?= ucwords($data['alamat']) ?></td>
                            <td><?= date('j F Y', strtotime($data['tgl_buat'])) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card card-primary card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Report Pelayanan Kelahiran
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th>Nama Anak</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Nama ayah</th>
                        <th>Nama Ibu</th>
                        <th>Alamat Lahir</th>
                        <th>Tanggal Pembuatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kelahiran as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= ucwords($data['nama_anak']) ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= ucwords($data['tempat_lahir_anak']) . ', ' . date('j F Y', strtotime($data['tgl_lahir_anak'])) ?></td>
                            <td><?= ucwords($data['nama_ayah']) ?></td>
                            <td><?= ucwords($data['nama_ibu']) ?></td>
                            <td><?= ucwords($data['lokasi_lahir']) ?></td>
                            <td><?= date('j F Y', strtotime($data['tgl_buat'])) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card card-primary card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Report Pelayanan Kematian
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Tanggal Wafat</th>
                        <th>Lokasi Pemakanan</th>
                        <th>Tanggal Pembuatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kematian as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><b><?= $data['nik'] ?></b></td>
                            <td><?= ucwords($data['nama']) ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= ucwords($data['tempat_lahir']) . ', ' . date('j F Y', strtotime($data['tgl_lahir'])) ?></td>
                            <td><?= date('j F Y', strtotime($data['tanggal_wafat'])) ?></td>
                            <td><?= ucwords($data['alamat_makam']) ?></td>
                            <td><?= date('j F Y', strtotime($data['tgl_buat'])) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card card-primary card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Report Pelayanan Pindah Datang
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="example4" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat Asal</th>
                        <th>Alamat Tujuan</th>
                        <th>Tanggal Pembuatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pindahdatang as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><b><?= $data['nik'] ?></b></td>
                            <td><?= ucwords($data['nama']) ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= ucwords($data['tempat_lahir']) . ', ' . date('j F Y', strtotime($data['tgl_lahir'])) ?></td>
                            <td><?= ucwords($data['alamat_sekarang']) ?></td>
                            <td><?= ucwords($data['alamat_tujuan']) ?></td>
                            <td><?= date('j F Y', strtotime($data['tgl_buat'])) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card card-primary card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Report Pelayanan Pindah Datang
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Pekerjaan</th>
                        <th>Alamat</th>
                        <th>Tanggal Pembuatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tidakmampu as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><b><?= $data['nik'] ?></b></td>
                            <td><?= ucwords($data['nama']) ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= ucwords($data['tempat_lahir']) . ', ' . date('j F Y', strtotime($data['tgl_lahir'])) ?></td>
                            <td><?= ucwords($data['pekerjaan']) ?></td>
                            <td><?= ucwords($data['alamat']) ?></td>
                            <td><?= date('j F Y', strtotime($data['tgl_buat'])) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
<?= $this->endsection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<?= $this->endsection() ?>

<?= $this->section('js_ex') ?>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["excel", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["excel", "print", "colvis"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        $("#example3").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["excel", "print", "colvis"]
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
        $("#example4").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["excel", "print", "colvis"]
        }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
        $("#example5").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["excel", "print", "colvis"]
        }).buttons().container().appendTo('#example5_wrapper .col-md-6:eq(0)');


    });
</script>
<?= $this->endsection() ?>