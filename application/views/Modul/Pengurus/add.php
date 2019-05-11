<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-7 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Formulir Tambah Pengurus</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left input_mask" method="post" action="<?= base_url('Pengurus/add')?>" enctype="multipart/form-data">
              <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" name="user" class="form-control has-feedback-left"
                 placeholder="Username" maxlength="7" required>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" name="nama" class="form-control has-feedback-left"
                placeholder="Nama Lengkap" required>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="email" name="email" class="form-control has-feedback-left"
                placeholder="E-Mail">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" name="no_hp" class="form-control"
                placeholder="Nomor Telephone">
                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                <textarea name="alamat" class="form-control"
                placeholder="Alamat Pengurus"></textarea>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <select class="form-control" name="gender">
                  <option value="1">Pria</option>
                  <option value="2">Wanita</option>
                </select>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <select class="form-control" name="level" dir="rtl">
                  <option value="2">Auditor</option>
                  <option value="3">Admin</option>
                  <option value="4">Bagian Keanggotaan</option>
                </select>
              </div>
              <div class="clearfix"></div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-sm-12 text-center ">
                  <a href="<?= base_url('P_sadmin')?>" class="btn btn-default">Kembali</a>
                  <button type="submit" class="btn btn-primary">Tambah Pengurus Baru</button>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Pas Foto Pengurus</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <div class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                  <div class="col-md-9 col-sm-9 col-xs-12"><img src="<?= base_url()?>asset/white.jpg" alt="" id="output" height="200" width="150"></div>
                  <br><br><br><br><br><br><br><br><br><br><br><hr>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="file" name="foto" class="form-control" accept=".jpg" id="checkext4" onchange="ValidateSizePreview(this)" required/>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
      <div class="clearfix"></div>



    </div>

  </div>
</div>
