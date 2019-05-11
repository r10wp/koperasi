<div class="right_col" role="main">
  <div class="clearfix"></div>
  <?php foreach ($cetak_detail1 as $detail1): ?>


    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Pengambilan Dana Nasabah</h2>
            <div class="clearfix"></div>
          </div>
          <form class="form-horizontal form-label-left" method="post" action="<?= base_url('P_auditor/aksiAmbil/'.$detail1->kode)?>">
          <div class="x_content">
            <br />

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Ambil Simpanan
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->kode?>" readonly class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Data Pengambil
                </label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input name="no_anggota" type="text" value="<?= $detail1->nomor_anggota?>" readonly class="form-control">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama_anggota?>" readonly class="form-control">
                </div>
                <a href="<?= base_url()?>Nasabah/detail/<?= $detail1->id_anggota?>" target="_blank" class="btn btn-success">Detail Nasabah</a>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tgl. Lakukan Simpanan
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->tgl_pengajuan?>" class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Dana Diajukan
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= rupiahset($detail1->total_dana_diajukan)?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Dana Diberikan
                </label>
                <?php if (rupiahToInt($detail1->total_dana_diberikan) != 0): ?>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input value="<?= rupiahset($detail1->total_dana_diberikan)?>" class="form-control col-md-7 col-xs-12" type="text" readonly/>
                  </div>
                <?php else: ?>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input name="dana" id="rupiah" class="form-control col-md-7 col-xs-12" type="text" required>
                  </div>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Transaksi Simpan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control col-md-7 col-xs-12"><?= $detail1->keterangan_pengajuan?></textarea>
                </div>
              </div>

              <div class="ln_solid"></div>

          </div>
          <div class="x_content">
            <br />

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Di Setujui
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->tgl_persetujuan?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pengurus Persetujuan Pencairan
                </label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->id_pemberi_persetujuan?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama_pengurus?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>

              <?php if ($detail1->status_ambil == 0): ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >Keterangan Tolak Sebelumnya
                  </label>
                  <div class="col-md-5 col-sm-6 col-xs-12">
                    <textarea value="2" class="form-control" disabled><?= $detail1->keterangan_tolak_pengambilan?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pengurus Persetujuan Pencairan
                  </label>
                  <div class="col-md-5 col-sm-6 col-xs-12">
                    <textarea id="text1" name="keterangan_tolak" value="2" class="form-control" ></textarea>
                  </div>
                </div>
              <?php elseif($detail1->status_ambil == -2): ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >Keterengan Tolak
                  </label>
                  <div class="col-md-5 col-sm-6 col-xs-12">
                    <textarea id="text1" name="keterangan_tolak" value="2" class="form-control" ></textarea>
                  </div>
                </div>
              <?php endif; ?>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pengurus Persetujuan Pencairan
                </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <input name="ver" id="radio2" onclick="enableTxtBox1()" type="radio" value="1" class="form-radio" style="background-color: #7ed6df" required/> Izinkan Pengambilan
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input name="ver" id="radio1" onclick="enableTxtBox1()" type="radio" value="0" class="form-radio" style="background-color: #ff7979" required />  Tolak Pengambilan
                </div>
              </div>



              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-default" type="button">Cancel</button>
                  <?php if ($detail1->status_ambil == -3): ?>
                    Tidak Bisa Di Versikasi Karena Gagal VCode
                  <?php elseif($detail1->status_ambil == -2): ?>
                    <button type="submit" class="btn btn-primary">Verfikasi Dana</button>                    
                  <?php elseif($detail1->status_ambil == -1): ?>
                    Belum Di Setujui Oleh Auditor
                  <?php elseif($detail1->status_ambil == 0): ?>
                    <button type="submit" class="btn btn-warning">Verifikasi Ulang Pengambilan</button>
                  <?php elseif($detail1->status_ambil == 1): ?>
                    Sudah Di Cairkan
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

<script>
  function enableTxtBox1()
  {
    document.getElementById("text1").disabled = !document.getElementById("radio1").checked;
    document.getElementById("text1").required = document.getElementById("radio1").checked;
    if(!document.getElementById("radio1").checked){
       document.getElementById("text1").value="";
    };
  }
</script>
