<?= $this->extend('pelayanan/theme/main_theme') ?>

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
                <h1>Ket. Kematian</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('pelayanan.dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Ket. Kematian</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success alert-dismissible mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-copy"></i> Proses Berhasil</h5>
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>
    <a href="<?= route_to('pelayanan.kematian.create') ?>" class="btn btn-lg btn-primary mb-3"><i class="fas fa-copy"></i> <i class="fas fa-plus"></i>&nbsp;&nbsp; Buat Surat Baru</a>
    <a href="<?= route_to('pelayanan.kematian.report') ?>" class="btn btn-lg btn-warning mb-3"><i class="fas fa-scroll"></i>&nbsp;&nbsp; Laporan Ket. Kematian</a>
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Tanggal Wafat</th>
                        <th>Lokasi Pemakanan</th>
                        <th><center>Cetak</center> </th>
                        <th><center>Action</center> </th>
                    </tr>
                </thead>
               <tbody>
               <?php
               $no = 1; 
               foreach ($kematian as $data) : ?>
                <tr>
                    <td><?= $no ++ ?></td>
                    <td><b><?= $data['nik'] ?></b></td>
                    <td><?= ucwords($data['nama']) ?></td>
                    <td><?= ucwords($data['tempat_lahir']).', '.date('j F Y', strtotime($data['tgl_lahir']))?></td>
                    <td><?= date('j F Y', strtotime($data['tanggal_wafat'])) ?></td>
                    <td><?= ucwords($data['alamat_makam']) ?></td>
                    <td>
                        <center>
                        <a href="<?= route_to('pelayanan.kematian.cetak', $data['id_kematian']) ?>" class="btn btn-secondary"><i class="fas fa-print"></i></a>
                        </center>
                    </td>
                    <td>
                        <center>
                            <a href="<?= route_to('pelayanan.kematian.edit', $data['id_kematian']) ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="<?= route_to('pelayanan.kematian.delete', $data['id_kematian']) ?>" class="btn btn-danger" onclick='return window.confirm("Are you sure you want to delete this?")'><i class="fas fa-trash"></i></a>
                        </center>
                    </td>
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
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<?= $this->endsection() ?>