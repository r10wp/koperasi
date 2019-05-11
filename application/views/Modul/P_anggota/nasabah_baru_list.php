<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Calon Nasabah Koperasi</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-sort00" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Tgl Pedaftaran</th>
                  <th>Tgl Pengajuan</th>
                  <th>Kode User</th>
                  <th>Nama / Email / No. HP</th>
                  <th>Keterangan / Tgl Daftar / Tgl Aktivitas Terakhir</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>

                  <tr>
                    <td width="14%"><?= $list1->updated_at ?></td>
                    <td width="14%">
                      <?php if ($list1->status_terima != -2): ?>
                        Belum Mengajukan
                      <?php else: ?>
                        <?= fullTime($list1->updated_at) ?>
                      <?php endif; ?>
                    </td>
                    <td><?= $list1->nomor_anggota ?></td>
                    <td><?= $list1->nama_anggota ?> / <?= $list1->no_hp1 ?> / <br><?= $list1->email ?></td>
                    <td>
                      <?php if($list1->nasabah_baru == 1 && $list1->status_terima == -3): ?>
                        Belum Melakukan Upload Berkas
                        <br>
                        <small><font color="blue"><?= $list1->created_at?></font> / <font color="green"><?= $list1->updated_at?></font></small>
                      <?php elseif($list1->nasabah_baru == 1 && $list1->status_terima == -2): ?>
                        Menuggu Pengecekan Berkas. Segera Di Check!
                        <br>
                        <small><font color="blue"><?= $list1->created_at?></font> / <font color="green"><?= $list1->updated_at?></font></small>
                      <?php elseif($list1->nasabah_baru == 1 && $list1->status_terima == -1): ?>
                        Berkas Pernah Ditolak. Dengan Alasan : <font color="red"> <?= $list1->keterangan_tolak?></font>
                        <br>
                        <small><font color="blue"><?= $list1->created_at?></font> / <font color="green"><?= $list1->updated_at?></font></small>
                      <?php endif; ?>
                    </td>
                    <td width="20%">
                      <?php if($list1->nasabah_baru == 1 && $list1->status_terima == -3): ?>
                        <div class="btn-group">
                          <a href="<?= base_url('P_anggota/checkBerkasNasabah/')?><?= $list1->id_anggota?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-clock-o"> Masih Mengisi Data</i>
                          </a>
                        </div>
                      <?php elseif($list1->nasabah_baru == 1 && $list1->status_terima == -2): ?>
                        <div class="btn-group">
                          <a href="<?= base_url('P_anggota/checkBerkasNasabah/')?><?= $list1->id_anggota?>" class="btn btn-primary btn-sm">
                            <i class="fa fa-check-square"> Check Berkas dan Verifikasi</i>
                          </a>
                        </div>
                      <?php elseif($list1->nasabah_baru == 1 && $list1->status_terima == -1): ?>
                        <div class="btn-group">
                          <a href="<?= base_url('P_anggota/checkBerkasNasabah/')?><?= $list1->id_anggota?>" class="btn btn-success btn-sm">
                            <i class="fa fa-check-square"> Check Berkas dan Verifikasi Ulang</i>
                          </a>
                        </div>
                      <?php endif; ?>

                    </td>
                  </tr>

                <?php endforeach; ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
