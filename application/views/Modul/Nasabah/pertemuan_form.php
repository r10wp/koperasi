<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Pertemuan</h2>
            <div class="clearfix"></div>
          </div>
            <div class="x_content">
              <br />
              <form  class="form-horizontal form-label-left" action="<?= base_url('Nasabah/jadwalkan_pertemuan') ?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                  <div class="col-md-3 ">
                    <input type="date" name="tgl_pertemuan" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pukul</label>
                  <div class="col-md-2 ">
                    <input type="time" name="jam_pertemuan1" class="form-control" />
                  </div>
                  <div class="col-md-1">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;s/d
                  </div>
                  <div class="col-md-2 ">
                    <input type="time" name="jam_pertemuan2" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tujuan Pertemuan</label>
                  <div class="col-md-3 ">
                    <select class="form-control" name="tujuan_pertemuan" required>
                      <option value="">-- Pilih Tujuan --</option>
                      <option value="Penerimaan Anggota Baru">Penerimaan Anggota Baru</option>
                      <option value="Rapat Bulanan">Rapat Bulanan</option>
                      <option value="Acara Khusus">Acara Khusus</option>
                      <option value="Permintaan Anggota Keluar">Permintaan Anggota Keluar</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pesan Tambahan</label>
                  <div class="col-md-4 ">
                    <textarea class="form-control col-md-7 col-xs-12" name="pesan"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Lampiran
                  </label>
                  <div class="col-md-5 col-sm-6 col-xs-12">
                    <input type="file" name="bukti_saldo_awal" class="form-control col-md-7 col-xs-12" accept=".jpg">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                  <div class="col-md-7 ">
                    <span class="" style="color:red">* Catatan : </span>Pesan akan terkirim kepada seluruh anggota kelompok
                  </div>
                </div>


                <div class="ln_solid"></div>

                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <button type="button" class="btn btn-default">Kembali</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                  </div>
                </div>

            </div>
            </form>
        </div>
      </div>
    </div>


  </div>
</div>
