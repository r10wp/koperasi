<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Formulir Pengajuan Sebagai Anggota Koperasi</h2>
            <div class="clearfix"></div>
          </div>
          <?php foreach ($cetak_detail1 as $detail1): ?>

            <div class="x_content">
            <br />
            <form  class="form-horizontal form-label-left" method="post" action="<?= base_url('New_nasabah/form_submit2')?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pemohon
                </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                <?php if ($detail1->nama  == null): ?>
                  <input type="text" value="Belum Mengisi Data Diri" readonly class="form-control col-md-7 col-xs-12" />
                <?php else: ?>
                  <input type="text" value="<?= $detail1->nama?>" readonly class="form-control col-md-7 col-xs-12" />
                <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Permohonan (Tgl. saat ini)
                </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <input type="text" value="<?= date('d F Y')?>" readonly class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">S&K Koperasi
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <a class="btn btn-success" href="<?= base_url('New_nasabah/download_sk') ?>"> Download Syarat & Ketentuan Serta Peraturan Sebagai Anggota Koperasi</a>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="checkbox" id="myCheck" required > Telah Di Baca
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password Lama
                </label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="text" name="password_lama"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password Baru</label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input name="password_baru" required="required" type="password" class="form-control" data-toggle="tooltip" data-placement="left"
                  id="pass" onfocus="document.getElementById('pass-hint').style.display='block'"
                  onblur="document.getElementById('pass-hint').style.display='none'" placeholder="**********"
                  oninput="password_validate(this);document.getElementById('progres').style.display='block';"/>
                </div>
                <strong>Minimal Password 6 Karakter.</strong> Disarankan : <font color="orange"><strong> Kombinasikan Huruf Besar dan Kecil, Angka dan Tanda untuk password yang kuat.</strong></font>
              </div>

              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Kekuatan Password <span id="result"></span>
                </label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="progress" id="progres">
                    <div class="progress-bar progress-bar-danger" role="progressbar" id="prog"></div>
                  </div>
                  <i class=" form-control-feedback" id="passsuccess" aria-hidden="true"></i>
                  <span id="passerror" class="help-block error"></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Konfirmasi Password <br>(Ketik Ulang Password Baru)
                </label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="password" name="confirm_password" id="confirm_password"  required class="form-control col-md-7 col-xs-12"/>
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('New_nasabah')?>" class="btn btn-default" >Kembali</a>
                  <?php if($detail1->id_kelompok != null ): ?>
                  <button type="submit" class="btn btn-primary btn-lg">Ajukan Untuk Menjadi Anggota Koperasi</button>
                <?php elseif ($detail1->id_kelompok == null) : ?>
                 <font color="red">Anda Belum Terdaftar Di Salah Satu Kelompok Yang Ada</font>

                 <?php endif; ?>
                </div>
              </div>

            </form>
          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>

</div>

<script>
  function password_validate(txt) {
  var val1 = 0;
  var val2 = 0;
  var val3 = 0;
  var val4 = 0;
  var val5 = 0;
  var counter, color, result;
  var flag = false;
  if (txt.value.length <= 0) {
    counter = 0;
    color = "transparent";
    result = "";
  }
  if (txt.value.length < 4 & txt.value.length > 0) {
    counter = 20;
    color = "red";
    result = "Short";
  } else {
    document.getElementById(txt.id + "error").innerHTML = " ";
    txt.style.borderColor = "grey";
    var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    //  document.getElementById("pass_veri").style.display="block";
    var fletter = /[a-z]/;
    if (fletter.test(txt.value)) {
      val1 = 20;

    } else {
      val1 = 0;
    }
    //macth special character
    var special_char = /[-!$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/;
    if (special_char.test(txt.value)) {
      val2 = 30;
    } else {
      val = 0;
    }
    /*capital_letter*/
    var cap_lett = /[A-Z]/;
    if (cap_lett.test(txt.value)) {
      val3 = 20;
    } else {
      val = 0;
    }
    /*one numeric*/
    var num = /[0-9]/;
    if (num.test(txt.value)) {
      val4 = 20;
    } else {
      val4 = 0;
    }
    /* 8-15 character*/
    var range = /^.{4,50}$/;
    if (range.test(txt.value)) {
      val5 = 10;
    } else {
      val5 = 0;
    }
    counter = val1 + val2 + val3 + val4 + val5;

    if (counter >= 30) {
      color = "skyblue";
      result = "Fair";
    }
    if (counter >= 50) {
      color = "gold";
      result = "Good";
    }
    if (counter >= 80) {
      color = "green";
      result = "Strong";
    }
    if (counter >= 90) {
      color = "green";
      result = "Very Strong";
    }
  }
  document.getElementById("prog").style.width = counter + "%";
  document.getElementById("prog").style.backgroundColor = color;
  document.getElementById("result").innerHTML = result;
  document.getElementById("result").style.color = color;
  }
</script>




<script>
  var password = document.getElementById("pass")
  , confirm_password = document.getElementById("confirm_password");

  function validatePassword(){
  if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Password Yang Di Konfirmasi Tidak Sama");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;

</script>
