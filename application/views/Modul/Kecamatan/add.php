<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Formulir Tambah Kecamatan</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('Kecamatan/add')?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Provinsi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="provinsi" id="provinsi" class="form-control">
              			<option>- Select Provinsi -</option>
              			<?php foreach($cetak_form1 as $prov){ ?>
              				<option value="<?= $prov->id?>"><?=$prov->nama?></option>';
              			<?php } ?>
              		</select>
                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Kabupaten <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="kabupaten" class="form-control" id="kabupaten">
                    <option value=''>- Select Kabupaten -</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kecamatan *</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="kecamatan">
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('P_sadmin')?>" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kecamatan Baru</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
