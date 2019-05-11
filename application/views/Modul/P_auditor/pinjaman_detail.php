<div class="right_col" role="main">
  <div class="clearfix"></div>
  <?php foreach ($cetak_detail1 as $detail1): ?>


    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Pinjaman Dana Nasabah</h2>
            <div class="clearfix"></div>
          </div>
          <form class="form-horizontal form-label-left" method="post" action="<?= base_url('P_auditor/aksiPinjam/'.$detail1->kode)?>">
          <div class="x_content">
            <br />

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Pinjaman
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->kode?>" readonly class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Data Peminjam
                </label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input name="no_anggota" type="text" value="<?= $detail1->nomor_anggota?>" readonly class="form-control">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama_anggota?>" readonly class="form-control">
                </div>
                <a href="<?= base_url()?>Nasabah/detail/<?= $detail1->id_anggota?>" target="_blank" class="btn btn-success">Detail Nasabah</a>
                <a href="<?= base_url()?>P_auditor/tunggakNasabah/<?= $detail1->id_anggota?>" target="_blank" class="btn btn-warning">Check Tunggakan Nasabah</a>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Pinjaman</label>
                <div class="col-md-3 col-sm-6 col-xs-12">

                  <input type="text" name="" value="<?= $detail1->nama_jenis_pinjaman ?>" class="form-control" readonly/>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" name="bunga" value="<?= $detail1->bunga_pinjaman ?>" class="form-control" readonly/>
                  Bunga
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" name="batas_angsuran" value="<?= $detail1->batas_jumlah_angsuran ?>" class="form-control" readonly/>
                  Maksimal Angsuran
                </div>

              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tgl. Lakukan Pinjaman
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->tgl_pinjaman?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Dana Diajukan
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= rupiahset($detail1->jumlah_pinjaman_diajukan)?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Dana Diberikan
                </label>
                <?php if (rupiahToInt($detail1->jumlah_pinjaman_diberikan) != 0): ?>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input value="<?= rupiahset($detail1->jumlah_pinjaman_diberikan)?>" class="form-control col-md-7 col-xs-12" type="text" readonly/>
                  </div>
                <?php else: ?>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input name="dana" id="rupiah" class="form-control col-md-7 col-xs-12" type="text" required>
                  </div>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Transaksi Pinjaman</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control col-md-7 col-xs-12" disabled><?= $detail1->keterangan_pinjaman?></textarea>
                </div>
              </div>

              <div class="ln_solid"></div>

          </div>
          <div class="x_content">
            <br />
            <?php if ( $detail1->tgl_persetujuan_auditor != null): ?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Di Setujui
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->tgl_persetujuan_auditor?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pengurus Persetujuan Pencairan
                </label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->id_persetujuan_auditor?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama_pengurus?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>
            <?php endif; ?>


              <?php if ($detail1->status_pinjam == 0): ?>
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
              <?php elseif($detail1->status_pinjam == -2): ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >Keterangan Tolak
                  </label>
                  <div class="col-md-5 col-sm-6 col-xs-12">
                    <textarea id="text1" name="keterangan_tolak" value="2" class="form-control" ></textarea>
                  </div>
                  <span>Di isi jika peminjaman ditolak</span>
                </div>
              <?php endif; ?>

              <?php if($detail1->status_pinjam != 1): ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >Persetujuan Pencairan
                  </label>
                  <div class="col-md-5 col-sm-6 col-xs-12">
                    <input name="ver" id="radio2" onclick="enableTxtBox1()" type="radio" value="-1" class="form-radio" style="background-color: #7ed6df" required/> Izinkan Pengambilan
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="ver" id="radio1" onclick="enableTxtBox1()" type="radio" value="0" class="form-radio" style="background-color: #ff7979" required />  Tolak Pengambilan
                  </div>
                </div>
              <?php endif; ?>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('P_auditor/pinjamanList')?>" class="btn btn-default" type="button">Kembali</a>
                  <?php if ($detail1->status_pinjam == -3): ?>
                    Tidak Bisa Di Versikasi Karena Gagal VCode
                  <?php elseif($detail1->status_pinjam == -2): ?>
                    <button type="submit" class="btn btn-primary">Verfikasi Dana</button>
                  <?php elseif($detail1->status_pinjam == -1): ?>
                    Menunggu Pencairan Dana
                  <?php elseif($detail1->status_pinjam == 0): ?>
                    <button type="submit" class="btn btn-warning">Verifikasi Ulang Pengambilan</button>
                  <?php elseif($detail1->status_pinjam == 1): ?>

                    <a href="<?= base_url('P_auditor/listBayar/'.$detail1->kode)?> " class="btn btn-info" type="button">Lihat Tabel Pembayaran</a>

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
