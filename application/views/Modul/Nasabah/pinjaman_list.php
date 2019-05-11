<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Pinjaman Nasabah</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Tanggal Pinjaman</th>
                  <th>Jenis Pinjaman</th>
                  <th>Jumlah Diajukan</th>
                  <th>Jumlah Diberikans</th>
                  <th>Sudah Bayar </th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>

                  <tr>
                    <td width="14%"><?= halfNoTime($list1->tgl_pinjaman) ?></td>
                    <td align="right"><?= $list1->nama ?></td>
                    <td align="right"><?= rupiahset($list1->jumlah_pinjaman_diajukan) ?></td>
                    <td align="right"><?= rupiahset($list1->jumlah_pinjaman_diberikan) ?></td>
                    <td align="right"><?= rupiahset($list1->terbayar) ?></td>
                    <td>
                    <?php if ($list1->status_pinjam == 1): ?>
                      <font color="blue">Transaksi Sukses. </font>
                      Diverifikasi Tanggal <?= $list1->tgl_persetujuan_auditor ?>
                    <?php elseif($list1->status_pinjam == 0): ?>
                       <font color="red">Setoran Ditolak. </font>Alasan : <?= $list1->keterangan_tolak_pinjaman ?>
                    <?php elseif($list1->status_pinjam == -1): ?>
                      <font color="orange">Sudah Driverifikasi. Menunggu Pencairan Dana</font>
                    <?php elseif($list1->status_pinjam == -2): ?>
                      Menunggu Proses Verifikasi
                    <?php endif; ?> </td>
                    <td>
                      <?php if ($list1->status_pinjam == 1): ?>
                        <div class="btn-group">
                          <a href="<?= base_url('Nasabah/pinjamanDetail/'.$list1->kode_pinjam)?>" class="btn btn-success btn-sm" >
                            <i class="fa fa-check-square">  Lihat Detail</i>
                          </a>
                        </div>
                      <?php elseif($list1->status_pinjam == 0): ?>
                        <div class="btn-group">
                          <a href="<?= base_url('Nasabah/pinjamanDetail/'.$list1->kode_pinjam)?>" class="btn btn-danger btn-sm" >
                            <i class="fa fa-close"> Lihat Detail</i>
                          </a>
                        </div>
                      <?php elseif($list1->status_pinjam == -1): ?>
                        <div class="btn-group">
                          <a href="<?= base_url('Nasabah/pinjamanDetail/'.$list1->kode_pinjam)?>" class="btn btn-warning btn-sm" >
                            <i class="fa fa-clock-o">  Lihat Detail</i>
                          </a>
                        </div>
                      <?php elseif($list1->status_pinjam == -2): ?>
                          <div class="btn-group">
                            <a href="<?= base_url('Nasabah/delete_pinjaman/'.$list1->kode_pinjam)?>" class="delete_confirm btn btn-danger  btn-sm" data-id="pinjaman anda yang sebesar <?= rupiahset($list1->jumlah_pinjaman_diajukan) ?>">
                              <i class="fa fa-close"> Batalkan Pinjaman</i>
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
