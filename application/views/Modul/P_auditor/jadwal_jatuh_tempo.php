<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Perubahan Pembayaran </h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('P_auditor/jadwalkanJatuhTempo/'.$kode_bayar)?>">
              <?php foreach ($cetak_detail1 as $detail1): ?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Kode Pembayaran
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" readonly value="<?= $detail1->kode_bayar?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Kode Pinjaman
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->kode_pinjaman?>" readonly class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> No / Nama. Anggota
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nomor_anggota?>" readonly class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama?>" readonly class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tgl Tagihan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="tgl_tagihan_pinjam" class="form-control col-md-7 col-xs-12" type="date" value="<?= cutForDate($detail1->tgl_tagihan_pinjam)?>">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tgl Jatuh Tempo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="tgl_jatuh_tempo" class="form-control col-md-7 col-xs-12" type="date" value="<?= cutForDate($detail1->tgl_jatuh_tempo)?>" name="middle-name">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Pembayaran
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12" value="<?= rupiahset($detail1->angsuran_asli)?>" readonly type="text">
                </div>
              </div>
              <!-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Terbilang
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control col-md-7 col-xs-12" readonly><?= terbilang($detail1->angsuran_asli)?> Rupiah</textarea>
                </div>
              </div> -->
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('P_auditor/checkPinjamanTerlewat')?>" class="btn btn-default" type="button">Kembali</a>
                  <button type="submit" class="btn btn-primary">Rubah Data</button>
                </div>
              </div>
              <?php endforeach; ?>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
