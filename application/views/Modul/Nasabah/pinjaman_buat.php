<div class="right_col" role="main">
  <div class="clearfix"></div>
  <form class="form-horizontal form-label-left input_mask" method="post" action="<?= base_url('Nasabah/ajukanPinjaman')?>">
    <div class="row">
      <div class="col-md-5 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Pinjaman</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
              <div class="form-group">
                <label class="control-label col-md-5 col-sm-6 col-xs-12">Jenis Pinjaman</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <select class="form-control" id="set_jenis_pinjaman" name="id_pinjam" required>
                    <option value="">- Pilih Jenis Pinjaman -</option>
                    <?php foreach ($cetak_form1 as $set_jp) { ?>
                      <option value="<?= $set_jp->id?>" data-batas-pinjam="<?= rupiahset($set_jp->batas_maksimal_pinjaman)?>"
                        data-batas-angsuran="<?= $set_jp->batas_jumlah_angsuran?>" data-bunga="<?= $set_jp->bunga_pinjaman?>"
                        data-denda="<?= $set_jp->denda_per_hari?>" data-batas-pinjam2="<?= rupiahset($set_jp->batas_minimal_pinjaman)?>"
                        data-keterangan_pinjaman_js="<?= $set_jp->keterangan?>"><?= $set_jp->nama?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-5 col-sm-3 col-xs-12">Jumlah Minimal Untuk Pinjaman</label>
                <div class="col-md-6 col-sm-9 col-xs-12">
                  <input type="text" id="batas_pinjam2" class="form-control" readonly />
                </div>
                <div class="col-md-6 col-sm-9 col-xs-12">
                  <font color="orange">Minimal Jumlah Pinjaman</font>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-5 col-sm-3 col-xs-12">Boleh Pinjam Dana Sampai </label>
                <div class="col-md-6 col-sm-9 col-xs-12">
                  <input type="text" id="batas_pinjam" class="form-control" name="batas_max" readonly />
                </div>
                <div class="col-md-6 col-sm-9 col-xs-12">
                  <font color="orange">Maximal Jumlah Pinjaman</font>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-5 col-sm-3 col-xs-12">Boleh Diangsur Sebanyak</label>
                <div class="col-md-2 col-sm-9 col-xs-12">
                  <input type="text" id="batas_angsuran" class="form-control" name="cicilan" readonly />
                </div>
                <div class="col-md-6 col-sm-9 col-xs-12">
                  <font color="orange">Kali (Maximal Angsuran)</font>
                </div>

              </div>



                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-3 col-xs-12">Besaran Bunga </label>
                  <div class="col-md-2 col-sm-9 col-xs-12">
                    <input type="text" id="bp" class="form-control" readonly/>
                  </div>%
                </div>


              <div class="form-group">
                <label class="control-label col-md-5 col-sm-3 col-xs-12">Denda Keterlambatan Pembayaran / Hari</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <input type="text" id="denda" class="form-control" readonly/>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-5 col-sm-3 col-xs-12">Keterangan</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <textarea class="form-control" id="keterangan_pinjaman_js" rows="5" readonly></textarea>
                </div>
              </div>

              <div class="ln_solid"></div>



          </div>
        </div>
      </div>

      <div class="col-md-7 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Detail Pinjaman</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <div class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-6 col-xs-12">Jenis Keperluan Pinjaman</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <select class="form-control" name="jenis_keperluan_pinjaman" >
                    <option value="">- Pilih Jenis Keperluan Pinjaman -</option>
                    <?php foreach ($cetak_form3 as $jenis_keperluan) { ?>
                      <option value="<?= $jenis_keperluan->id?>"><?= $jenis_keperluan->jenis?>  </option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-6 col-xs-12">Rekening Pencairan Dana</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <select class="form-control" name="bank_nasabah" >
                    <option value="">- Pilih Bank Transfer -</option>
                    <?php foreach ($cetak_form4 as $rekening) { ?>
                      <option value="<?= $rekening->id?>">
                        <?= $rekening->no_rekening_nasabah?>
                        <?php $a = strlen($rekening->no_rekening_nasabah);
                              $x = 15 - $a;
                              $y = 15 - $a;
                              echo str_repeat("&nbsp;", $x+$y);?>
                        - <?= $rekening->nama_bank?> -
                      </option>
                    <?php } ?>
                  </select>
                  <span>Rekening nasabah untuk menerima pencairan dana pinjaman</span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Keterangan Tambahan</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <textarea class="form-control" name="keterangan_pinjam" placeholder="*Jika Ada"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Jumlah Pinjaman</label>
                <div class="col-md-4 col-sm-9 col-xs-12">
                  <input type="text" name="jumlah_pinjam" class="form-control" id="rupiah" placeholder="Rp. ... ,00"/>

                  <input type="number" class="form-control" id="balance_max" style="display: none;" />
                  <input type="number" class="form-control" id="balance_min" style="display: none;" />
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Bunga + Jumlah Pinjaman</label>
                <div class="col-md-5 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" id="total_semua" name="jumlah_dana_bunga" readonly  />
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Ekspektasi Tanggal Lunas</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" id="datesum" class="form-control" readonly  />
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Jatuh Tempo per Bulan</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" id="datetempo" class="form-control" readonly  />
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Tagihan Pertama</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" id="first_tax" class="form-control" readonly  />
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">

                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('Nasabah')?>" class="btn btn-default">Kembali</a>

                  <?php if ($cetak_tunggakan > 0): ?>
                    <?php
                      $persen = ($cetak_hutang_terbayar/$cetak_hutang)*100;
                    ?>
                    <?php if ($persen > 50): ?>
                      <button type="submit" class="btn btn-primary" onclick="myFunction()">Ajukan Pinjaman</button>
                    <?php else: ?>
                      <button type="submit" class="btn btn-primary" disabled>Ajukan Pinjaman</button>
                      <h2>Anda tidak dapat melakukan peminjaman sebelum melunasi tunggakan pinjaman sebelumnya hingga 50% dari total pinjaman.</h2>
                    <?php endif; ?>

                  <?php else: ?>
                    <button type="submit" class="btn btn-primary" onclick="myFunction()">Ajukan Pinjaman</button>
                  <?php endif; ?>


                </div>
              </div>
              </div>

          </div>
        </div>
      </div>



    </div>
  </form>
</div>
