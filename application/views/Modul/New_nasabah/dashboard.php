<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <?php foreach ($cetak_detail1 as $detail1): ?>


      <div class="row">
      <div class="col-md-3 col-xs-12 widget widget_tally_box">
        <div class="x_panel fixed_height_400">
          <div class="x_content">
            <div class="flex">
              <ul class="list-inline widget_profile_box">
                <li>
                  <a>
                    <i class="fa fa-frown-o"></i>
                  </a>
                </li>
                <li>
                  <?php if ($detail1->gambar == null): ?>
                    <img src="<?= base_url()?>theme/images/user.png" alt="..." class="img-circle profile_img">
                  <?php else: ?>

                    <img src="<?= base_url()?>asset/ANGGOTA/<?= $detail1->gambar?>" alt="..." class="img-circle profile_img">
                  <?php endif; ?>
                </li>
                <li>
                  <a>
                    <i class="fa fa-frown-o"></i>
                  </a>
                </li>
              </ul>
            </div>


            <?php if ($detail1->nama_pendek == null ): ?>
              <h3 class="name">Anonim</h3>
            <?php else: ?>
              <h3 class="name">Ny. <?= $detail1->nama_pendek?></h3>
            <?php endif; ?>

            <div class="flex">
              <ul class="list-inline">
                <li>
                  <h3>Selamat Datang Di</h3>
                  <h4 align="center"><strong>Koperasi Dharma Bhakti</strong></h4>
                </li>
              </ul>
            </div>

            <p>
              <strong>*NB </strong> : Apabila Ada Kesulitan Dalam Pengisian Form Silahkan Hubungi : 08133343001 <br>(Ibu Lena : Bagian Informasi)
            </p>
          </div>
        </div>
      </div>
      <?php if ($detail1->status_terima == -3 || $detail1->status_terima == -1): ?>
        <a href="<?= base_url('New_nasabah/form2')?>">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <?php if ($detail1->nama != null && $detail1->nama_pendek != null &&
                        $detail1->alamat_lengkap != null && $detail1->gambar != null &&
                        $detail1->no_ktp != null && $detail1->tgl_lahir != null &&
                        $detail1->no_hp1 != null && $detail1->id_kota_lahir != null ): ?>
                <div class="icon"><i class="fa fa-check-square-o" style="color:#3498db"></i></div>
              <?php else: ?>
                <div class="icon"><i class="fa fa-exclamation-triangle" style="color:#e74c3c"></i></div>
              <?php endif; ?>
              <div class="count">Form 1</div>
              <h3>Data Diri</h3>
              <p>Data Pribadi, Alamat, dan Data Kelahiran</p>
            </div>
          </div>
        </a>
        <a href="<?= base_url('New_nasabah/form1')?>">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <?php if ($detail1->file_attach_ktp_istri != null && $detail1->file_attach_ktp_suami != null && $detail1->file_attach_kartu_keluarga != null ): ?>
                <div class="icon"><i class="fa fa-check-square-o" style="color:#3498db"></i></div>
              <?php else: ?>
                <div class="icon"><i class="fa fa-exclamation-triangle" style="color:#e74c3c"></i></div>
              <?php endif; ?>
              <div class="count">Form 2</div>
              <h3>Upload Berkas</h3>
              <p>KTP / KTP Suami / Kartu Keluarga </p>
            </div>
          </div>
        </a>

        <a href="<?= base_url('New_nasabah/form3')?>">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <?php if ($detail1->id_kelompok != null ): ?>
                <div class="icon"><i class="fa fa-check-square-o" style="color:#3498db"></i></div>
              <?php else: ?>
                <div class="icon"><i class="fa fa-exclamation-triangle" style="color:#e74c3c"></i></div>
              <?php endif; ?>
              <div class="count">Form 3</div>

              <h3>Kelompok</h3>
              <p>Pilih penanggung jawab kelompok</p>
            </div>
          </div>
        </a>
        <a href="<?= base_url('New_nasabah/form4')?>">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <?php if ($detail1->penghasilan_per_bulan != null && $jumlah_pekerjaan_suami != 0 && $jumlah_pekerjaan_anggota != 0 && $detail1->penghasilan_per_bulan_suami != null): ?>
              <div class="icon"><i class="fa fa-check-square-o" style="color:#3498db"></i></div>
            <?php else: ?>
              <div class="icon"><i class="fa fa-exclamation-triangle" style="color:#e74c3c"></i></div>
            <?php endif; ?>
            <div class="count">Form 4</div>
            <h3>Pekerjaan / Usaha</h3>
            <p>Data Pekerjaan dan Usaha Yang Dimiliki</p>
          </div>
        </div>
        </a>
        <a href="<?= base_url('New_nasabah/form5')?>">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <?php if ($detail1->nama_ibu_kandung != null && $detail1->nama_kerabat_yang_dapat_dihubungi != null &&
                      $detail1->hp_kerabat_yg_dpt_dihubungi != null && $detail1->no_tlp_kerabat_yg_dpt_dihubungi != null && $detail1->alamat_kerabat_yang_dapat_dihubungi != null): ?>
              <div class="icon"><i class="fa fa-check-square-o" style="color:#3498db"></i></div>
            <?php else: ?>
              <div class="icon"><i class="fa fa-exclamation-triangle" style="color:#e74c3c"></i></div>
            <?php endif; ?>

            <div class="count">Form 5</div>

            <h3>Data Pendukung</h3>
            <p>Data Ibu dan Kerabat Terdekat</p>
          </div>
        </div>
        </a>
        <a href="<?= base_url('New_nasabah/form6')?>">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="count">Form 6</div>
            <h3>Data Anak</h3>
            <p>Data Singkat Tentang Anak. (Tidak Wajib)</p>
          </div>
        </div>
        </a>
        <a href="<?= base_url('New_nasabah/form7')?>">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <?php if ($check_rekening > 0 ): ?>
                <div class="icon"><i class="fa fa-check-square-o" style="color:#3498db"></i></div>
              <?php else: ?>
                <div class="icon"><i class="fa fa-exclamation-triangle" style="color:#e74c3c"></i></div>
              <?php endif; ?>
              <div class="count">Form 7</div>

              <h3>Data Rekening</h3>
              <p>Informasi Rekening dan Bank yang dipakai</p>
            </div>
          </div>
        </a>
        <a href="<?= base_url('New_nasabah/form8')?>">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <?php if ($detail1->file_attach_bukti_pembayaran_simpanan_pokok_awal != null ): ?>
                <div class="icon"><i class="fa fa-check-square-o" style="color:#3498db"></i></div>
              <?php else: ?>
                <div class="icon"><i class="fa fa-exclamation-triangle" style="color:#e74c3c"></i></div>
              <?php endif; ?>
              <div class="count">Form 8</div>

              <h3>Pembayaran</h3>
              <p>Pembayaran Setoran Pokok</p>
            </div>
          </div>
        </a>
        <a href="<?= base_url('New_nasabah/form_submit')?>">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-send-o" style="color:#3498db"></i>
              </div>
              <div class="count">Ajukan </div>

              <h3>Kirim Semua Berkas Untuk Diverifikasi</h3>
              <p>Periksa Kembali Seluruh Dokumen sebelum dikirim.</p>
            </div>
          </div>
        </a>
      <?php elseif($detail1->status_terima == -2): ?>
        <div class="animated flipInY col-lg-9 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-clock-o" ></i>
            </div>
            <div class="count">Berkas Telah Selesai </div>

            <h3>Silahkan Menunggu Verifikasi Dari Pengurus Koperasi</h3>
            <p>*Jika Dalam 3x24 Jam Tidak Ada Perubahan Silahkan Hubungi Pihak Koperasi</p>
          </div>
        </div>

      <?php endif; ?>

    </div>

    <?php if ($detail1->status_terima == -1){ ?>


      <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Keterangan Tolak</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="col-md-12">
              <!-- blockquote -->
              <blockquote>
                <footer>Ditolak oleh Pengurus Koperasi Pada Tanggal : <cite title="Source Title"><?= fullTime($detail1->tgl_verifikasi) ?></cite>
                </footer>
                <p><?= $detail1->keterangan_tolak ?></p>
              </blockquote>


            </div>


            <div class="clearfix"></div>


          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php endforeach; ?>
  </div>
</div>
