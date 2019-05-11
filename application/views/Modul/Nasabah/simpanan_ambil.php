<?php foreach ($cetak_detail1 as $detail1): ?>

<div class="right_col" role="main">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Ambil Simpanan (Sukarela)</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form class="form-horizontal form-label-left" method="POST" action="<?= base_url('Nasabah/ambilSimpanan')?>">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal Buat Pengambilan
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input value="<?= date('d F Y h:i:s')?>" type="text" name="last-name" readonly class="form-control col-md-7 col-xs-12" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Rekening Penyetor </label>
            <div class="col-md-4 ">
              <select class="form-control" name="id_rekening"   required>
                <option value="" style="text-align: right;"  >-- Pilih Rekening Bank --</option>
                <?php foreach ($cetak_form1 as $rekening): ?>
                  <option value="<?= $rekening->id?>">
                    <?= $rekening->no_rekening_nasabah?>
                    <?php $a = strlen($rekening->no_rekening_nasabah);
                          $x = 20 - $a;
                          $y = 20 - $a;
                          echo str_repeat("&nbsp;", $x+$y);?>
                    - <?= $rekening->nama_bank?> -
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah dana yang mau diambil
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="total_ambil" type="text" id="rupiah"  class="form-control col-md-7 col-xs-12" required/>
              <input type="hidden" name="batas_ambil" value="<?= $detail1->saldo_sukarela?>">
              <p>saldo saat ini : Rp <strong><?= rupiahset($detail1->saldo_sukarela)?> </strong>(*Tidak Termasuk Simpanan Pokok Dan Wajib)</p>
              <p>Pengambilan saldo sukarela minimal tersisa Rp 10.000.</p>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor Verifikator
            </label>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <input type="text" value="<?= substr($detail1->no_hp1, 0,4)?>****<?= substr_replace($detail1->no_hp1, "",0, -3)?>" readonly class="form-control col-md-7 col-xs-12" required/>
              <input type="hidden" name="no_hp" value="<?= $detail1->no_hp1?>"/>
            </div>
            <p class="red">Pastikan nomor HP anda telah terdaftar!</p>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <a href="<?= base_url('Nasabah/listAmbilSimpanan')?>" class="btn btn-default">Kembali</a>
              <button type="submit" class="btn btn-primary"><i class="fa fa-share-square-o"></i>  Proses Pengambilan Simpanan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
