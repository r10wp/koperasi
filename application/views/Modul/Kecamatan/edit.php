<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Formulir Ubah Kecamatan</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <?php foreach ($cetak_detail1 as $detail): ?>
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('Kecamatan/edit/'.$detail->id)?>">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Provinsi <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="provinsi" id="provinsi" class="form-control">
                			<option>- Select Provinsi -</option>
                			<?php foreach($cetak_form1 as $prov){ ?>
                        <?php if ($prov->id == $detail->id_provinsi): ?>
                          <option value="<?= $prov->id?>" selected><?=$prov->nama?></option>';
                        <?php else: ?>
                          <option value="<?= $prov->id?>"><?=$prov->nama?></option>';
                        <?php endif; ?>
                			<?php } ?>
                		</select>
                  </div>
                </div>



                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Kabupaten <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="kabupaten" class="form-control" id="kabupaten">
                      <option value=''><?= $detail->nama_kab?></option>
                      <?php foreach ($cetak_form2 as $key ): ?>
                        <?php if ($detail->nama_kab != $key->nama): ?>
                          <option value='<?= $key->id?>'><?= $key->nama?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kecamatan * </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="kecamatan" value="<?= $detail->nama?>" required>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="<?= base_url('Kecamatan') ?>" class="btn btn-default" >Cancel</a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Kecamatan Baru</button>
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
