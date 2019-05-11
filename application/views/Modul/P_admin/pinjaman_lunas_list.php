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
            <table id="datatable-sort00" class="table table-striped table-bordered" >
              <thead>
                <tr>
                  <th>No Anggota</th>
                  <th>Nama Anggota</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Jenis Pinjaman</th>
                  <th>Status Lunas</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No Anggota</th>
                  <th>Nama Anggota</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Jenis Pinjaman</th>
                  <th>Status Lunas</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td width="10%"><?= $list1->nomor_anggota ?></td>
                    <td width="15%"><?= $list1->nama_anggota ?></td>
                    <td width="5%"><?= $list1->nama_pinjaman ?></td>
                    <td width="13%" align="right"><?= rupiahset($list1->jumlah_pinjaman_diberikan) ?></td>
                    <td width="15%"><?php if ($list1->terbayar < $list1->total_pinjaman_diberikan_setelah_bunga): ?>
                      <?php $kurang = ($list1->terbayar/$list1->total_pinjaman_diberikan_setelah_bunga)*100;
                        echo "Berjalan ".$kurang."%"." / ".rupiahset($list1->terbayar);?>
                      <?php else: ?>
                        Lunas
                    <?php endif; ?></td >
                    <td>
                      <?php if ($list1->status_pinjam == 1): ?>
                        <p style="color:blue"> Transaksi Sukses. </p> Diverifikasi Tanggal <?= $list1->tgl_pencairan_dana ?>
                      <?php elseif($list1->status_pinjam == 0): ?>
                         <p style="color:red"> Setoran Ditolak. </p>Alasan : <?= $list1->keterangan_tolak ?>
                      <?php elseif($list1->status_pinjam == -1): ?>
                        <p style="color:orange"> Menunggu Konfirmasi</p>
                      <?php elseif($list1->status_pinjam == -2): ?>
                        Belum Upload Bukti Pembayaran / Setoran
                      <?php endif; ?>
                    </td>
                    <td width="15%">
                      <?php if ($list1->status_pinjam == 1): ?>
                        <a href="<?= base_url('P_admin/accPinjam/'.$list1->kode)?>" class="btn btn-primary btn-sm">
                          <i class="fa fa-check-square-o"> Selesai</i>
                        </a>
                      <?php elseif($list1->status_pinjam == 0): ?>
                        <a href="<?= base_url('P_admin/accPinjam/'.$list1->kode)?>" class="btn btn-danger btn-sm">
                          <i class="fa fa-warning"> Di Tolak</i>
                        </a>
                      <?php elseif($list1->status_pinjam == -1): ?>
                        <a href="<?= base_url('P_admin/accPinjam/'.$list1->kode)?>" class="btn btn-warning btn-sm">
                          <i class="fa fa-warning"> Belum di Cairkan</i>
                        </a>
                      <?php elseif($list1->status_pinjam == -2): ?>
                        <a href="<?= base_url('P_admin/accPinjam/'.$list1->kode)?>" class="btn btn-default btn-sm">
                          <i class="fa fa-eye"> Lihat</i>
                        </a>
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
