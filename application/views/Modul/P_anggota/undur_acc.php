<div class="right_col" role="main">
    <div class="clearfix"></div>

    <?php foreach ($cetak_detail1 as $detail1): ?>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Pemberhentian Nasabah</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('P_anggota/undur_acc/'.$detail1->ai_berhenti."/")?><?= $detail1->id?>">



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
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <a target="_blank" href="<?= base_url('P_auditor/tunggakNasabah/'.$prim_kode)?>" class="btn btn-warning"> Lihat Tunggakan </a>
                </div>

              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Berkas Pengunduran Diri
                </label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <a target="_blank" href="<?= base_url()?>asset/BUKTI_PERSETUJUAN_PENGUNDURAN/<?= $detail1->berkas_persetujuan_berhenti?>" class="btn btn-info"> Lihat Berkas </a>
                </div>
              </div>

              <?php if ($detail1->status == -2): ?>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keputusan</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="radio" value="0" class="form-radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck" required>
                    Tolak Permintaan Keluar
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="radio" value="-1" class="form-radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck" required>
                    Terima Permintaan Keluar
                  </div>
                </div>

              <?php elseif ($detail1->status == 0): ?>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keputusan</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="radio" value="0" class="form-radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck">
                    Tolak Permintaan Keluar
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="radio" value="-1" class="form-radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck">
                    Terima Permintaan Keluar
                  </div>
                </div>
                <hr>
                Nasabah Pernah Ditolak Berhenti Dengan Alasan : <strong><?= $detail1->keterangan_tolak_petugas?></strong>
              <?php endif; ?>


              <br>
              <div class="ln_solid"></div>



              <div class="form-group" id="ifYes" style="display:none">
                <label class="control-label col-md-3 " for="last-name">Masukkan Keterangan Tolak
                </label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <textarea id="ket_tolak_nasabah" rows="3" name="keterangan_tolak" class="form-control"></textarea>
                </div>
              </div>


              <div class="form-group" id="ifNo" style="display:none">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Tolak
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">

                </div>
              </div>

              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('P_anggota/undurList')?>" class="btn btn-default">Kembali</a>
                  <?php if ($detail1->status == -2 || $detail1->status == 0): ?>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                  <?php elseif ($detail1->status == -1): ?>
                    Nasabah Sudah Di Izinkan Berhenti
                  <?php elseif ($detail1->status == 1): ?>
                    Nasabah Sudah Berhenti
                  <?php endif; ?>

                </div>
              </div>



            </form>
          </div>
        </div>
      </div>
    </div>


    <?php endforeach; ?>



</div>
