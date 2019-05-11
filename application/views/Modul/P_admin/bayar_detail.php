<div class="right_col" role="main">
  <div class="clearfix"></div>
  <?php foreach ($cetak_detail1 as $detail1): ?>


    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Verifikasi Pembayaran Pinjaman</h2>
            <div class="clearfix"></div>
          </div>
          <form class="form-horizontal form-label-left" method="post" action="<?= base_url('P_admin/accBayar/'.$detail1->kode_bayar)?>">
          <div class="x_content">
            <br />
            <input type="hidden" name="kode_pinjam" class="form-control " value="<?= $detail1->kode?>"/>
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
              <?php
              if (date('Y-m-d H:i:s') > $detail1->tgl_jatuh_tempo ) {
                $start_date = new DateTime(date('Y-m-d H:i:s'));
                $end_date = new DateTime($detail1->tgl_jatuh_tempo);
                $interval = $start_date->diff($end_date);
                $denda = $interval->days*$detail1->denda_per_hari;
              } else {
                $denda = 0;
              }


              ?>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cicilan
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= rupiahset($detail1->angsuran_asli)?>" readonly class="form-control col-md-7 col-xs-12" type="text">
                  Cicilan
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input name="total_angsur" value="<?= rupiahset($denda)?>" readonly class="form-control col-md-7 col-xs-12" type="text">
                  Denda
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= rupiahset($detail1->angsuran_asli+$denda)?>" readonly class="form-control col-md-7 col-xs-12" type="text">
                  <input type="hidden" name="total_bayar" value="<?= $detail1->angsuran_asli+$denda?>">
                  Total Yang Harus Dibayar
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Terbilang</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control col-md-7 col-xs-12" readonly ><?= terbilang($detail1->angsuran_asli+$denda)?> Rupiah</textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Transaksi </label>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Status Persetujuan Pembayaran
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="status_terima" style="width:200px" >
                    <option value="-2" <?php if ($detail1->status_bayar == -2){ echo "selected"; }; ?>>Belum Di Upload</option>
                    <option value="-1" <?php if ($detail1->status_bayar == -1){ echo "selected"; }; ?>>Belum Di Verifikasi</option>
                    <option value="0" <?php if ($detail1->status_bayar == 0){ echo "selected"; }; ?>>Di Tolak</option>
                    <option value="1" <?php if ($detail1->status_bayar == 1){ echo "selected"; }; ?>>Di Terima</option>
                  </select>
                </div>
              </div>

              <?php if ($detail1->status_bayar == 0): ?>
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
                  <button class="btn btn-default" type="button" onclick="goBack()">Kembali</button>
                  <?php if ($detail1->status_bayar == -2):?>
                    Belum Upload Bukti Bayar
                  <?php elseif ($detail1->status_bayar == -1):?>
                    <a class="btn btn-warning" data-toggle="modal" data-target="#bu"><i class="fa fa-check-square-o"></i> Lihat Bukti</a>
                    <button type="submit" class="btn btn-primary">Verifikasi Pembayaran</button>
                  <?php elseif ($detail1->status_bayar == 0):?>
                    <a class="btn btn-warning" data-toggle="modal" data-target="#bu"><i class="fa fa-check-square-o"></i> Lihat Bukti</a>
                    <button type="submit" class="btn btn-primary">Verfikasi Ulang Pembayaran</button>
                  <?php elseif ($detail1->status_bayar == 1):?>
                    Telah Terbayar
                  <?php endif;?>
                </div>
              </div>

          </div>
        </form>
        </div>
      </div>
    </div>
    <?php
      $a = $detail1->file_attach_bukti_pembayaran;
    ?>
    <?php endforeach; ?>

</div>

<div class="modal fade" id="bu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bukti Pembayaran </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url()?>asset/BUKTI_BAYAR_CICILAN/<?= $a?>?rand=<?php echo rand(); ?>" height="400" width="500">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
