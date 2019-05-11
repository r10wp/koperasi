<div class="right_col" role="main">
    <div class="clearfix"></div>

    <?php foreach ($cetak_detail1 as $detail1): ?>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Pencairan Dana Nasabah</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('P_admin/undur_acc/'.$prim_kode."/")?><?= $prim_kode2?>">



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Data Nasabah
                </label>

                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nomor_anggota?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bank Pencairan Dana
                </label>

                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->no_rekening_nasabah?>" class="form-control col-md-7 col-xs-12" readonly>
                  <span>No Rekening</span>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama_bank_nasabah?>" class="form-control col-md-7 col-xs-12" readonly>
                  <span>Nama Bank</span>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->id_pemilik_rekening?>" class="form-control col-md-7 col-xs-12" readonly>
                  <span>Nama Pemilik Dalam Rekening</span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dana Nasabah
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= rupiahset($detail1->saldo_pokok)?>" class="form-control col-md-7 col-xs-12" readonly>
                  <span>Saldo Pokok</span>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= rupiahset($detail1->saldo_wajib)?>" class="form-control col-md-7 col-xs-12" readonly>
                  <span>Saldo Wajib</span>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= rupiahset($detail1->saldo_sukarela)?>" class="form-control col-md-7 col-xs-12" readonly>
                  <span>Saldo Sukarela</span>
                </div>
              </div>

              <input type="hidden" name="dana" value="<?= $detail1->saldo_sukarela+$detail1->saldo_wajib+$detail1->saldo_pokok?>">
              <input type="hidden" name="hp" value="<?= $detail1->no_hp1?>">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Pencairan
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= rupiahset($detail1->saldo_wajib+$detail1->saldo_sukarela+$detail1->saldo_pokok)?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Terbilang
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control col-md-7 col-xs-12" rows="3" readonly><?= terbilang($detail1->saldo_wajib+$detail1->saldo_sukarela+$detail1->saldo_pokok)?> Rupiah</textarea>
                </div>

              </div>

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
                  <?php if ($detail1->status == -1 ): ?>
                    <button type="submit" class="btn btn-primary">Cairkan Dana</button>
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
