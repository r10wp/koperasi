<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ketetapan dan Dokumen Koperasi</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form  data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('Settings/ketetapan_koperasi')?>">
              <?php
                $data = [];
                $no = 1;
                foreach ($cetak_detail as $detail) {
                  $data[$no]= $detail->isi;
                  $no++;
                }
              ?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Saldo Awal
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="7" required id="rupiah" value="<?= rupiahform($data[7])?>" class="form-control col-md-7 col-xs-12">
                  <span>Saldo Pokok yang wajib dibayarkan oleh nasabah baru</span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Minimal Setoran Wajib
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="8" required id="rupiah" value="<?= rupiahform($data[8])?>" class="form-control col-md-7 col-xs-12">
                  <span>Nominal nilai minimal setoran yang dapat dilakukan nasabah untuk setoran wajib bulanan</span>
                </div>
              </div>
              <!-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                </div>
              </div> -->
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a class="btn btn-default" href="<?= base_url('P_sadmin')?>">Kembali</a>
                  <button type="submit" class="btn btn-info">Ubah Data</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
