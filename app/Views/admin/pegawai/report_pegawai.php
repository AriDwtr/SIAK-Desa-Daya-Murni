<?= $this->extend('admin/theme/main_theme') ?>

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
                    <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th>NIK</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
               <tbody>
                <?php 
                $no = 1;
                foreach ($pegawai as $data) {
                ?>
                <tr>
                    <td><center><?= $no++ ?></center></td>
                    <td><b><?= $data->nik ?></b></td>
                    <td><b><?= $data->nip ?></b></td>
                    <td><?= strtoupper($data->nama) ?></td>
                    <td><?= $data->jk ?></td>
                    <td><?= ucwords($data->tempat_lahir).', '.date('j F Y', strtotime($data->tanggal_lahir))?></td>
                    <td><i><?= ucfirst($data->jabatan) ?></i></td>
                </tr>
                <?php } ?>
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
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<?= $this->endsection() ?>