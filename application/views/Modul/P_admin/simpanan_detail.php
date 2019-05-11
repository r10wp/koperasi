<div class="right_col" role="main">
  <div class="clearfix"></div>
  <?php foreach ($cetak_detail1 as $detail1): ?>


    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Detail Data Simpanan : <?= $detail1->kode_simpan?></h2>
            <div class="clearfix"></div>
          </div>
          <form class="form-horizontal form-label-left" method="post" action="<?= base_url('P_admin/aksiSimpan/'.$detail1->kode_simpan)?>">
          <div class="x_content">
            <br />
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Data Penyimpan <br>(No. Anggota / Nama)
                </label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nomor_anggota?>" name="no_anggota" readonly class="form-control">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama_anggota?>" readonly class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Simpanan</label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="hidden" name="jenis_simpanan" value="<?= $detail1->jenis_simpanan?>">
                  <input type="hidden" name="kirim" value="<?= $detail1->no_hp1?>">
                  <select class="form-control" style="width:150px" disabled>
                    <option value="2" <?php if ($detail1->jenis_simpanan == 2){ echo "selected"; }; ?>>Wajib</option>
                    <option value="3" <?php if ($detail1->jenis_simpanan == 3){ echo "selected"; }; ?>>Sukarela</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tgl. Lakukan Simpanan
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->tgl_lakukan_simpan?>" class="form-control col-md-7 col-xs-12" type="text" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tgl. Tagihan Wajib
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->tgl_wajib_setor?>" class="form-control col-md-7 col-xs-12" type="text" readonly/>
                </div>
                Hanya Pada Simpanan Wajib
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tgl. Jatuh Tempo
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input name="tjt" value="<?= $detail1->tgl_jatuh_tempo_bayar?>" class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Data Rekening Anggota <br>(Nama Bank/Rekening/Pemilik)
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->nama_bank_nasabah?>" class="form-control col-md-7 col-xs-12" readonly type="text">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->no_rekening_nasabah?>" class="form-control col-md-7 col-xs-12" readonly type="text">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input value="<?= $detail1->nama_pemilik_dalam_rekening?>" class="form-control col-md-7 col-xs-12" readonly type="text">
                </div>

              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Data Rekening Koperasi <br>(Nama Bank/Rekening/Pemilik)
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input id="no_rekening" value="<?= $detail1->nama_bank_koperasi?>" class="form-control col-md-7 col-xs-12" readonly type="text">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input id="no_rek" value="<?= $detail1->no_rekening?>" class="form-control col-md-7 col-xs-12" readonly type="text">
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input id="na_rek" value="<?= $detail1->nama_pemilik_rekening?>" class="form-control col-md-7 col-xs-12" readonly type="text">
                </div>

              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Setor
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input name="total_setoran" value="<?= rupiahset($detail1->total_setoran)?>" class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Terbilang</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control col-md-7 col-xs-12" readonly><?= terbilang($detail1->total_setoran)?> Rupiah</textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Transaksi Simpan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control col-md-7 col-xs-12" name="ket" ><?= $detail1->keterangan?></textarea>
                </div>
              </div>

              <?php if ($detail1->file_attach_bukti_simpan == null): ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Bukti Setoran
                  </label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <h4><font color="red"><strong>*Belum Upload Simpanan</strong></font></h4>
                  </div>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Bukti Setoran
                  </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <button type="button" class="form-control btn-info" data-toggle="modal" data-target="#bukti_upload">Lihat Bukti Setoran</button>
                  </div>
                  <!-- <div class="col-md-3 col-sm-6 col-xs-12">
                    <a class="btn btn-warning btn-xs"><i class="fa fa-trash-o"></i> Hapus Bukti Setor</a>
                  </div> -->
                </div>
              <?php endif; ?>




              <div class="ln_solid"></div>

          </div>
          <div class="x_content">
            <br />
              <?php if ($detail1->tgl_verifikasi_simpanan != null && $detail1->id_pengurus && $detail1->nama_pengurus): ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Verifikasi (Terakhir)
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="<?= $detail1->tgl_verifikasi_simpanan?>" class="form-control col-md-7 col-xs-12" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pengurus Verifikasi (Terakhir)
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Status Simpanan
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="status_simpan" style="width:200px">
                    <option value="-2" <?php if ($detail1->status_simpan == -2){ echo "selected"; }; ?>>Belum Upload</option>
                    <option value="-1" <?php if ($detail1->status_simpan == -1){ echo "selected"; }; ?>>Belum Di Verifikasi</option>
                    <option value="0" <?php if ($detail1->status_simpan == 0){ echo "selected"; }; ?>>Di Tolak</option>
                    <option value="1" <?php if ($detail1->status_simpan == 1){ echo "selected"; }; ?>>Di Terima</option>
                  </select>
                  <?php if ($detail1->status_simpan == 1): ?>
                    <span>Status Saat Ini : </span><span style="color:blue"> Transaksi Sukses. </span>
                  <?php elseif($detail1->status_simpan == 0): ?>
                    <span>Status Saat Ini : </span><span style="color:red"> Setoran Ditolak. </span>
                  <?php elseif($detail1->status_simpan == -1): ?>
                    <span>Status Saat Ini : </span><span style="color:orange"> Menunggu Konfirmasi</span>
                  <?php elseif($detail1->status_simpan == -2): ?>
                    <span>Status Saat Ini : </span><span>Belum Upload Bukti Pembayaran / Setoran</span>
                  <?php endif; ?>
                </div>
              </div>


              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Tolak</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control col-md-7 col-xs-12" type="text" name="keterangan_tolak"><?= $detail1->keterangan_tolak_simpanan?></textarea>
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('P_admin')?>" class="btn btn-default" type="button">Kembali</a>
                  <?php if ($detail1->status_simpan == 1): ?>
                    Simpanan Sudah Pernah Diterima
                  <?php else: ?>
                    <button type="submit" class="btn btn-primary">Berikan Validasi</button>

                  <?php endif; ?>

                </div>
              </div>

          </div>
        </form>
        </div>
      </div>
    </div>
    <?php $kode_simpan = $detail1->file_attach_bukti_simpan?>
    <?php endforeach; ?>

</div>

<div class="modal fade" id="bukti_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bukti Setoran </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url()?>asset/BUKTI_SIMPANAN/<?= $kode_simpan?>?rand=<?php echo rand(); ?>" height="400" width="500">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
