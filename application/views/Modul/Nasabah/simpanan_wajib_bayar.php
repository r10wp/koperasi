<?php
  $data = [];
  $no = 1;
  foreach ($cetak_form3 as $form3) {
    $data[$no]= $form3->isi;
    $no++;
  }
?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Formulir Setoran Wajib</h3>
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
                <label class="control-label col-md-5 col-sm-3 col-xs-12">Nama Nasabah</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="<?= $detail1->nama?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-5 col-sm-3 col-xs-12">No Rekening Nasabah</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="<?= $detail1->no_rekening?>" readonly>
                </div>
              </div>

              <div class="ln_solid"></div>


              <?php foreach ($cetak_default1 as $set_rekening) { ?>
              <div class="form-group">
                <label class="control-label col-md-5 col-sm-4 col-xs-12">Nomor Rekening Tujuan</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                <input type="text" class="form-control" value="<?= $set_rekening->no_rekening?>" readonly/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5 col-sm-3 col-xs-12">Nama Rekening Tujuan</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                <input type="text" class="form-control" value="<?= $set_rekening->nama_pemilik_rekening?>" readonly/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-5 col-sm-4 col-xs-12">Nama Bank</label>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="<?= $set_rekening->nama_bank?>" readonly/>
                </div>
              </div>
            <?php } ?>

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
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Setoran </label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" class="form-control"  value="<?= $detail1->tgl_wajib_setor ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Jatuh Tempo </label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" class="form-control"  value="<?= $detail1->tgl_wajib_setor ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Total Setoran (Rp)</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="number" class="form-control" name="jumlah_setor" required/>
                  <input type="hidden" name="min_setor" value="<?= $data[8]?>">
                  <span>Minimal pembayaran setoran wajib <?= rupiahform($data[8])?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Keterangan</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <textarea class="form-control" name="keterangan" placeholder="*Jika Ada..."></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Upload Bukti Setoran</label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="file" class="form-control" accept=".jpg" id="checkext" onchange="ValidateSize(this)" required/>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="button" class="btn btn-primary">Cancel</button>
                  <button type="submit" class="btn btn-success">Kirim Bukti Setor</button>
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
