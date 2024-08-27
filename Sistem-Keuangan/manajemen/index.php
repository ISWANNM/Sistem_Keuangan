<?php include 'header.php'; ?>

<style>
  /* General styles */
  .content-wrapper {
    background-color: #f4f6f9;
    padding: 20px;
  }

  /* Updated small box styles */
  .small-box {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }

  .small-box:hover {
    transform: scale(1.05);
  }

  .bg-gray:hover{
    color:black
  }

  /* Specific box background colors */
  .small-box.bg-green {
    background: linear-gradient(135deg, #28a745, #218838);
    color: #fff;
  }

  .small-box.bg-blue {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: #fff;
  }

  .small-box.bg-orange {
    background: linear-gradient(135deg, #fd7e14, #e66900);
    color: #fff;
  }

  .small-box.bg-black {
    background: linear-gradient(135deg, #343a40, #212529);
    color: #fff;
  }

  .small-box.bg-red {
    background: linear-gradient(135deg, #dc3545, #c82333);
    color: #fff;
  }

  /* Typography */
  h1, h4 {
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
  }

  p {
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
  }

  /* Graphs */
  .chart {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .nav-tabs-custom {
    margin-bottom: 20px;
  }

  /* Calendar */
  .box-solid.bg-green-gradient {
    background: linear-gradient(135deg, #28a745, #218838);
    color: #fff;
  }
</style>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>


  <section class="content">

    <div class="row">

      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php
            $tanggal = date('Y-m-d');
            $pemasukan = mysqli_query($koneksi, "SELECT COALESCE(SUM(transaksi_nominal), 0) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and transaksi_tanggal='$tanggal'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?= "Rp. " . number_format($p['total_pemasukan']) . " ,-" ?></h4>
            <p>Pemasukan Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php
            $bulan = date('m');
            $pemasukan = mysqli_query($koneksi, "SELECT COALESCE(SUM(transaksi_nominal), 0) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and month(transaksi_tanggal)='$bulan'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?= "Rp. " . number_format($p['total_pemasukan']) . " ,-" ?></h4>
            <p>Pemasukan Bulan Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php
            $tahun = date('Y');
            $pemasukan = mysqli_query($koneksi, "SELECT COALESCE(SUM(transaksi_nominal), 0) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and year(transaksi_tanggal)='$tahun'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?= "Rp. " . number_format($p['total_pemasukan']) . " ,-" ?></h4>
            <p>Pemasukan Tahun Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-12 col-xs-6">
        <div class="small-box bg-black">
          <div class="inner">
            <?php
            $pemasukan = mysqli_query($koneksi, "SELECT COALESCE(SUM(transaksi_nominal), 0) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?= "Rp. " . number_format($p['total_pemasukan']) . " ,-" ?></h4>
            <p>Seluruh Pemasukan</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php
            $tanggal = date('Y-m-d');
            $pengeluaran = mysqli_query($koneksi, "SELECT COALESCE(SUM(transaksi_nominal), 0) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and transaksi_tanggal='$tanggal'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>

            <h4 style="font-weight: bolder"><?= "Rp. " . number_format($p['total_pengeluaran']) . " ,-" ?></h4>
            <p>Pengeluaran Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php
            $bulan = date('m');
            $pengeluaran = mysqli_query($koneksi, "SELECT COALESCE(SUM(transaksi_nominal), 0) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and month(transaksi_tanggal)='$bulan'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>

            <h4 style="font-weight: bolder"><?= "Rp. " . number_format($p['total_pengeluaran']) . " ,-" ?></h4>
            <p>Pengeluaran Bulan Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php
            $tahun = date('Y');
            $pengeluaran = mysqli_query($koneksi, "SELECT COALESCE(SUM(transaksi_nominal), 0) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and year(transaksi_tanggal)='$tahun'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>

            <h4 style="font-weight: bolder"><?= "Rp. " . number_format($p['total_pengeluaran']) . " ,-" ?></h4>
            <p>Pengeluaran Tahun Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-12 col-xs-6">
        <div class="small-box bg-black">
          <div class="inner">
            <?php
            $pengeluaran = mysqli_query($koneksi, "SELECT COALESCE(SUM(transaksi_nominal), 0) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            <h4 style="font-weight: bolder"><?= "Rp. " . number_format($p['total_pengeluaran']) . " ,-" ?></h4>
            <p>Seluruh Pengeluaran</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
        </div>
      </div>

    </div>























    <!-- /.row -->
    <!-- Main row -->
    <div class="row">

      <!-- Left col -->
      <section class="col-lg-8">

        <div class="nav-tabs-custom">

          <ul class="nav nav-tabs pull-right">
            <!-- <li><a href="#tab2" data-toggle="tab">Pemasukan</a></li> -->
            <li class="active"><a href="#tab1" data-toggle="tab">Pemasukan & Pengeluaran</a></li>
            <li class="pull-left header">Grafik</li>
          </ul>

          <div class="tab-content" style="padding: 20px">

            <div class="chart tab-pane active" id="tab1">


              <h4 class="text-center">Grafik Data Pemasukan & Pengeluaran Per <b>Bulan</b></h4>
              <canvas id="grafik1" style="position: relative; height: 300px;"></canvas>

              <br />
              <br />
              <br />

              <h4 class="text-center">Grafik Data Pemasukan & Pengeluaran Per <b>Tahun</b></h4>
              <canvas id="grafik2" style="position: relative; height: 300px;"></canvas>

            </div>
            <div class="chart tab-pane" id="tab2" style="position: relative; height: 300px;">
              b
            </div>
          </div>

        </div>

      </section>
      <!-- /.Left col -->


      <section class="col-lg-4">


        <!-- Calendar -->
        <div class="box box-solid bg-blue-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title">Kalender</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->
        </div>


      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->










  </section>

</div>







<?php include 'footer.php'; ?>