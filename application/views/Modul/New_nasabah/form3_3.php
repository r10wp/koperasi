<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <?php foreach ($cetak_detail1 as $detail1): ?>
      <?php foreach ($cetak_detail2 as $detail2): ?>

        <?php foreach ($cetak_detail3 as $detail3): ?>
          <?php $status = $detail3->status_terima_dari_kelompok ?>
        <?php endforeach;?>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Detail Kelompok dan Penanggung Jawabnya</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <img class="img-responsive avatar-view" src="<?= base_url()?>asset/ANGGOTA/<?= $detail1->foto_ketua?>" alt="Avatar" height="200" width="150">
                </div>
              </div>
              <h3>Profile Ketua :</h3>

              <ul class="list-unstyled user_data">
                <li><i class="fa fa-user"></i> <?= $detail1->nama_ketua?>
                </li>


                <li>
                  <i class="fa fa-phone "></i> <?= $detail1->telp_rumah?>
                </li>
                <li>
                  <i class="fa fa-phone-square "></i> <?= $detail1->no_hp1?>
                </li>
                <li class="m-top-xs">
                  <i class="fa fa-external-link "></i> <?= $detail1->alamat_lengkap?>
                </li>
              </ul>
              <?php if ($detail2->id_kelompok == null || $detail1->id_kel != $detail2->id_kelompok): ?>
                <?php if ($status == 1): ?>
                  Sudah Terdaftar Di Kelompok
                <?php  elseif($status == -1): ?>
                  <a class="delete_confirm btn btn-danger" data-id="/ keluar dari kelompok <?= $detail1->nama_kel ?>" href="<?= base_url('New_nasabah/keluarKelompok/'.$detail1->id_kel)?>" ><i class="fa fa-check-square"></i> Batalkan Diri</a>
                <?php else: ?>
                  <a class="set_confirm btn btn-primary" data-id="Anda Terdaftar di Kelompok <?= $detail1->nama_kel ?>" href="<?= base_url('New_nasabah/setAnggota/'.$detail1->id_kel)?>" ><i class="fa fa-check-square"></i> Daftar di Kelompok Ini</a>
                <?php endif; ?>

              <?php else: ?>
                <?php if ($status != 1): ?>

                  <a class="delete_confirm btn btn-danger" data-id="/ keluar dari kelompok <?= $detail1->nama_kel ?>" href="<?= base_url('New_nasabah/keluarKelompok/'.$detail1->id_kel)?>" ><i class="fa fa-check-square"></i> Batalkan Diri</a>
                <?php endif; ?>
              <?php endif; ?>
                <a class="btn btn-default" href="<?= base_url('New_nasabah/form3')?>" ><i class="fa fa-back"></i> Kembali</a>
              <br />

            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">


              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Detail Kelompok</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Anggota Kelompok</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Keterangan</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                    <!-- start recent activity -->
                    <ul class="messages">
                      <li>

                        <div class="message_wrapper">
                          <h4 class="heading">Nama Kelompok</h4>
                          <blockquote class="message"><?= $detail1->nama_kel?></blockquote>
                          <br />

                        </div>
                      </li>
                      <li>
                        <div class="message_wrapper">
                          <h4 class="heading">Lokasi Kecamatan</h4>
                          <blockquote class="message"><?= $detail1->nama_kecamatan?></blockquote>
                          <br />

                        </div>
                      </li>
                      <li>

                        <div class="message_wrapper">
                          <h4 class="heading">Tanggal Berdiri</h4>
                          <blockquote class="message"><?= fullTime($detail1->tgl_berdiri)?></blockquote>
                          <br />
                        </div>
                      </li>
                      <li>
                        <div class="message_wrapper">
                          <h4 class="heading">Disahkan Oleh</h4>
                          <blockquote class="message">Pengurus (<?= $detail1->id_pengurus_pemverifikasi?>|<?= $detail1->nama_pengurus?>) </blockquote>
                          <br />
                        </div>
                      </li>

                    </ul>
                    <!-- end recent activity -->

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                    <!-- start user projects -->
                    <table class="data table table-striped no-margin">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Anggota</th>
                          <th>Alamat</th>
                          <th>Tgl Gabung</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($cetak_list1 as $list1): ?>

                          <tr>
                            <td><?= $no++;?></td>
                            <td><?= $list1->nama?></td>
                            <td><?= $list1->alamat_lengkap?></td>
                            <td><?= halfnoTime($list1->tgl_bergabung)?></td>

                          </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                    <!-- end user projects -->

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                    <p><?= $detail1->deskripsi_kelompok?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    <?php endforeach; ?>
  </div>
</div>
