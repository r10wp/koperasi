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
                  <input value="<?= rupiahset($detail1->jumlah_pinjaman_diajukan)?>" readonly class="form-control col-md-7 col-xs-12" type="text">
                  Diajukan
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input name="total_angsur" value="<?= rupiahset($detail1->jumlah_pinjaman_diberikan)?>" readonly class="form-control col-md-7 col-xs-12" type="text">
                  Diberikan
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= rupiahset($detail1->total_pinjaman_diberikan_setelah_bunga)?>" readonly class="form-control col-md-7 col-xs-12" type="text">
                  Setelah Bunga
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Terbilang</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control col-md-7 col-xs-12" readonly ><?= terbilang($detail1->jumlah_pinjaman_diberikan)?> Rupiah</textarea>
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
              <?php if ($detail1->tgl_persetujuan_auditor != null): ?>
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
              <?php endif; ?>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Status Persetujuan Pinjaman
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="status_simpan" style="width:200px" disabled>
                    <option value="-2" <?php if ($detail1->status_pinjam == -2){ echo "selected"; }; ?>>Belum Di Verifikasi</option>
                    <option value="-1" <?php if ($detail1->status_pinjam == -1){ echo "selected"; }; ?>>Belum Di Verifikasi</option>
                    <option value="0" <?php if ($detail1->status_pinjam == 0){ echo "selected"; }; ?>>Di Tolak</option>
                    <option value="1" <?php if ($detail1->status_pinjam == 1){ echo "selected"; }; ?>>Di Terima</option>
                  </select>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Rekening Bank Nasabah
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->nama_bank_nasabah?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->no_rekening_nasabah?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->nama_pemilik_dalam_rekening?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                </div>
              </div>

              <?php if ($detail1->status_pinjam != 1): ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Data Rekening Pencairan
                  </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                  <select class="form-control" id="set_bank" name="rek_id" required>
                    <option value=""> Pilih Rekening Koperasi </option>
                    <?php foreach ($cetak_form2 as $set_rekening) { ?>
                      <option value="<?= $set_rekening->id?>" data-no-rek="<?= $set_rekening->no_rekening?>" data-na-rek="<?= $set_rekening->nama_pemilik_rekening?>" data-na-ba="<?= $set_rekening->nama_bank?>"><?= $set_rekening->nama_bank?></option>
                    <?php } ?>
                  </select>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input id="no_rek" class="form-control col-md-7 col-xs-12" readonly type="text">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input id="na_rek" class="form-control col-md-7 col-xs-12" readonly type="text">
                  </div>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Data Rekening Pencairan
                  </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input value="<?= $detail1->nama_bank_koperasi?>" class="form-control col-md-7 col-xs-12" readonly type="text">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input value="<?= $detail1->no_rekening?>" class="form-control col-md-7 col-xs-12" readonly type="text">
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input value="<?= $detail1->nama_pemilik_rekening?>" class="form-control col-md-7 col-xs-12" readonly type="text">
                  </div>
                </div>
              <?php endif; ?>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('P_admin/pinjamanAll')?>" class="btn btn-default">Kembali</a>
                  <?php if ($detail1->status_pinjam == -2):?>
                    Belum Di Audit Oleh Auditor
                  <?php elseif ($detail1->status_pinjam == -1):?>
                    <button type="submit" class="btn btn-primary">Cairkan Dana</button>
                  <?php elseif ($detail1->status_pinjam == 0):?>
                    Pinjaman Di Tolak
                  <?php elseif ($detail1->status_pinjam == 1):?>
                    <a href="<?= base_url('P_admin/listBayar/'.$detail1->kode)?> " class="btn btn-info" type="button">Lihat Tabel Pembayaran</a>
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
