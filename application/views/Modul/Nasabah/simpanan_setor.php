<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Formulir Setoran Nasabah</h3>
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
            <form class="form-horizontal form-label-left input_mask" method="post" action="<?=  base_url('Nasabah/SetorSimpananNasabah')?>">
              <div class="form-group">
                <label class="control-label col-md-5 col-sm-3 col-xs-12">No. Anggota Koperasi</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="<?= $detail1->nomor_anggota?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5 col-sm-3 col-xs-12">Nama Nasabah</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="<?= $detail1->nama?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5 col-sm-3 col-xs-12">Rekening Penyetor </label>
                <div class="col-md-7 ">
                  <select class="form-control" name="rek_pengguna" required>
                    <option value="" style="text-align: right;">-- Pilih Rekening Bank --</option>
                    <?php foreach ($cetak_form2 as $rekening): ?>
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
                <label class="control-label col-md-5 col-sm-4 col-xs-12">Pilih Bank Tujuan Transfer</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <select class="form-control" id="set_bank" name="rek_id" required>
                    <option value="">Pilih Bank</option>
                    <?php foreach ($cetak_form1 as $set_rekening) { ?>
                      <option value="<?= $set_rekening->id?>" data-no-rek="<?= $set_rekening->no_rekening?>" data-na-rek="<?= $set_rekening->nama_pemilik_rekening?>" data-na-ba="<?= $set_rekening->nama_bank?>"><?= $set_rekening->nama_bank?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5 col-sm-4 col-xs-12">No. Rekening Tujuan</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                <input type="text" class="form-control" id="no_rek" readonly/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5 col-sm-3 col-xs-12">Nama Rekening Tujuan</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                <input type="text" class="form-control" id="na_rek" readonly/>
                </div>
              </div>
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
            <h2>Data Setoran</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <div class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Lakukan Setoran</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="<?= date('d F Y') ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Total Setoran (Rp)</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="jumlah_setor" id="rupiah" required/>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Keterangan</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <textarea class="form-control" name="keterangan" placeholder="*Jika Ada..."></textarea>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('Nasabah/listSimpanan')?>" class="btn btn-default">Kembali</a>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Proses Setoran</button>
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
