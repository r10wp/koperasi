<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Pengaturan Data Koperasi</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('Settings/data_koperasi')?>">
              <?php
                $data = [];
                $no = 1;
                foreach ($cetak_detail as $detail) {
                  $data[$no]= $detail->isi;
                  $no++;
                }
              ?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Koperasi</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="1" value="<?=  $data[1];?>" required class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat Koperasi
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="2" required rows="3" class="form-control col-md-7 col-xs-12"><?=  $data[2];?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Ketua Koperasi</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="3" value="<?=  $data[3];?>" required class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor Telephone Koperasi (Utama)</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="4" value="<?=  $data[4];?>" required class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor Telephone Alternatif</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="5" value="<?=  $data[5];?>" required class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Keterangan Tambahan
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="6" required rows="3" class="form-control col-md-7 col-xs-12"><?=  $data[6];?></textarea>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a class="btn btn-default" href="<?= base_url('P_sadmin')?>" >Kembali</a>
                  <button type="submit" class="btn btn-success">Lakukan Perubahan</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
