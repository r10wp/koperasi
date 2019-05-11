<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Formulir Data Pendukung</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <?php foreach ($cetak_detail1 as $detail1): ?>
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('New_nasabah/form5')?>">
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ibu Kandung </label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input class="form-control col-md-7 col-xs-12" type="text" name="nama_ibu_kandung"
                  <?php if ($detail1->nama_ibu_kandung == NULL ): ?>
                    placeholder="-"
                  <?php else: ?>
                    value="<?= $detail1->nama_ibu_kandung?>"
                  <?php endif; ?>
                  >
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kerabat Yang Dapat Dihubungi</label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input class="form-control col-md-7 col-xs-12" type="text" name="nama_kerabat_yang_dapat_dihubungi"
                  <?php if ($detail1->nama_kerabat_yang_dapat_dihubungi == NULL ): ?>
                    placeholder="-"
                  <?php else: ?>
                    value="<?= $detail1->nama_kerabat_yang_dapat_dihubungi?>"
                  <?php endif; ?>
                  >
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Kerabat Yang Dapat Dihubungi</label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <textarea class="form-control" type="text" name="alamat_kerabat_yang_dapat_dihubungi"><?php if ($detail1->alamat_kerabat_yang_dapat_dihubungi != NULL ): ?><?= $detail1->alamat_kerabat_yang_dapat_dihubungi?> <?php endif; ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Telephone Kerabat</label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input class="form-control col-md-7 col-xs-12" type="text" name="no_tlp_kerabat_yg_dpt_dihubungi"
                  <?php if ($detail1->no_tlp_kerabat_yg_dpt_dihubungi == NULL ): ?>
                    placeholder="-"
                  <?php else: ?>
                    value="<?= $detail1->no_tlp_kerabat_yg_dpt_dihubungi?>"
                  <?php endif; ?>
                  pattern="\d*" />
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Handphone Kerabat</label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input class="form-control col-md-7 col-xs-12" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="hp_kerabat_yg_dpt_dihubungi"
                  <?php if ($detail1->hp_kerabat_yg_dpt_dihubungi == NULL ): ?>
                    placeholder="-"
                  <?php else: ?>
                    value="<?= $detail1->hp_kerabat_yg_dpt_dihubungi?>"
                  <?php endif; ?>
                  pattern="\d*" />
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a class="btn btn-default" href="<?= base_url('New_nasabah')?>">Kembali</a>
                  <button type="submit" class="btn btn-primary">Simpan Data Form 5</button>
                </div>
              </div>

            </form>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
