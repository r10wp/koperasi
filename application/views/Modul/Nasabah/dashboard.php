<div class="right_col" role="main">
  <div class="">

    <?php foreach ($cetak_detail1 as $detail1): ?>


    <div class="clearfix"></div>
      <div class="row tile_count">
        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"> &nbsp; </span>
          <div class="count">Dana Simpan</div>
          <span class="count_bottom">&nbsp; </span>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"> Saldo Simpanan Pokok</span>
          <div class="count green"><?= rupiahform($detail1->saldo_pokok)?></div>
          <span class="count_bottom">&nbsp; </span>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"> Saldo Simpanan Wajib</span>
          <div class="count green"><?= rupiahform($detail1->saldo_wajib)?></div>
          <span class="count_bottom"> &nbsp; </span>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top">Saldo Simpanan Sukarela</span>
          <div class="count green"><?= rupiahform($detail1->saldo_sukarela)?></div>
          <span class="count_bottom"> &nbsp; </span>
        </div>
      </div>

      <div class="row tile_count">
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"> &nbsp; </span>
          <div class="count ">Total Simpanan</div>
          <span class="count_bottom">&nbsp; </span>
        </div>
        <div class="col-md-5 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top">&nbsp;</span>
          <div class="count  green"><?= rupiahset($detail1->saldo_pokok+$detail1->saldo_wajib+$detail1->saldo_sukarela)?></div>
          <span class="count_bottom  green"> <?= terbilang($detail1->saldo_pokok+$detail1->saldo_wajib+$detail1->saldo_sukarela)?> Rupiah</span>
        </div>
      </div>

    <hr>

    <div class="row tile_count ">
      <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-bank"></i> Total Hutang Ke Koperasi</span>
        <div class="count red"><?= rupiahform($cetak_hutang-$cetak_hutang_terbayar)?></div>
        <span class="count_bottom"><?= terbilang($cetak_hutang-$cetak_hutang_terbayar)?> Rupiah</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-star-half-empty  "></i> Sudah Terbayar</span>
        <div class="count blue"><?php if ($cetak_hutang == 0 || $cetak_hutang == null): ?>
          0 %
        <?php else: ?>
          <?= number_format(($cetak_hutang_terbayar/$cetak_hutang)*100,2);?>%
        <?php endif; ?>
        </div>
        <span class="count_bottom">&nbsp;</span>
      </div>

      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-share-square-o"></i> Jumlah Penarikan Bulan Ini</span>
        <div class="count purple"><?= rupiahform($cetak_penarikan)?></div>
        <span class="count_bottom">&nbsp;</span>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-sign-in"></i> Total Simpanan Bulan Ini</span>
        <div class="count aero"><?= rupiahform($cetak_simpanan)?></div>
        <span class="count_bottom">&nbsp;</span>
      </div>
    </div>

    <div class="row">
      <div class="row top_tiles">

        <!-- <div class="col-md-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Kotak Pesan </h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <?php foreach ($cetak_list1 as $list1) : ?>
                <article class="media event">
                  <a class="pull-left date">
                    <p class="month"><?= date("M", strtotime(substr($list1->dikirim_pukul,0, 10))); ?></p>
                    <p class="day"><?= date("d", strtotime(substr($list1->dikirim_pukul, 0, 10))); ?></p>
                  </a>
                  <div class="media-body">
                    <a class="title" href="#"><?= $list1->nama?></a>
                    <p><?= $list1->judul?></p>
                  </div>
                </article>
              <?php endforeach; ?>
            </div>
          </div>
        </div> -->

        <div class="col-md-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>3 Aktifitas Terakhir </h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <?php foreach ($tampil_simpanan_terakhir as $simpanan_akhir) :?>
                <article class="media event">
                  <a class="pull-left date">
                    <p class="month"><?= date("M", strtotime(substr($simpanan_akhir->tgl_lakukan_simpan, 0, 10))); ?></p>
                    <p class="day"><?= date("d", strtotime(substr($simpanan_akhir->tgl_lakukan_simpan, 0, 10))); ?></p>
                  </a>
                  <div class="media-body">
                    <a class="title" href="#">Aktivitas Simpan Terakhir</a>
                    <p>
                      <?php if($simpanan_akhir->jenis_simpanan == 3): ?>
                        Melakukan Simpanan Sukarela sebesar <?= rupiahset($simpanan_akhir->total_setoran) ?>
                      <?php endif?>

                      <?php if($simpanan_akhir->jenis_simpanan == 2): ?>
                        Melakukan Simpanan Wajib sebesar <?= rupiahset($simpanan_akhir->total_setoran) ?>
                      <?php endif?>
                    </p>
                  </div>
                </article>
              <?php endforeach ?>

              <?php foreach ($tampil_ambil_terakhir as $ambil_akhir): ?>
                <article class="media event">
                  <a class="pull-left date">
                    <p class="month"><?= date("M", strtotime(substr($ambil_akhir->tgl_pengajuan, 0, 10))); ?></p>
                    <p class="day"><?= date("d", strtotime(substr($ambil_akhir->tgl_pengajuan, 0, 10))); ?></p>
                  </a>
                  <div class="media-body">
                    <a class="title" href="#">Aktivitas Pengambailan Terakhir</a>
                    <p>Melakukan pengambilan dana sebesar <?= rupiahset($ambil_akhir->total_dana_diajukan) ?></p>
                  </div>
                </article>
              <?php endforeach ?>

              <?php foreach ($tampil_pinjaman_terakhir as $pinjam_akhir) :?>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month"><?= date("M", strtotime(substr($pinjam_akhir->tgl_pinjaman, 0, 10))); ?></p>
                  <p class="day"><?= date("d", strtotime(substr($pinjam_akhir->tgl_pinjaman, 0, 10))); ?></p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Aktivitas Pinjam Dana Terakhir</a>
                  <p>Melakukan peminjaman dana sebesar <?= rupiahset($pinjam_akhir->jumlah_pinjaman_diajukan) ?></p>
                </div>
              </article>
              <?php endforeach ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
