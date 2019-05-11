<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?= base_url()?>theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url()?>theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url()?>theme/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url()?>theme/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url()?>theme/build/css/custom.min.css" rel="stylesheet">

    <style>
      #notifications {
          cursor: pointer;
          position: fixed;
          right: 0px;
          z-index: 9999;
          bottom: 0px;
          margin-bottom: 22px;
          margin-right: 15px;
          min-width: 400px;
          max-width: 800px;
      }
    </style>

  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            <form method="POST" action="<?php echo base_url('AuthAnggota/forgetPasswordConfirm/'.$code) ?>">
              <h1>Formulir Reset Password</h1>
              <div>
                <input type="password" id="pass" class="form-control"  placeholder="Password" required />
              </div>
              <div>
                <input type="password" id="confirm_password" name="password" class="form-control" placeholder="Confirm Password" required />
              </div>
              <br>
              <div>
                <button class="btn btn-default submit" type="submit">Reset Password</button>

              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Koperasi Simpan Pinjam</h1>
                  <p>©2016 Dharma Bhakti</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        <div id="notifications">
        <?php
          if($this->session->flashdata('PesanSukses')){ ?>
            <div class="alert alert-info alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4><i class="fa fa-check-square-o"></i> Sukses</h4>
              <strong><?= $this->session->flashdata('PesanSukses') ?></strong>
            </div>
          <?php }elseif ($this->session->flashdata('PesanError')) { ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4><i class="fa fa-exclamation-circle"></i> Terjadi Kesalahan</h4>
              <strong><?= $this->session->flashdata('PesanError') ?></strong>
            </div>
          <?php  }elseif ($this->session->flashdata('PesanPeringatan')) { ?>
            <div class="alert alert-warning alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4><i class="fa fa-warning"></i> Peringatan</h4>
              <strong><?= $this->session->flashdata('PesanPeringatan') ?></strong>

            </div>
          <?php  } ?>
        </div>


      </div>
    </div>

    <script src="<?= base_url()?>theme/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url()?>theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="<?= base_url()?>theme/build/js/custom.min.js"></script>
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(2500, 0).slideUp(3000, function() {
                $(this).hide();
            });
        }, 5000);
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
  </body>
</html>
