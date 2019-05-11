<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Pengunduran Diri Anggota</h2>
            <div class="clearfix"></div>
          </div>
          <?php foreach ($cetak_detail1 as $detail1): ?>

            <div class="x_content">
            <br />
            <form  class="form-horizontal form-label-left" action="<?= base_url('Nasabah/pengunduranDiri') ?>" enctype="multipart/form-data" method="post">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Anggota</label>
                <div class="col-md-3 ">
                  <input type="text" value="<?= $detail1->nomor_anggota?>" readonly class="form-control " />
                </div>

              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Anggota</label>
                <div class="col-md-4 ">
                  <input type="text" value="<?= $detail1->nama?>" readonly class="form-control col-md-7 col-xs-12" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Rekening Untuk Pencairan Dana </label>
                <div class="col-md-4 ">
                  <select class="form-control" name="id_rekening" required>
                    <option value="">-- Pilih Rekening Bank--</option>
                    <?php foreach ($cetak_rekening as $rekening): ?>
                      <option value="<?= $rekening->id?>"><?= $rekening->no_rekening_nasabah?> - <?= $rekening->nama_bank?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Saldo</label>
                <div class="col-md-3 ">
                  <span>Saldo Pokok : </span><br>
                  <span>Saldo Wajib : </span><br>
                  <span>Saldo Sukarela : </span><br>
                  <hr>
                  <strong>Total dana yang diterima :</strong>
                </div>
                <div class="col-md-3 ">
                  <span><?= rupiahset($detail1->saldo_pokok)?></span><br>
                  <span><?= rupiahset($detail1->saldo_wajib)?> </span><br>
                  <span><?= rupiahset($detail1->saldo_sukarela)?></span><br>
                  <hr>
                  <strong><?= rupiahset($detail1->saldo_pokok+$detail1->saldo_wajib+$detail1->saldo_sukarela)?> </strong><br>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Alasan Keluar</label>
                <div class="col-md-4 ">
                  <textarea class="form-control col-md-7 col-xs-12" name="alasan_keluar" required></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Upload Bukti Persetujuan Anggota
                </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <input type="file" name="berkas_undur" class="form-control col-md-7 col-xs-12" accept=".pdf" required>
                </div>
                <?php if ($cetak_tunggakan > 0): ?>
                  <div class="col-md-2 ">
                    <button type="submit" class="btn btn-danger" disabled >  Keluar Dari Koperasi </button>
                  </div>
                <?php else: ?>
                  <?php if ($check_status > 0): ?>
                    Anda Sedang Mengajukan Proses Pengunduran Diri
                  <?php else: ?>
                    <div class="col-md-2 ">
                      <button type="submit" class="btn btn-danger">  Keluar Dari Koperasi </button>
                    </div>
                  <?php endif; ?>

                <?php endif; ?>

                  <!-- <div class="col-md-2 ">
                    <button type="submit" class="form-control btn btn-warning">  Update </button>
                  </div> -->

              </div>
            </form>

              <div class="ln_solid"></div>
              <?php if ($cetak_tunggakan > 0): ?>
                <h2 class="green"> Anda masih memiliki tunggakan pinjaman. Silahkan lunasi tunggakan tersebut sebelum keluar dari anggota koperasi</h2>
              <?php else: ?>
              <?php endif; ?>

          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>


  </div>
</div>
