<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="row top_tiles">
        <div class="animated flipInY col-lg-12 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats text-center">
            <!-- <div class="icon"><i class="fa fa-forward "></i></div> -->
            <div class="count"><?= $cetak_total_nasabah?></div>
            <h3>Total Nasabah</h3>
            <p>Merupukan seluruh nasabah yang pernah mendaftar di koperasi, aktif dan tidak aktif</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats text-center">
            <div class="icon"><i class="fa fa-users"></i></div>
            <div class="count"><?= $cetak_nasabah_aktif?></div>
            <h3>Nasabah Aktif</h3>
            <p>Nasabah yang masih aktif melakukan aktivitas di koperasi</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats text-center">
            <div class="icon"><i class="fa fa-plane  "></i></div>
            <div class="count"><?= $cetak_nasabah_non_aktif?></div>
            <h3>Non Aktif</h3>
            <p>Nasabah yang tidak bisa lagi melakukan aktivitas di koperasi</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-user"></i></div>
            <div class="count"><?= $cetak_nasabah_tetap?></div>
            <h3>Nasabah Tetap</h3>
            <p>Pengajuan tidak di izinkan</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-child"></i></div>
            <div class="count"><?= $cetak_calon_nasabah?></div>
            <h3>Calon Nasabah</h3>
            <p>Mencapai Tahap Selesai</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-suitcase "></i></div>
            <div class="count"><?= $cetak_berhenti?></div>
            <h3 >Berhenti</h3>
            <p>Mencapai Tahap Selesai</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-lock"></i></div>
            <div class="count"><?= $cetak_diblokir?></div>
            <h3>Di Blokir</h3>
            <p>Mencapai Tahap Selesai</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
