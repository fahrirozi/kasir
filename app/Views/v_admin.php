<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $total_produk ?></h3>
                <p>Product</p>
              </div>
              <div class="icon">
                <i class="fas fa-boxes"></i>
              </div>
              <a href="<?= base_url('Produk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $total_kategori ?></h3>

                <p>Kategori</p>
              </div>
              <div class="icon">
                <i class="fas fa-th-list"></i>
              </div>
              <a href="<?= base_url('Kategori') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $total_satuan ?></h3>

                <p>Satuan</p>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
              <a href="<?= base_url('Satuan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $total_user ?></h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?= base_url('Satuan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-primary">
              <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Income</span>
                <span class="info-box-number">Rp. <?= $p_harian == null ? '0' : number_format($p_harian['total_harga'], 0) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
</div>
      
<div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-indigo">
              <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Income Bulan Ini</span>
                <span class="info-box-number">Rp. <?= number_format($p_bulanan['total_harga'], 0) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
</div>

<div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-lime">
              <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Income Tahun Ini</span>
                <span class="info-box-number">Rp. <?= number_format($p_tahunan['total_harga'], 0) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
</div>

<div class="col-md-12">
<canvas id="myChart" width="100%" height="35px"></canvas>
</div>

<?php 

 if ($grafik == null) {
    $tgl[] = 0;
    $total[] = 0;
    $untung[] = 0;
  } else {
    foreach ($grafik as $key => $value) {

        $tgl[] = $value['tgl_jual'];
        $total[] = $value['total_harga'];
        $untung[] = $value['untung'];
    }
  }

 ?>
   <script src="<?= base_url('AdminSB')?>/vendor/chart.js/Chart.min.js"></script>
   <script>
  const ctx = document.getElementById('myChart');
  const myChart = new Chart(ctx, {
    type: 'line' ,
    data: {
      labels: <?= json_encode($tgl) ?>,
      datasets: [{
        label: 'Grafik Pendapatan Bulan <?= date('M-Y') ?>',
        data: <?= json_encode($total) ?>,
        
        backgroundColor: [
      
      'rgba(54, 162, 235, 0.2)',
   
    ],
    borderColor: [
      
      'rgb(54, 162, 235, 1)'
      
    ],
        borderWidth: 1
      },
      {
        label: 'Grafik Profit Bulan <?= date('M-Y') ?>',
        data: <?= json_encode($untung) ?>,
        backgroundColor: [
      
      'rgba(153, 102, 255, 0.2)',
   
    ],
    borderColor: [
      
      'rgb(153, 102, 255)'
      
    ],
        borderWidth: 1
      }]
    },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
  });
</script>