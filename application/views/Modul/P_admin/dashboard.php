<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <?php if ( $total_aktivitas =  $aktivitas_ambil + $aktivitas_simpan+ $aktivitas_pinjam  == 0) {?>
      <h1>Belum ada aktivitas dari nasabah di bulan <?= date('F')?></h1>
    <?php } else { ?>
      <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    <?php } ?>

    <div class="row tile_count">
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Pengeluaran Bulan Ini</span>
        <div class="count "><?= rupiahdot($cetak_pinjaman+$cetak_penarikan)?></div>
        <span class="count_bottom"><i class="green">4% </i> From last Week</span>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Pinjaman</span>
        <div class="count dark"><?= rupiahdot($cetak_pinjaman)?></div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Penarikan</span>
        <div class="count red"><?= rupiahdot($cetak_penarikan)?></div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div>
    </div>

    <div class="row tile_count">
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Pemasukan Bulan Ini</span>
        <div class="count green"><?= rupiahdot($cetak_simpanan2+$cetak_simpanan3)?></div>
        <span class="count_bottom">&nbsp;</span>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Setoran Wajib Terkumpul Bulan Ini</span>
        <div class="count blue"><?= rupiahdot($cetak_simpanan2)?></div>
        <span class="count_bottom">&nbsp;</span>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Setoran Sukarela Terkumpul Bulan Ini</span>
        <div class="count blue"><?= rupiahdot($cetak_simpanan3)?></div>
        <span class="count_bottom">&nbsp;</span>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Pembayaran Pinjaman</span>
        <div class="count blue"><?= rupiahdot($cetak_hutang_terbayar)?></div>
        <span class="count_bottom">&nbsp;</span>
      </div>
    </div>



    <script>
      <?php echo $total_aktivitas =  $aktivitas_ambil + $aktivitas_simpan+ $aktivitas_pinjam ?>

      window.onload = function() {

      var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        exportEnabled: true,
        animationEnabled: true,
        title: {
          text: "Kecenderungan Aktifitas Nasabah Bulan Ini"
        },
        data: [{
          type: "pie",
          startAngle: 25,
          toolTipContent: "<b>{label}</b>: {y}%",
          showInLegend: "true",
          legendText: "{label}",
          indexLabelFontSize: 16,
          indexLabel: "{label} - {y}%",
          dataPoints: [
            { y: parseFloat(<?= ($aktivitas_pinjam/$total_aktivitas) * 100 ?>).toFixed(3), label: "Pinjam" },
            { y: parseFloat(<?= ($aktivitas_simpan/$total_aktivitas) * 100 ?>).toFixed(3), label: "Simpan" },
            { y: parseFloat(<?= ($aktivitas_ambil/$total_aktivitas) * 100 ?>).toFixed(3), label: "Tarik Dana" },
            // { y: 5.02, label: "Microsoft Edge" },
          ]
        }]
      });
      chart.render();  }
    </script>


    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <div class="clearfix"></div>
  </div>
</div>
