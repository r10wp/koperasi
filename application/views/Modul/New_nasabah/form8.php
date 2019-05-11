<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form 8 - Upload Bukti Pembayaran</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <?php foreach ($cetak_form1 as $detail1): ?>
            <form  class="form-horizontal form-label-left" action="<?= base_url('New_nasabah/form8') ?>" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Yang Harus Dibayar</label>
                <div class="col-md-3 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="<?= rupiahset($detail1->jumlah_pokok_harus_dibayar) ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Upload Bukti Pembayaran
                </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <input type="file" name="bukti_saldo_awal" class="form-control col-md-7 col-xs-12" accept=".jpg" id="checkext" onchange="ValidateSize(this)" required>
                </div>
                <?php if ($detail1->file_attach_bukti_pembayaran_simpanan_pokok_awal == "" || $detail1->file_attach_bukti_pembayaran_simpanan_pokok_awal == NULL): ?>
                  <div class="col-md-1 col-sm-6 col-xs-12">
                    <button type="submit" class="form-control btn btn-primary">  Upload </button>
                  </div>
                <?php else: ?>
                  <div class="col-md-2 ">
                    <button type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#bukti_upload">  Lihat </button>
                  </div>
                  <div class="col-md-2 ">
                    <button type="submit" class="form-control btn btn-warning">  Update </button>
                  </div>
                <?php endif; ?>

              </div>
            </form>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('New_nasabah')?>" class="btn btn-default">Kembali</a>
                </div>
              </div>
              <?php $gambar = $detail1->file_attach_bukti_pembayaran_simpanan_pokok_awal ?>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>

<div class="modal fade" id="bukti_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bukti Setoran Awal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url()?>asset/BUKTI_SALDO_AWAL/<?= $gambar?>?rand=<?php echo rand(); ?>" height="300" width="400">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>