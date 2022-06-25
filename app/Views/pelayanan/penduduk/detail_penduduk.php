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
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success alert-dismissible mb-3">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-copy"></i> Proses Berhasil</h5>
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
            <?php if ($ayah < 1 ) { ?>
                <a href="<?= route_to('pelayanan.penduduk.ayah.tambah', $id) ?>" class="btn btn-block btn-primary btn-sm"><i class="fas fa-user-plus"></i> Tambah Data Suami</a></h3>
            <?php } ?>    
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIK Suami</th>
                        <th>Nama Suami</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b><?= $ayah['nik_ayah'] ?></b></td>
                        <td><?= strtoupper($ayah['nama_ayah']) ?></td>
                        <td><?= ucwords($ayah['tempat_lahir_ayah']) . ', ' . date('j F Y', strtotime($ayah['tgl_lahir_ayah'])) ?></td>
                        <td><?= $ayah['agama_ayah'] ?></td>
                        <td><?= ucwords($ayah['pekerjaan_ayah']) ?></td>
                        <td>
                        <center>
                            <a href="<?= route_to('pelayanan.penduduk.ayah.edit', $ayah['id_ayah']) ?>" class="btn btn-info" style="display:inline ;"><i class="fas fa-edit"></i></a>
                            <a href="<?= route_to('pelayanan.penduduk.ayah.delete', $ayah['id_ayah']) ?>" class="btn btn-danger" onclick='return window.confirm("Are you sure you want to delete this?")'><i class="fas fa-trash"></i></a>
                        </center>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= route_to('pelayanan.penduduk.ibu.tambah', $id) ?>" class="btn btn-block btn-primary btn-sm"><i class="fas fa-user-plus"></i> Tambah Data Istri</a></h3>  
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIK Istri</th>
                        <th>Nama Istri</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($ibu as $ibu) :?>
                    <tr>
                        <td><b><?= $ibu['nik_ibu'] ?></b></td>
                        <td><?= strtoupper($ibu['nama_ibu']) ?></td>
                        <td><?= ucwords($ibu['tempat_lahir_ibu']) . ', ' . date('j F Y', strtotime($ibu['tgl_lahir_ibu'])) ?></td>
                        <td><?= $ibu['agama_ibu'] ?></td>
                        <td><?= ucwords($ibu['pekerjaan_ibu']) ?></td>
                        <td>
                        <center>
                            <a href="<?= route_to('pelayanan.penduduk.ibu.edit', $ibu['id_ibu']) ?>" class="btn btn-info" style="display:inline ;"><i class="fas fa-edit"></i></a>
                            <a href="<?= route_to('pelayanan.penduduk.ibu.delete', $ibu['id_ibu']) ?>" class="btn btn-danger" onclick='return window.confirm("Are you sure you want to delete this?")'><i class="fas fa-trash"></i></a>
                        </center>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= route_to('pelayanan.penduduk.anak.tambah', $id) ?>" class="btn btn-block btn-primary btn-sm"><i class="fas fa-user-plus"></i> Tambah Data Anak</a></h3>  
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIK Anak</th>
                        <th>Nama Anak</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($anak as $anak) :?>
                    <tr>
                        <td><b><?= $anak['nik_anak'] ?></b></td>
                        <td><?= strtoupper($anak['nama_anak']) ?></td>
                        <td><?= ucwords($anak['tempat_lahir_anak']) . ', ' . date('j F Y', strtotime($anak['tgl_lahir_anak'])) ?></td>
                        <td><?= $anak['agama_anak'] ?></td>
                        <td><?= $anak['jenis_kelamin_anak'] ?></td>
                        <td><?= ucwords($anak['pekerjaan_anak']) ?></td>
                        <td>
                        <center>
                            <a href="<?= route_to('pelayanan.penduduk.anak.edit', $anak['id_anak']) ?>" class="btn btn-info" style="display:inline ;"><i class="fas fa-edit"></i></a>
                            <a href="<?= route_to('pelayanan.penduduk.anak.delete', $anak['id_anak']) ?>" class="btn btn-danger" onclick='return window.confirm("Are you sure you want to delete this?")'><i class="fas fa-trash"></i></a>
                        </center>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<?= $this->endsection() ?>