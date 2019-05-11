<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <?php foreach ($cetak_detail1 as $detail1): ?>

    <div class="row">

        <form class="form-horizontal form-label-left input_mask" method="post" action="<?= base_url('New_nasabah/form3')?>">
          <div class="col-md-5 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Cari Kelompok Beserta Penanggung Jawab</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                <div class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <select name="provinsi" id="provinsi" class="jschosen form-control">
                        <option>- Select Provinsi -</option>
                        <?php foreach($cetak_form1 as $prov){ ?>
                          <option value="<?= $prov->id?>"><?=$prov->nama?></option>';
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kabupaten </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <select name="kab" class="jschosen form-control" id="kabupaten">
                        <option value=''>- Select Kabupaten -</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <select name="kec" class="jschosen form-control" id="kecamatan" required>
                        <option value="">- Select Kecamatan -</option>
                      </select>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                    <div class="form-group">

                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <a href="<?= base_url('New_nasabah')?>" class="btn btn-default"> Kembali</a>
                        <?php if ($detail1->id_kelompok == null): ?>
                          <?php if ($kelompok_sedang_dipilih == 0): ?>
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Pencarian Manual</button>
                            <hr>

                            <?php if ($detail1->kec_tinggal != null): ?>
                              <a href="<?= base_url('New_nasabah/form32/'.$detail1->kec_tinggal)?>" class="btn btn-info"><i class="fa fa-search"></i> Lihat Rekomendasi Kelompok</a>
                            <?php endif; ?>

                          <?php endif; ?>
                        <?php else: ?>
                          Sudah Terdaftar Di Kelompok

                        <?php endif; ?>

                      </div>

                      <!-- <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <hr>
                        <span>Gunakan pencarian manual apabila rekomendasi kelompok tidak dapat ditemukan</span>
                      </div> -->
                    </div>
                  </div>


              </div>
            </div>
          </div>
    </div>
    <div class="row">
        <div class="form-horizontal form-label-left input_mask" method="post" action="<?= base_url('New_nasabah/form3')?>">
          <div class="col-md-5 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Kelompok Saat Ini</h2>
                <div class="clearfix"></div>
              </div>
                <div class="x_content">
                <br />

                <?php if ($detail1->id_kelompok == null): ?>
                  <?php if ($kelompok_sedang_dipilih == 0): ?>
                    <h4><font color="red">Anda Belum Memilih Kelompok!.</font></h4>
                  <?php elseif($kelompok_sedang_dipilih == 1): ?>
                    <?php foreach ($cetak_detail2 as $detail2): ?>
                      <?php if ($detail2->status_terima_dari_kelompok == 0): ?>
                        <?php if ($detail2->kelompok_yang_dituju == null): ?>
                          <h5><font color="red"><i class="fa fa-close"></i> Anda Ditolak Oleh Kelompok Tersebut</font></h5>
                          <h5><font color="green"><i class="fa fa-bullhorn"></i> Silahkan Cari dan Pilih Kelompok Lainnya</font></h5>
                          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Mulai Pencarian</button>
                        <?php else: ?>
                          <?php if ($detail2->status_terima_dari_kelompok == 0): ?>
                            <h5><font color="red"><i class="fa fa-close"></i> Anda Ditolak Oleh Kelompok Tersebut</font></h5>
                            <h5><font color="green"><i class="fa fa-bullhorn"></i> Silahkan Cari dan Pilih Kelompok Lainnya</font></h5>
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Mulai Pencarian</button>
                          <?php else: ?>
                            <h4><font color="orange"><i class="fa fa-clock-o"></i> Dalam Proses Pengajuan</font></h4>
                            <h5><font color="orange">Silahkan Hubungi Ketua Kelompok Untuk Informasi Lebih Lanjut.</font></h5>
                            <a href="<?= base_url('New_nasabah/form33/'.$detail2->id)?>"><b>Detail Kelompok</b></a>
                          <?php endif; ?>
                        <?php endif; ?>
                        </form>
                      <?php elseif($detail2->status_terima_dari_kelompok == -1):?>
                        <h4><font color="orange"><i class="fa fa-clock-o"></i> Dalam Proses Pengajuan</font></h4>
                        <h5><font color="orange">Silahkan Hubungi Ketua Kelompok Untuk Informasi Lebih Lanjut.</font></h5>
                        <a href="<?= base_url('New_nasabah/form33/'.$detail2->kelompok_yang_dituju)?>"><b>Detail Kelompok</b></a>
                      <?php elseif($detail2->status_terima_dari_kelompok == 1): ?>
                        <h4><b> Telah Terdaftar Di :</b></h4>
                        <div class="form-horizontal form-label-left">
                          <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Kelompok</label>
                            <div class="col-md-8">
                              <input type="text" class="form-control" value="<?= $detail1->nama_kel?>" readonly/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Ketua </label>
                            <div class="col-md-8">
                              <input type="text" class="form-control" value="<?= $detail1->nama_ketua?>" readonly/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Kecamatan</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input type="text" class="form-control" value="<?= $detail1->nama_kecamatan?>" readonly/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>

                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <a href="<?= base_url('New_nasabah/form33/'.$detail2->kelompok_yang_dituju)?>"><b>Lihat Detail Kelompok</b>
                                <i class="fa fa-chevron-right"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>


                    <?php endforeach; ?>
                  <?php endif; ?>


                <?php else: ?>
                  <h4><b> Telah Terdaftar Di :</b></h4>
                  <div class="form-horizontal form-label-left">
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Kelompok</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" value="<?= $detail1->nama_kel?>" readonly/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Ketua </label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" value="<?= $detail1->nama_ketua?>" readonly/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-3 col-xs-12">Kecamatan</label>
                      <div class="col-md-8 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" value="<?= $detail1->nama_kecamatan?>" readonly/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-3 col-xs-12"></label>

                      <div class="col-md-8 col-sm-9 col-xs-12">
                        <a href="<?= base_url('New_nasabah/form33/'.$detail1->id_kelompok)?>"><b>Lihat Detail Kelompok</b>
                          <i class="fa fa-chevron-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>

                <?php endif; ?>
                </div>
              <?php endforeach; ?>
              </div>
            </div>
          </div>
    </div>
  </div>
</div>
