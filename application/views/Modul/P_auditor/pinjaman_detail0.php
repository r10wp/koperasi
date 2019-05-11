<div class="right_col" role="main">
  <div class="clearfix"></div>
  <?php foreach ($cetak_detail1 as $detail1): ?>


    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Detail Data Pinjaman</h2>
            <div class="clearfix"></div>
          </div>
          <form class="form-horizontal form-label-left" method="post" action="<?= base_url('P_admin/accPinjam/'.$detail1->kode)?>">
          <div class="x_content">
            <br />

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Pinjaman
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="kode" value="<?= $detail1->kode?>" readonly class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Data Peminjam <br>(No. Anggota / Nama)
                </label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nomor_anggota?>" name="no_anggoota" readonly class="form-control">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama_anggota?>" readonly class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Data Rekening Peminjam <br>(No. Rekening / Nama / Nama Bank)
                </label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->no_rekening?>" name="no_anggoota" readonly class="form-control">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama_anggota?>" readonly class="form-control">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->bank?>" readonly class="form-control">
                </div>
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
                  <input name="total_setoran" value="<?= fullTime($detail1->tgl_pinjaman) ?>" readonly class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Pinjam
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= rupiahset($detail1->jumlah_pinjaman_diberikan)?>" readonly class="form-control col-md-7 col-xs-12" type="text">
                  Diajukan
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= rupiahset($detail1->jumlah_pinjaman_diberikan)?>" readonly class="form-control col-md-7 col-xs-12" type="text">
                  Diberikan
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input name="total_angsur" value="<?= rupiahset($detail1->total_pinjaman_diberikan_setelah_bunga)?>" readonly class="form-control col-md-7 col-xs-12" type="text">
                  Setelah Bunga
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Terbilang</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control col-md-7 col-xs-12" readonly ><?= terbilang($detail1->total_pinjaman_diberikan_setelah_bunga)?> Rupiah</textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Transaksi Pinjam</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control col-md-7 col-xs-12" name="ket" readonly ><?= $detail1->keterangan_pinjaman?></textarea>
                </div>
              </div>
            <div class="ln_solid"></div>

          </div>
          <div class="x_content">
            <br />

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Verifikasi Auditor
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->tgl_persetujuan_auditor?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Detail Auditor
                </label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->id_pengurus?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama_pengurus?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>
            

              <?php if ($detail1->status_pinjam == 0): ?>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Tolak</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class="form-control col-md-7 col-xs-12" type="text" name="keterangan_tolak"><?= $detail1->keterangan_tolak?></textarea>
                  </div>
                </div>
              <?php endif; ?>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-default" type="button">Kembali</button>
                  <?php if ($detail1->status_pinjam == -2):?>
                    Belum Di Audit Oleh Auditor
                  <?php elseif ($detail1->status_pinjam == -1):?>
                    <button type="submit" class="btn btn-primary">Cairkan Dana</button>
                  <?php elseif ($detail1->status_pinjam == 0):?>
                    Pinjaman Di Tolak
                  <?php elseif ($detail1->status_pinjam == 1):?>
                    Pinjaman Sudah Di Terima dan Sedang Berjalan
                  <?php endif;?>


                </div>
              </div>

          </div>
        </form>
        </div>
      </div>
    </div>

    <?php endforeach; ?>

</div>
