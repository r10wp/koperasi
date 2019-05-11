
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project 1</title>
    <!-- Bootstrap -->


    <link href="<?= base_url()?>theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url()?>theme/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?= base_url()?>theme/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?= base_url()?>theme/build/css/custom.min.css" rel="stylesheet">
    <link href="<?= base_url()?>theme/custom/datedrop.css" rel="stylesheet">
    <style>
      html, body {height: 100%}
      body
      {
        margin: 0px;
        padding: 0px;
      }
    </style>
    <style>
      .form-radio
      {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        display: inline-block;
        position: relative;
        background-color: #f1f1f1;
        color: #666;
        top: 10px;
        height: 35px;
        width: 35px;
        border: 0;
        border-radius: 50px;
        cursor: pointer;
        margin-right: 7px;
        outline: none;
      }
      .form-radio:checked::before
      {
        position: absolute;
        font: 23px/1 'Open Sans', sans-serif;
        color: #0c2461;
        left: 7px;
        top: 5px;
        content: '\02714';
        /* transform: rotate(220deg); */
        font-weight: 900;
      }
      .form-radio:hover
      {
        background-color: #f7f7f7;
      }
      .form-radio:checked
      {
        background-color: #f1f1f1;
      }
    </style>
    <link href="<?= base_url()?>theme/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?= base_url()?>theme/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <?php
      date_default_timezone_set('Asia/Jakarta');
      $day = date('D', strtotime(date('Y-m-d')));
      $dayList = array(
      	'Sun' => 'Minggu',
      	'Mon' => 'Senin',
      	'Tue' => 'Selasa',
      	'Wed' => 'Rabu',
      	'Thu' => 'Kamis',
      	'Fri' => 'Jumat',
      	'Sat' => 'Sabtu'
      );

    ?>

        <!-- ADD CSS -->
    <?php if($css == "model_form1"){?>
      <link href="<?= base_url()?>theme/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
      <link href="<?= base_url()?>theme/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
      <link href="<?= base_url()?>theme/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
      <link href="<?= base_url()?>theme/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
      <link href="<?= base_url()?>theme/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <?php } ?>
    <?php if($css == "model_table1"){?>
      <link href="<?= base_url()?>theme/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
      <link href="<?= base_url()?>theme/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
      <link href="<?= base_url()?>theme/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
      <link href="<?= base_url()?>theme/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
      <link href="<?= base_url()?>theme/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <?php } ?>

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
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
