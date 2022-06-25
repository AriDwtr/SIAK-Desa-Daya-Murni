<?= $this->extend('pelayanan/theme/main_theme') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $surat['domisili'] ?></h3>
                    <p>Tercetak</p>
                </div>
                <div class="icon">
                    <i class="fas fa-scroll"></i>
                </div>
                <a href="<?= route_to('pelayanan.domisili') ?>" class="small-box-footer">
                    Surat Ket. Domisili <i class="fas fa-scroll"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $surat['kelahiran'] ?></h3>
                    <p>Tercetak</p>
                </div>
                <div class="icon">
                    <i class="fas fa-scroll"></i>
                </div>
                <a href="<?= route_to('pelayanan.kelahiran') ?>" class="small-box-footer">
                    Surat Ket. Kelahiran <i class="fas fa-scroll"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $surat['kematian'] ?></h3>
                    <p>Tercetak</p>
                </div>
                <div class="icon">
                    <i class="fas fa-scroll"></i>
                </div>
                <a href="<?= route_to('pelayanan.kematian') ?>" class="small-box-footer">
                    Surat Ket. Kematian <i class="fas fa-scroll"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $surat['pindah_datang'] ?></h3>
                    <p>Tercetak</p>
                </div>
                <div class="icon">
                    <i class="fas fa-scroll"></i>
                </div>
                <a href="<?= route_to('pelayanan.pindahdatang') ?>" class="small-box-footer">
                    Surat Ket. Pindah datang <i class="fas fa-scroll"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3><?= $surat['tidak_mampu'] ?></h3>
                    <p>Tercetak</p>
                </div>
                <div class="icon">
                    <i class="fas fa-scroll"></i>
                </div>
                <a href="<?= route_to('pelayanan.tidakmampu') ?>" class="small-box-footer">
                    Surat Ket. Tidak Mampu <i class="fas fa-scroll"></i>
                </a>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
<?= $this->endsection() ?>