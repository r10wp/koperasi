<div class="right_col" role="main">
  <div class="clearfix"></div>
  <?php foreach ($cetak_detail1 as $detail1): ?>


    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Detail Data Penarikan : <?= $detail1->kode_ambil?></h2>
            <div class="clearfix"></div>
          </div>
          <form class="form-horizontal form-label-left" method="post" action="<?= base_url('P_admin/aksiAmbil/'.$detail1->kode_ambil)?>">
          <div class="x_content">
            <br />
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Data Nasabah
              </label>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <input name="no_anggota" type="text" value="<?= $detail1->nomor_anggota?>" readonly class="form-control">
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <input type="text" value="<?= $detail1->nama_anggota?>" readonly class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Di Ambil Dari Dana</label>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <select class="form-control" name="jenis_simpanan" style="width:150px" disabled>
                  <option value="2" <?php if ($detail1->jenis_ambil_simpanan == 1){ echo "selected"; }; ?>>Pokok</option>
                  <option value="2" <?php if ($detail1->jenis_ambil_simpanan == 2){ echo "selected"; }; ?>>Wajib</option>
                  <option value="3" <?php if ($detail1->jenis_ambil_simpanan == 3){ echo "selected"; }; ?>>Sukarela</option>
                </select>
              </div>
            </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tgl. Lakukan Penarikan
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->tgl_pengajuan?>" class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>

              <!-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Dana Pengajuan dan Yang diberikan
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= rupiahset($detail1->total_dana_diajukan)?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                </div>
                <?php if ($detail1->total_dana_diberikan != null): ?>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input value="<?= rupiahset($detail1->total_dana_diberikan)?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                  </div>
                <?php endif; ?>
              </div> -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Rekening Bank Nasabah
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->nama_bank_nasabah?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->no_rekening_nasabah?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->nama_pemilik_dalam_rekening?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                </div>
              </div>


              <?php if ($detail1->total_dana_diberikan == null): ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Dana Pengambilan
                  </label>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <?php if ($detail1->total_dana_diberikan == null): ?>
                      <input name="dana" value="" id="rupiah" class="form-control col-md-7 col-xs-12" type="text" required>
                      <input type="hidden" name="kirim" value="<?= $detail1->no_hp1?>">
                      <span>Dana yang diberikan</span>
                    <?php else: ?>
                      <input value="<?= rupiahset($detail1->total_dana_diberikan)?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input value="<?= rupiahset($detail1->total_dana_diajukan)?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                    <span>Yang Diminta Untuk Diambil</span>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <p>Saldo Yang Dapat Diambil Saat Ini : <br>
                      <strong> <?= rupiahset($detail1->saldo_sukarela)?></strong></p>
                  </div>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Dana Pengambilan
                  </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input value="<?= rupiahset($detail1->total_dana_diajukan)?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                    <span>Yang Diminta Untuk Diambil</span>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input value="<?= rupiahset($detail1->total_dana_diberikan)?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                    <span>Yang Diberikan Oleh Koperasi</span>
                  </div>
                </div>
              <?php endif; ?>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Tambahan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control col-md-7 col-xs-12"><?= $detail1->keterangan_tambahan?></textarea>
                </div>
              </div>
              <div class="ln_solid"></div>
          </div>
          <div class="x_content">
            <?php if ($detail1->tgl_pencairan_dana != null): ?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Pencairan
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->tgl_pencairan_dana?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pengurus Pencairan
                </label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->id_pengurus?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama_pengurus?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>
            <?php endif; ?>


              <?php if ($detail1->status_ambil != 1 ): ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Rekening Pencairan Koperasi
                  </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                  <select class="form-control" id="set_bank" name="rek_id" required>
                    <option value="">- Pilih Bank Pencairan-</option>
                    <?php foreach ($cetak_form1 as $set_rekening) { ?>
                      <?php if ($set_rekening->id == $detail1->no_rek_koperasi ): ?>
                        <option value="<?= $detail1->no_rek_koperasi?>"  data-no-rek="<?= $set_rekening->no_rekening?>" data-na-rek="<?= $set_rekening->nama_pemilik_rekening?>" data-na-ba="<?= $set_rekening->nama_bank?>" selected><?= $detail1->nama_bank?></option>
                      <?php else: ?>
                        <option value="<?= $set_rekening->id?>" data-no-rek="<?= $set_rekening->no_rekening?>" data-na-rek="<?= $set_rekening->nama_pemilik_rekening?>" data-na-ba="<?= $set_rekening->nama_bank?>"><?= $set_rekening->nama_bank?></option>
                      <?php endif; ?>
                    <?php } ?>
                  </select>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input id="no_rek" class="form-control col-md-7 col-xs-12" readonly type="text">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input id="na_rek" class="form-control col-md-7 col-xs-12" readonly type="text">
                  </div>
                </div>
              <?php elseif($detail1->status_ambil == 1): ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Rekening Pencairan Koperasi
                  </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" value="<?= $detail1->nama_bank_koperasi?>" readonly type="text">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" value="<?= $detail1->no_rekening?>" readonly type="text">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input class="form-control col-md-7 col-xs-12" value="<?= $detail1->nama_pemilik_rekening?>" readonly type="text">
                  </div>
                </div>
              <?php endif; ?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Status Terakhir Pengambilan
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <span>
                    <?php if ($detail1->status_ambil == -3): ?>
                      <p style="color:red"> Tidak Bisa Di Versikasi Karena Gagal VCode</p>
                    <?php elseif($detail1->status_ambil == -2): ?>
                      <p style="color:orange"> Pernah Ditangguhkan</p>
                    <?php elseif($detail1->status_ambil == -1): ?>
                      <p style="color:orange"> Menunggu Pencairan</p>
                    <?php elseif($detail1->status_ambil == 0): ?>
                      <p style="color:red"> Pengambilan Di Tolak</p>
                    <?php elseif($detail1->status_ambil == 1): ?>
                      <p style="color:blue"> Sudah Di Cairkan</p>
                    <?php endif; ?>
                  </span>
                </div>

              </div>

              <!-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >
                </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <input name="ver" id="radio2" onclick="enableTxtBox1()" type="radio" value="-1" class="form-radio" style="background-color: #7ed6df" required/> Izinkan Pengambilan
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input name="ver" id="radio1" onclick="enableTxtBox1()" type="radio" value="0" class="form-radio" style="background-color: #ff7979" required /> Tangguhkan
                </div>
              </div> -->

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('P_admin')?>" class="btn btn-default" type="button">Kembali</a>
                  <?php if ($detail1->status_ambil == -3): ?>

                  <?php elseif($detail1->status_ambil == -2): ?>
                    <button type="submit" class="btn btn-primary">Cairkan Dana</button>
                  <?php elseif($detail1->status_ambil == -1): ?>
                    <button type="submit" class="btn btn-primary">Cairkan Dana</button>
                  <?php elseif($detail1->status_ambil == 0): ?>

                  <?php elseif($detail1->status_ambil == 1): ?>

                  <?php endif; ?>
                </div>
              </div>

          </div>
        </form>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

</div>
