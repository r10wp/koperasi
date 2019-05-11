<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Invoice Design <small>Sample user invoice design</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          <?php foreach ($cetak_detail1 as $detail1): ?>

            <section class="content invoice">

              <!-- title row -->
              <div class="row">
                <div class="col-xs-12 invoice-header">
                  <h1>
                    <i class="fa fa-list-alt"></i> Nomor Anggota : <?= $detail1->nomor_anggota?>
                    <small class="pull-right">Date: 16/08/2016</small>
                  </h1>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->

              <div class="row invoice-info">

                <div class="col-sm-3 invoice-col">

                  <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                  <?php if ($detail1->gambar == null): ?>

                    <div class="col-md-9 "><img src="<?= base_url()?>asset/white.jpg" alt="" id="output" height="200" width="150"></div>
                  <?php else: ?>
                    <div class="col-md-9 "><img src="<?= base_url()?>asset/ANGGOTA/<?= $detail1->gambar ?>?rand=<?php echo rand(); ?>" alt="" id="output" height="200" width="150"></div>
                  <?php endif; ?>

                  <br>&nbsp;&nbsp; <br><br>
                  <strong>Status Anggota</strong>
                  <br> <strong>Kelompok | Nama Ketua</strong>
                  <br> <strong>Alamat E-Mail</strong>
                  <br> <strong>Tempat Lahir</strong>
                  <br> <strong>Tanggal Lahir</strong>
                  <br> <strong>Nomor SIM</strong>
                  <br> <strong>Pendidikan Terakhir</strong><br>
                  <br> <strong>No Handphone 1 / WA</strong>
                  <br> <strong>No Handphone 2</strong>
                  <br> <strong>No Telephone</strong>
                  <br> <strong>Pekerjaan</strong>
                  <br> <strong>Penghasilan Per Bulan</strong><br>
                  <br> <strong>Kecamatan</strong>
                  <br> <strong>Alamat Rumah</strong>

                  <!-- <h2>Data Utama</h2> -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">

                  <strong>Nama Lengkap</strong> : <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;<?= $detail1->nama_lengkap?> -</h5>
                  <strong>Nama Panggilan </strong> : <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;<?= $detail1->nama_pendek?> -</h5>
                  <strong>Nomor KTP </strong> : <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;<?= $detail1->no_ktp?> -</h5>
                  <strong>Nomor Rekening </strong> : <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;<?= $detail1->no_sim?> | <?= $detail1->bank?> -</h5>
                  <br>

                  : <?= $detail1->nama_jabatan?>
                  <br>:
                    <?php if ($detail1->id_kelompok == null): ?>
                     <font color="red">Belum Memilih Kelompok</font>
                      | <font color="red">-</font>
                    <?php else: ?>
                      <?= $detail1->nama_kelompok?>
                      | <?= $nama_ketua_kelompok?>
                    <?php endif; ?>
                  <br>: <?= $detail1->email?>
                  <br>: <?= $detail1->kota_lahir?>
                  <br>: <?= jsdate_range_format2($detail1->tgl_lahir)?>
                  <br>: <?= $detail1->no_sim?>
                  <br>: <?= $detail1->pendidikan_terakhir?><br>
                  <br>: <?= $detail1->no_hp1?>
                  <br>: <?= $detail1->no_hp2?>
                  <br>: <?= $detail1->telp_rumah?>
                  <br>: <?= $detail1->pekerjaan?>
                  <br>: <?= $detail1->penghasilan_per_bulan?><br>
                  <br>: <?= $detail1->nama_kecamatan?>
                  <br>: <?= $detail1->alamat_lengkap?>

                </div>
                <div class="col-sm-2 invoice-col">
                  <h2>Data Suami</h2>
                  <strong>Nama Suami</strong>
                  <br> <strong>Pekerjaan Suami</strong>
                  <br> <strong>Penghasilan Per Bulan</strong><br><br>

                  <h2>Data Usaha</h2>
                  <strong>Jenis Usaha</strong>
                  <br> <strong>Modal Sendiri</strong>
                  <br> <strong>Modal Luar</strong>
                  <br> <strong>Omset Per Bulan</strong>
                  <br> <strong>Jumlah Tenaga Kerja</strong>
                  <br> <strong>Tempat Usaha</strong>
                  <br> <strong>Alamat Usaha</strong><br><br>
                  <h2>Data Pendukung</h2>
                  <strong>Nama Ibu Kandung</strong>
                  <br> <strong>Nama Kerabat</strong>
                  <br> <strong>No Tlpn</strong>
                  <br> <strong>No HP</strong>
                  <br> <strong>Alamat Kerabat</strong>

                </div>
                <div class="col-sm-3 invoice-col">
                  <h2>&nbsp;</h2>
                  : <?= $detail1->nama_suami?>
                  <br>: <?= $detail1->pekerjaan_suami?>
                  <br>: <?= $detail1->penghasilan_per_bulan?>
                  <br><br><br>
                  <br>: <?= $detail1->jenis_usaha?>
                  <br>: <?= $detail1->modal_sendiri?>
                  <br>: <?= $detail1->modal_luar?>
                  <br>: <?= $detail1->omset_per_bulan?>
                  <br>: <?= $detail1->jumlah_tenaga_kerja?>
                  <br>: <?= $detail1->tempat_usaha?>
                  <br>: <?= $detail1->alamat_usaha?>
                  <br><br>
                  <br>: <?= $detail1->nama_ibu_kandung?>
                  <br>: <?= $detail1->nama_kerabat_yang_dapat_dihubungi?>
                  <br>: <?= $detail1->no_tlp_kerabat_yg_dpt_dihubungi?>
                  <br>: <?= $detail1->hp_kerabat_yg_dpt_dihubungi?>
                  <br>: <?= $detail1->alamat_kerabat_yang_dapat_dihubungi?>
                </div>
                <!-- /.col -->

                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="ln_solid"></div>
              <!-- Table row -->
              <div class="row">
                <div class="col-xs-12 table">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Data</th>
                        <th>Keterangan</th>
                        <th>Lihat</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>KTP NASABAH</td>
                        <td><?= $detail1->no_ktp?></td>
                        <td>
                          <?php if ($detail1->file_attach_ktp_istri != NULL): ?>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ktp">View</button>
                          <?php else: ?>
                            <font color="red">Belum Upload Kartu Keluarga</font>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>KTP SUAMI</td>
                        <td><?= $detail1->nama_suami?></td>
                        <td>
                          <?php if ($detail1->file_attach_ktp_suami != NULL): ?>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ktp2">View</a>
                          <?php else: ?>
                            <font color="red">Belum Upload Kartu Keluarga</font>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>KARTU KELUARGA</td>
                        <td>-</td>
                        <td>
                          <?php if ($detail1->file_attach_kartu_keluarga != NULL): ?>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#kk">View</button>
                          <?php else: ?>
                            <font color="red">Belum Upload Kartu Keluarga</font>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>UPLOAD PEMBAYARAN</td>
                        <td>Grown Ups Blue Ray</td>
                        <td>
                          <?php if ($detail1->file_attach_bukti_pembayaran_simpanan_pokok_awal != NULL): ?>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#upload_bayar">View</button>
                          <?php else: ?>
                            <font color="red">Belum Upload Bukti Pembayaran</font>
                          <?php endif; ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead">Keterangan Tolak Sebelumnya:</p>

                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?php if ($detail1->keterangan_tolak == null): ?>
                      Belum Pernah Mengajukan Diri.
                    <?php else: ?>
                      <?= $detail1->keterangan_tolak?>
                    <?php endif; ?>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                  <p class="lead">Saldo Per Tanggal : 2/22/2014</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th>Wajib</th>
                          <td>Rp <?= $detail1->saldo_wajib?></td>
                        </tr>
                        <tr>
                          <th>Pokok</th>
                          <td>Rp <?= $detail1->saldo_pokok?></td>
                        </tr>
                        <tr>
                          <th>Sukarela</th>
                          <td>Rp <?= $detail1->saldo_sukarela?></td>
                        </tr>
                        <tr>
                          <th><h4>Total</h4></th>
                          <td><h4>Rp <?= $detail1->saldo_wajib + $detail1->saldo_pokok + $detail1->saldo_sukarela?></h4></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-xs-12">

                  <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                  <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                </div>
              </div>
            </section>

            <div class="modal fade" id="ktp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">KTP </h3>
                    <h5 class="modal-title" id="exampleModalLongTitle">NOMOR KTP : <?= $detail1->no_ktp ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <img src="<?= base_url()?>asset/KTP/<?= $detail1->file_attach_ktp_istri?>?rand=<?php echo rand(); ?>" height="300" width="400">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="ktp2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">KTP SUAMI </h3>
                    <h5 class="modal-title" id="exampleModalLongTitle">NAMA SUAMI: <?= $detail1->nama_suami ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <img src="<?= base_url()?>asset/KTP2/<?= $detail1->file_attach_ktp_suami?>?rand=<?php echo rand(); ?>" height="300" width="400">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="kk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Kartu Keluarga </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <img src="<?= base_url()?>asset/KK/<?= $detail1->file_attach_kartu_keluarga?>?rand=<?php echo rand(); ?>" height="300" width="400">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="upload_bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">KK </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <img src="<?= base_url()?>asset/BUKTI_SALDO_AWAL/<?= $detail1->file_attach_bukti_pembayaran_simpanan_pokok_awal?>?rand=<?php echo rand(); ?>" height="300" width="400">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
