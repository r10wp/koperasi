<div class="right_col" role="main">
    <div class="clearfix"></div>

    <?php foreach ($cetak_detail1 as $detail1): ?>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Verifikasi Berkas Calon Nasabah</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('P_anggota/checkBerkasNasabah/')?><?= $detail1->id?>">
              <input type="hidden" value="<?= $detail1->no_hp1?>" name="hp" class="form-control col-md-7 col-xs-12">

              <?php if ($detail1->status_terima == -1): ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Keterangan Tolak Sebelumnya
                  </label>
                  <div class="col-md-7 col-sm-6 col-xs-12">
                    <textarea class="form-control" rows="3" readonly><?= $detail1->keterangan_tolak?></textarea>
                  </div>
                </div>
              <?php endif; ?>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Data Nasabah
                </label>

                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nomor_anggota?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <a target="_blank" href="<?= base_url('Nasabah/detail/'.$prim_kode)?>" class="btn btn-success"> Lihat Detail Nasabah </a>
                </div>
              </div>

              <?php if ($detail1->status_terima == -2): ?>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keputusan</label>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input type="radio" value="1" class="form-radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck">
                      Terima Nasabah
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <input type="radio" value="-1" class="form-radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck">
                      Tolak Nasabah
                    </div>



                </div>
                <?php endif; ?>


              <br>
              <div class="ln_solid"></div>

              <?php
                $a= $nasabah_ke+1;
                $b= $detail1->id_kelompok;
                $c= sprintf("%03s",$b).'.'.sprintf("%05s", $a).'.'.'2';
              ?>


              <div class="form-group" id="ifYes" style="display:none">
                <label class="control-label col-md-3 " for="last-name">Masukkan Nomor Anggota
                </label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="text" name="no_baru" id="no_anggota_acc" value="<?= $c?>" class="form-control col-md-7 col-xs-12" required>
                </div>
              </div>

              <div class="form-group" id="ifYes2" style="display:none">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Saldo Wajib <br><font color="orange">Sesuai Bukti Upload</font>
                </label>
                <!-- <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" name="set_saldo_pokok_acc" id="rupiah" class="form-control col-md-7 col-xs-12">
                  Ketik Ulang Jumlah Setor
                  <input type="checkbox" class="reply_author_check"> Jika Sama
                </div> -->
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="hidden" name="set_saldo_pokok_acc" value="<?= $detail1->jumlah_pokok_harus_dibayar?>" class="form-control col-md-7 col-xs-12">
                  <input type="text" id="set_saldo_pokok" value="<?= rupiahset($detail1->jumlah_pokok_harus_dibayar)?>" class="form-control col-md-7 col-xs-12" readonly>
                  Pastikan Jumlah Saldo Yang disetor Sesuai (*Jika Tidak Maka Harus Ditolak)
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <button type="button" class="btn btn-default" name="button" data-toggle="modal" data-target="#bukti_upload">Lihat Bukti Setor</button>
                </div>
              </div>

              <div class="form-group" id="ifNo" style="display:none">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Tolak
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">
                  <textarea id="ket_tolak_nasabah" rows="3" name="keterangan_tolak" class="form-control"></textarea>
                </div>
              </div>


              <?php if ($detail1->status_terima == 1): ?>

                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <h3 style="color:blue">Nasabah Sudah Menjadi Anggota</h3>
                  </div>
                </div>
              <?php  elseif($detail1->status_terima == 0): ?>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <h3 style="color:red">Nasabah Sedang Di Blokir</h3>
                  </div>
                </div>
              <?php  elseif($detail1->status_terima == 2): ?>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <h3 style="color:blue">Nasabah Sudah Pensiun / Mengundurkan Diri</h3>
                  </div>
                </div>
              <?php  elseif($detail1->status_terima == -3): ?>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <h3 style="color:orange">Nasabah Belum Mengajukan Diri / Masih Mengisi formulir</h3>
                  </div>
                </div>
              <?php else: ?>
                <?php if ($detail1->id_kelompok == null): ?>

                <p style="color:red"> *Tidak Bisa di verfikasi Karena Belum Memilih Kelompok</p>
                <?php else: ?>
                  <div class="form-group" id="ifYes3" style="display:none">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-primary">Terima Nasabah</button>
                    </div>
                  </div>
                <?php endif; ?>


                <div class="form-group" id="ifNo2" style="display:none">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-danger">Tolak Nasabah</button>
                  </div>
                </div>
              <?php endif; ?>


            </form>
          </div>
        </div>
      </div>
    </div>

   <?php $gambar= $detail1->file_attach_bukti_pembayaran_simpanan_pokok_awal; ?>
    <?php endforeach; ?>



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
