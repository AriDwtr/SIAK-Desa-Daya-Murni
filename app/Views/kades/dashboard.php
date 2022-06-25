<?= $this->extend('kades/theme/main_theme') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
</section>

<!-- Main content -->
<section class="content">

   <div class="row">
      <div class="col-md-6">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Statistik Layanan</h3>
            </div>
            <div class="card-body">
               <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->

      </div>
      <div class="col-md-6">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Statistik Penduduk Terdaftar</h3>
            </div>
            <div class="card-body">
            <div id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->

      </div>
   </div>
   </div>

</section>
<!-- /.content -->
<?= $this->endsection() ?>

<?= $this->section('js_ex') ?>
<script>
   $(function() {

      var bar_data = {
         data: [
            [1, <?= $penduduk ?>],
            [2, <?= $ayah ?>],
            [3, <?= $ibu ?>],
            [4, <?= $anak ?>],
         ],
         bars: {
            show: true
         }
      }
      $.plot('#bar-chart', [bar_data], {
         grid: {
            borderWidth: 1,
            borderColor: '#f3f3f3',
            tickColor: '#f3f3f3'
         },
         series: {
            bars: {
               show: true,
               barWidth: 0.5,
               align: 'center',
            },
         },
         colors: ['#3c8dbc'],
         xaxis: {
            ticks: [
               [1, 'Total KK'],
               [2, 'Kepala Keluarga'],
               [3, 'Perempuan'],
               [4, 'Anak - Anak'],
            ]
         }
      })


      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData = {
         labels: [
            'Domisili',
            'Kematian',
            'Kelahiran',
            'Pindah datang',
            'Tidak Mampu'
         ],
         datasets: [{
            data: [<?= $surat['domisili'] ?>, <?= $surat['kematian'] ?>, <?= $surat['kelahiran'] ?>, <?= $surat['pindah_datang'] ?>, <?= $surat['tidak_mampu'] ?>],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
         }]
      }
      var donutOptions = {
         maintainAspectRatio: false,
         responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
         type: 'doughnut',
         data: donutData,
         options: donutOptions
      })
   })
</script>
<?= $this->endsection() ?>