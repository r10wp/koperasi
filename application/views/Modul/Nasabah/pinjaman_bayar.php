<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Formulir Bayar Pinjaman</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Nasabah dan Rekening Tujuan</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <?php foreach ($cetak_detail1 as $detail1): ?>

            <form class="form-horizontal form-label-left input_mask" method="post" action="<?=  base_url('Nasabah/bayarPinjaman/'.$detail1->kode_bayar)?>" enctype="multipart/form-data">

              <input type="hidden" name="kode_pinjam" value="<?= $detail1->kode_pinjaman?>">
              <?php if ($detail1->status_bayar != 1): ?>


                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Nasabah</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" value="<?= $detail1->nama?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Rekening Penyetor </label>
                  <div class="col-md-8 ">
                    <select class="form-control" name="id_rekening_nasabah" required>
                      <option value="" style="text-align: right;" >-- Pilih Rekening Bank --</option>
                      <?php foreach ($cetak_form1 as $rekening): ?>
                        <option value="<?= $rekening->id?>">
                          <?= $rekening->no_rekening_nasabah?>
                          <?php $a = strlen($rekening->no_rekening_nasabah);
                                $x = 15 - $a;
                                $y = 15 - $a;
                                echo str_repeat("&nbsp;", $x+$y);?>
                          - <?= $rekening->nama_bank?> -
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="ln_solid"></div>

                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Pilih Bank Tujuan</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                    <select class="form-control" id="set_bank" name="id_rekening" required>
                      <option value="">Pilih Bank</option>
                      <?php foreach ($cetak_form2 as $set_rekening) { ?>
                        <option value="<?= $set_rekening->id?>" data-no-rek="<?= $set_rekening->no_rekening?>" data-na-rek="<?= $set_rekening->nama_pemilik_rekening?>" data-na-ba="<?= $set_rekening->nama_bank?>"><?= $set_rekening->nama_bank?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">No. Rekening Tujuan</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" id="no_rek" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Pemilik</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" id="na_rek" readonly/>
                  </div>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Rekening Penyetor </label>
                  <div class="col-md-8 ">
                    <input type="text" class="form-control" value="<?= $detail1->no_rekening_nasabah ?>" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Bank Penyetor </label>
                  <div class="col-md-8 ">
                      <input type="text" class="form-control" value="<?= $detail1->nama_bank_nasabah ?>" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Rekening Penyetor </label>
                  <div class="col-md-8 ">
                      <input type="text" class="form-control" value="<?= $detail1->nama_pemilik_dalam_rekening ?>" readonly/>
                  </div>
                </div>

                <div class="ln_solid"></div>

                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Bank Tujuan</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" value="<?= $detail1->no_rekening ?>" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">No. Rekening Tujuan</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" value="<?= $detail1->nama_bank_koperasi ?>" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Pemilik</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" value="<?= $detail1->nama_pemilik_rekening ?>" readonly/>
                  </div>
                </div>
              <?php endif; ?>
          </div>
        </div>

        <div class="x_panel">
          <div class="x_title">
            <h2>Catatan</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <h4>Transfer</h4>
              Harus Menggunakan Rekening Yang Tertera
          </div>
        </div>



      </div>

      <div class="col-md-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Pembayaran</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <div class="form-horizontal form-label-left">
              <!-- <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Angsuran Ke </label>
                <div class="col-sm-2">
                  <input type="text" class="form-control"  value="1" readonly>
                </div>
                <div class="col-sm-1">
                  dari
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control"  value="20" readonly>
                </div>
              </div> -->

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Setoran </label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" class="form-control"  value="<?= $detail1->tgl_tagihan_pinjam ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Jatuh Tempo </label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" class="form-control"  value="<?= $detail1->tgl_jatuh_tempo ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Angsuran Asli</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="<?= rupiahset($detail1->angsuran_asli)?>" readonly/>
                </div>
              </div>
              <?php
              if (date('Y-m-d H:i:s') > $detail1->tgl_jatuh_tempo ) {
                $start_date = new DateTime(date('Y-m-d H:i:s'));
                $end_date = new DateTime($detail1->tgl_jatuh_tempo);
                $interval = $start_date->diff($end_date);
                $denda = $interval->days*$detail1->denda_per_hari;
              } else {
                $denda = 0;
              }


              ?>
              <?php if (date('Y-m-d H:i:s') > $detail1->tgl_jatuh_tempo ): ?>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Terlambat Selama</label>
                  <div class="col-md-5 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" value="<?= $interval->days?> Hari" readonly/>
                  </div>
                </div>
              <?php endif; ?>
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Denda</label>
                <div class="col-md-5 col-sm-9 col-xs-12">
                  <input type="text" name="denda" class="form-control" value="<?= rupiahset($denda)?>" readonly/>
                </div>
              </div>
              <hr>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Total Yang Harus Di Setoran (Rp)</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" name="jumlah_setor" class="form-control" value="<?= rupiahset($detail1->angsuran_asli+$denda)?>" readonly/>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Terbilang</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <textarea class="form-control" name="keterangan" readonly><?= terbilang($detail1->angsuran_asli+$denda)?> Rupiah  </textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Upload Bukti Cicilan</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="file" name="bc" class="form-control" accept=".jpg" id="checkext" onchange="ValidateSize(this)" required/>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('Nasabah/pinjamanDetail/'.$detail1->kode_pinjaman)?>" class="btn btn-default">Kembali</a>
                  <?php if ($detail1->status_bayar == 1): ?>
                    Pembayaran Sudah Lunas
                  <?php elseif($detail1->status_bayar == 0): ?>
                    <button type="submit" class="btn btn-success">Upload Ulang</button>
                  <?php elseif($detail1->status_bayar == -1): ?>
                    Menunggu Persetujuan
                  <?php elseif($detail1->status_bayar == -2): ?>
                    <button type="submit" class="btn btn-success">Kirim Bukti Cicil</button>
                  <?php else: ?>

                  <?php endif; ?>

                </div>
              </div>
            </div>
            </form>
            <?php endforeach; ?>
          </div>
        </div>
      </div>



    </div>


  </div>
</div>
