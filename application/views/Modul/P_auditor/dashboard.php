<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row top_tiles">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-money blue"></i></div>
          <div class="count"><?= $cetak_pengajuan?></div>
          <h3>Pengajuan Pinjam</h3>
          <p>Dalam proses mengajukan pinjaman</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-recycle purple"></i></div>
          <div class="count"><?= $cetak_belum_lunas?></div>
          <h3>Belum Lunas</h3>
          <p>Pinjaman telah diterima dan sedang berjalan.</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-bell-o red"></i></div>
          <div class="count"><?= $cetak_macet?></div>
          <h3>Pinjaman Macet</h3>
          <p>Mempunyai masalah dalam angsuran</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-check-square-o green"></i></div>
          <div class="count"><?= $cetak_lunas?></div>
          <h3>Sudah Lunas</h3>
          <p>Sudah melunasi hutang pinjaman</p>
        </div>
      </div>
    </div>
    <hr>

    <script>
      window.onload = function () {

      var chart = new CanvasJS.Chart("chartContainer", {
      	exportEnabled: true,
      	animationEnabled: true,
      	title:{
      		text: "Perbandingan Nasabah Yang Melunasi Pinjaman"
      	},
      	subtitles: [{
      		text: "Data 5 Bulan Terakhir <?= date("Y-m-d",strtotime("-1 month"));?>"
      	}],
      	axisX: {
      		title: "States"
      	},
      	axisY: {
      		title: "Orang",
      		titleFontColor: "#4F81BC",
      		lineColor: "#4F81BC",
      		labelFontColor: "#4F81BC",
      		tickColor: "#4F81BC"
      	},
      	axisY2: {
      		title: "Belum Lunas - Orang",
      		titleFontColor: "#C0504E",
      		lineColor: "#C0504E",
      		labelFontColor: "#C0504E",
      		tickColor: "#C0504E"
      	},
      	toolTip: {
      		shared: true
      	},
      	legend: {
      		cursor: "pointer",
      		itemclick: toggleDataSeries
      	},
      	data: [{
      		type: "column",
      		name: "Lunas",
      		showInLegend: true,
      		yValueFormatString: "#,##0.# orang",
      		dataPoints: [
            { label: "<?= date("F Y",strtotime("-5 month"));?>", y: <?= $l5?> },
            { label: "<?= date("F Y",strtotime("-4 month"));?>", y: <?= $l4?> },
            { label: "<?= date("F Y",strtotime("-3 month"));?>", y: <?= $l3?> },
            { label: "<?= date("F Y",strtotime("-2 month"));?>", y: <?= $l2?> },
            { label: "<?= date("F Y",strtotime("-1 month"));?>", y: <?= $l1?> }
      		]
      	},
      	{

      		type: "column",
      		name: "Belum Lunas",
      		showInLegend: true,
      		yValueFormatString: "#,##0.# orang",
      		dataPoints: [
      			{ label: "<?= date("F Y",strtotime("-5 month"));?>", y: <?= $bl5?> },
      			{ label: "<?= date("F Y",strtotime("-4 month"));?>", y: <?= $bl4?> },
      			{ label: "<?= date("F Y",strtotime("-3 month"));?>", y: <?= $bl3?> },
      			{ label: "<?= date("F Y",strtotime("-2 month"));?>", y: <?= $bl2?> },
      			{ label: "<?= date("F Y",strtotime("-1 month"));?>", y: <?= $bl1?> }
      		]
      	}]
      });
      chart.render();

      function toggleDataSeries(e) {
      	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
      		e.dataSeries.visible = false;
      	} else {
      		e.dataSeries.visible = true;
      	}
      	e.chart.render();
      }

      }
    </script>

<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



  </div>
</div>
