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
                  <th>Tgl Pinjaman</th>
                  <th>No Anggota</th>
                  <th>Nama Anggota</th>
                  <th>Jenis Pinjaman</th>
                  <th>Jumlah Pinjaman</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>
                    Tgl Pinjaman
                  </th>
                  <th>No Anggota</th>
                  <th>Nama Anggota</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Jenis Pinjaman</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td><?= $list1->tgl_pinjaman ?></td>
                    <td width="10%"><?= $list1->nomor_anggota ?></td>
                    <td width="15%"><?= $list1->nama_anggota ?></td>
                    <td width="5%"><?= $list1->nama_pinjaman ?></td>
                    <td width="13%" align="right"><?= rupiahset($list1->jumlah_pinjaman_diberikan) ?></td>

                    <td>
                      <?php if ($list1->status_pinjam == 1): ?>
                        <p style="color:blue"> Pinjaman Sedang Berjalan. </p> Diverifikasi Tanggal <?= $list1->tgl_pencairan_dana ?>
                      <?php elseif($list1->status_pinjam == 0): ?>
                         <p style="color:red"> Pinjaman Ditolak. </p>Alasan : <?= $list1->keterangan_tolak ?>
                      <?php elseif($list1->status_pinjam == -1): ?>
                        <p style="color:orange"> Menunggu pencairan dana dari admin.</p>
                      <?php elseif($list1->status_pinjam == -2): ?>
                        Menunggu konfirmasi persetujuan
                      <?php endif; ?>
                    </td>
                    <td width="15%">
                      <?php if ($list1->status_pinjam == 1): ?>
                        <a href="<?= base_url('P_auditor/aksiPinjam/'.$list1->kode)?>" class="btn btn-primary btn-sm">
                          <i class="fa fa-check-square-o"> Check</i>
                        </a>
                      <?php elseif($list1->status_pinjam == 0): ?>
                        <a href="<?= base_url('P_auditor/aksiPinjam/'.$list1->kode)?>" class="btn btn-danger btn-sm">
                          <i class="fa fa-warning"> Di Tolak</i>
                        </a>
                      <?php elseif($list1->status_pinjam == -1): ?>
                        <a href="<?= base_url('P_auditor/aksiPinjam/'.$list1->kode)?>" class="btn btn-warning btn-sm">
                          <i class="fa fa-eye"> Lihat Detail</i>
                        </a>
                      <?php elseif($list1->status_pinjam == -2): ?>
                        <a href="<?= base_url('P_auditor/aksiPinjam/'.$list1->kode)?>" class="btn btn-warning btn-sm">
                          <i class="fa fa-check-square-o"> Menunggu Verifikasi</i>
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
