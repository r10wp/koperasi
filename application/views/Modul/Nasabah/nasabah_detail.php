<div class="right_col" role="main">
  <div class="clearfix"></div>
  <?php foreach ($cetak_detail1 as $detail1): ?>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">

            <section class="content invoice">
              <!-- title row -->
              <div class="row">
                <div class="col-xs-12 invoice-header">
                  <h1>
                    <i class="fa fa-list-alt"></i> Nomor Anggota : <?= $detail1->nomor_anggota?>
                  </h1>
                  <h5 class="pull-right"> &nbsp;<?= fullTime($detail1->updated_at)?></h5>
                  <h5 class="pull-right"><strong> Pembaruan Data Terakhir : </strong></h5>
                </div>

                <!-- /.col -->
              </div>
              <div class="ln_solid"></div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-2 invoice-col">
                  <?php if ($detail1->gambar == null): ?>

                    <div class="col-md-5 "><img src="<?= base_url()?>asset/white.jpg" alt="" id="output" height="200" width="150"></div>
                  <?php else: ?>
                    <div class="col-md-5 "><img src="<?= base_url()?>asset/ANGGOTA/<?= $detail1->gambar ?>?rand=<?php echo rand(); ?>" alt="" id="output" height="200" width="150"></div>
                  <?php endif; ?>

                </div>
                <!-- /.col -->
                <div class="col-sm-2 invoice-col">
                  <address>
                    <strong>Nama Lengkap</strong>
                    <br> <strong>Nama Panggilan</strong>
                    <br> <strong>Kelompok / Nama Ketua</strong>
                    <br> <strong>Tempat Lahir</strong>
                    <br> <strong>Tanggal Lahir</strong>
                    <br> <strong>Nomor KTP</strong>
                    <br> <strong>Nomor SIM</strong>
                    <br> <strong>Pendidikan & Gelar</strong>
                    <br> <strong>Pekerjaan 1</strong>
                    <br> <strong>Pekerjaan 2</strong>
                    <br> <strong>Penghasilan Per Bulan</strong>
                    <br> <strong>Kecamatan</strong>
                    <br> <strong>Alamat Rumah</strong>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-8 invoice-col">
                  <address>
                    : <?= $detail1->nama_lengkap?>
                    <br>: <?= $detail1->nama_pendek?>
                    <br>:
                    <?php if ($cetak_set == 1): ?>
                      <?= $detail1->nama_kelompok?> |

                      <?php foreach ($cetak_detail2 as $detail2): ?> <?= $detail2->nama_ketua?>  <?php endforeach; ?>
                    <?php else: ?>
                      <font color="red">Belum Memilih Kelompok</font>
                    <?php endif; ?>

                    <br>: <?= $detail1->tempat_lahir?>
                    <br>: <?= halfnoTime($detail1->tgl_lahir)?> (<?= date_diff(date_create($detail1->tgl_lahir), date_create('now'))->y; ?> Tahun)
                    <br>: <?= $detail1->no_ktp?>
                    <br>: <?= $detail1->no_sim?>
                    <br>: <?= $detail1->pendidikan_terakhir?> | <?= $detail1->gelar?>

                    <?php foreach ($pekerjaan_anggota as $kerja1): echo "<br>: ".$kerja1->nama_pekerjaan ?>

                    <?php endforeach; ?>
                    <br>: <?= rupiahset($detail1->penghasilan_per_bulan)?>

                    <br>: <?= $detail1->nama_kec?>
                    <br>: <?= wordwrap($detail1->alamat_lengkap ,  40, "<br />\n &nbsp;&nbsp;");?>
                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="ln_solid"></div>
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>

                        <tr>
                          <th>Email</th>
                          <th><?= $detail1->email?></th>
                        </tr>
                        <tr>
                          <th>No. HP 1 WA</th>
                          <th><?= $detail1->no_hp1?></th>
                        </tr>
                        <tr>
                          <th> No. HP 2</th>
                          <th><?= $detail1->no_hp2?></th>
                        </tr>
                        <tr>
                          <th>No. Telp Rumah</th>
                          <th><?= $detail1->telp_rumah?></th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="col-xs-6">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th width="175px">Nama Ibu Kandung</th>
                          <th><?= $detail1->nama_ibu_kandung?></th>
                        </tr>
                        <tr>
                          <th width="175px">Nama Kerabat</th>
                          <th><?= $detail1->nama_kerabat_yang_dapat_dihubungi?></th>
                        </tr>
                        <tr>
                          <th width="175px">No Tlpn. Kerabat</th>
                          <th><?= $detail1->no_tlp_kerabat_yg_dpt_dihubungi?></th>
                        </tr>
                        <tr>
                          <th width="175px">No HP Kerabat</th>
                          <th><?= $detail1->hp_kerabat_yg_dpt_dihubungi?></th>
                        </tr>
                        <tr>
                          <th width="175px">Alamat Kerabat</th>
                          <th><?= $detail1->alamat_kerabat_yang_dapat_dihubungi?></th>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.col -->

                <!-- /.col -->
              </div>





              <div class="ln_solid"></div>

              <div class="row invoice-info">
                <div class="col-sm-2 invoice-col">
                  <strong>Data Usaha Yang dimiliki</strong>
                  <address>
                    Jenis Usaha
                    <br>Modal Sendiri
                    <br>Modal Luar
                    <br>Omset Per Bulan
                    <br>Jumlah Tenaga Kerja
                    <br>Hak Milik Tempat Usaha
                    <br>Alamat<br><br><strong>Data Suami</strong>
                    <br> Nama Suami
                    <br> Pekerjaan Suami 1
                    <br> Pekerjaan Suami 2
                    <br> Penghasilan Suami
                  </address>
                </div>
                <div class="col-sm-10 invoice-col">
                  <strong></strong>
                  <address>
                    <br>: <?= $detail1->jenis_usaha?>
                    <br>: <?= rupiahset($detail1->modal_sendiri)?>
                    <br>: <?= rupiahset($detail1->modal_luar)?>
                    <br>: <?= rupiahset($detail1->omset_per_bulan)?>
                    <br>: <?= $detail1->jumlah_tenaga_kerja?> Orang
                    <br>:
                    <?php if ($detail1->tempat_usaha == 1): ?>
                      Sewa
                    <?php else: ?>
                      Milik Sendiri
                    <?php endif; ?>
                    <br>: <?= $detail1->alamat_usaha?> <br><br>
                    <br>: <?= $detail1->nama_suami?>
                    <?php foreach ($pekerjaan_suami as $kerja2): echo "<br>: ".$kerja2->nama_pekerjaan ?>

                    <?php endforeach; ?>
                    <br>: <?= rupiahset($detail1->penghasilan_per_bulan_suami)?>
                  </address>
                </div>
              </div>

            </div>
              <!-- Table row -->
            <?php if ($punyaAnak > 0): ?>
              <div class="row">
                <div class="col-xs-12 table">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th width="15%">Anak Ke /  Status</th>
                        <th width="20%">Nama Anak</th>
                        <th width="15%">Tempat Kelahiran</th>
                        <th width="20%">Tgl Lahir / Usia</th>
                        <th>Pendidikan</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($cetak_detail3 as $detail3): ?>
                        <tr>
                          <td><?= $detail3->status_anak?></td>
                          <td><?= $detail3->nama_anak?></td>
                          <td><?= $detail3->nama_kota_lahir?></td>
                          <td><?= halfnoTime($detail3->tanggal_lahir)?> (<?= date_diff(date_create($detail3->tanggal_lahir), date_create('now'))->y; ?> Tahun) </td>
                          <td><?= $detail3->pendidikan?></td>

                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php endif; ?>
              <!-- /.row -->

              <!-- Modal -->


              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead">Arsip Penting</p>
                  <?php if ($detail1->file_attach_ktp_istri != null): ?>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ktp"><i class="fa fa-check-square-o"></i> KTP Nasabah</button>
                  <?php else: ?>
                    <button class="btn btn-default btn-sm" ><i class="fa fa-close"></i> KTP Nasabah</button>
                  <?php endif; ?>
                  <?php if ($detail1->file_attach_ktp_suami != null): ?>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ktp2"><i class="fa fa-check-square-o"></i> KTP Suami</button>
                  <?php else: ?>
                    <button class="btn btn-default btn-sm" ><i class="fa fa-close"></i> KTP Suami</button>
                  <?php endif; ?>
                  <?php if ($detail1->file_attach_kartu_keluarga != null): ?>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#kk"><i class="fa fa-check-square-o"></i> Kartu Keluarga</button>

                  <?php else: ?>
                    <button class="btn btn-default btn-sm" ><i class="fa fa-close"></i> Kartu Keluarga</button>
                  <?php endif; ?>
                  <?php if ($detail1->file_attach_perjanjian != null): ?>
                    <a class="btn btn-primary btn-sm" href="<?= base_url()?>asset/SURAT_PERJANJIAN/<?= $detail1->file_attach_perjanjian?>" target="_blank"><i class="fa fa-check-square-o"></i> Surat Perjanjian</a>

                  <?php else: ?>
                    <button class="btn btn-default btn-sm" ><i class="fa fa-close"></i> Surat Perjanjian</button>
                  <?php endif; ?>
                  <?php if ($detail1->file_attach_bukti_pembayaran_simpanan_pokok_awal != null): ?>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bu"><i class="fa fa-check-square-o"></i> Bukti Pembayaran</button>
                  <?php else: ?>
                    <button class="btn btn-default btn-sm" ><i class="fa fa-close"></i> Bukti Pembayaran</button>
                  <?php endif; ?>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#rekeningModal"><i class="fa fa-credit-card"></i> Data Rekening</button>


                  <br><br>
                  <p class="lead">Tanggal-tanggal Penting</p>

                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Tanggal Terdaftar : <?= $detail1->created_at?>
                  </p>
                  <?php if ($detail1->tgl_verifikasi != null): ?>
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                      Tanggal Verifikasi : <?= $detail1->tgl_verifikasi?>
                    </p>
                  <?php endif; ?>
                  <?php if ($detail1->tgl_bergabung != null): ?>
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                      Tanggal Bergabung : <?= $detail1->tgl_bergabung?>
                    </p>
                  <?php endif; ?>
                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Tanggal Aktifitas Terakhir : <?= $detail1->updated_at?>
                  </p>
                  <?php if ($detail1->tgl_keluar != null): ?>
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                      Tanggal Keluar : <?= $detail1->tgl_keluar?>
                    </p>
                  <?php endif; ?>

                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                  <p class="lead">Saldo Saat Ini</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th width="35%">Saldo Pokok</th>
                          <td>: <?= rupiahset($detail1->saldo_pokok)?></td>
                        </tr>
                        <tr>
                          <th>Saldo Wajib</th>
                          <td>: <?= rupiahset($detail1->saldo_wajib)?></td>
                        </tr>
                        <tr>
                          <th>Saldo Sukarela</th>
                          <td>: <?= rupiahset($detail1->saldo_sukarela)?></td>
                        </tr>
                        <tr>
                          <th>Total Saldo</th>
                          <td>: <?php
                                  $total = $detail1->saldo_pokok+$detail1->saldo_wajib+$detail1->saldo_sukarela;
                                  echo rupiahset($total);
                                ?>
                          </td>
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
                  <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>

  <?php
    $a = $detail1->file_attach_ktp_istri;
    $b =$detail1->file_attach_ktp_suami;
    $c =$detail1->file_attach_kartu_keluarga;
    $d =$detail1->file_attach_perjanjian;
    $e =$detail1->file_attach_bukti_pembayaran_simpanan_pokok_awal;
  ?>

  <?php endforeach; ?>
  </div>

  <div class="modal fade" id="ktp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">KTP </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="<?= base_url()?>asset/KTP/<?= $a?>?rand=<?php echo rand(); ?>" height="400" width="500">
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
          <h5 class="modal-title" id="exampleModalLongTitle">KTP Suami </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="<?= base_url()?>asset/KTP2/<?= $b?>?rand=<?php echo rand(); ?>" height="400" width="500">
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
          <h5 class="modal-title" id="exampleModalLongTitle">KK </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="<?= base_url()?>asset/KK/<?= $c?>?rand=<?php echo rand(); ?>" height="400" width="500">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="bu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">KTP Suami </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="<?= base_url()?>asset/BUKTI_SALDO_AWAL/<?= $e?>?rand=<?php echo rand(); ?>" height="400" width="500">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div id="rekeningModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Data Rekening</h4>
        </div>
        <div class="modal-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Pemilik</th>
                <th>No Rekening</th>
                <th>Nama Bank</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($cetak_detail4 as $detail4): ?>

                <tr>
                  <th scope="row"><?= $no++;?></th>
                  <td><?= $detail4->nama_pemilik_dalam_rekening?></td>
                  <td><?= $detail4->no_rekening_nasabah?></td>
                  <td><?= $detail4->nama_bank?></td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
