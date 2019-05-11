<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Simpanan Nasabah</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <table id="datatable-sort1" class="table table-striped table-bordered" >
              <thead>
                <tr>
                  <th>No Anggota</th>
                  <th>Nama Anggota</th>
                  <th>Tanggal Simpan</th>
                  <th>Jenis Simpanan</th>
                  <th>Jumlah Setor</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No Anggota</th>
                  <th>Nama Anggota</th>
                  <th>Tanggal Simpan</th>
                  <th>Jenis Simpanan</th>
                  <th>Jumlah Setor</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td width="10%"><?= $list1->nomor_anggota ?></td>
                    <td width="15%"><?= $list1->nama_anggota ?></td>
                    <td width="10%">
                      <?php if ($list1->jenis_simpanan == 2): ?>
                        <?= cutForDate($list1->tgl_wajib_setor) ?>
                      <?php else: ?>
                        <?= cutForDate($list1->tgl_lakukan_simpan) ?>
                      <?php endif; ?>
                    </td>
                    <td width="5%">
                      <?php if ($list1->jenis_simpanan == 1): ?>
                        Pokok
                      <?php elseif($list1->jenis_simpanan == 2): ?>
                        Wajib
                      <?php else: ?>
                        Sukarela
                      <?php endif; ?>
                    </td >
                    <td width="13%" align="right"><?= rupiahset($list1->total_setoran) ?></td>
                    <td>
                      <?php if ($list1->status_simpan == 1): ?>
                        <p style="color:blue"> Transaksi Sukses. </p> Diverifikasi Tanggal <?= $list1->tgl_verifikasi_simpanan ?>
                      <?php elseif($list1->status_simpan == 0): ?>
                         <p style="color:red"> Setoran Ditolak. </p>Alasan : <?= $list1->keterangan_tolak_simpanan ?>
                      <?php elseif($list1->status_simpan == -1): ?>
                        <p style="color:orange"> Menunggu Konfirmasi</p>
                      <?php elseif($list1->status_simpan == -2): ?>
                        Belum Upload Bukti Pembayaran / Setoran
                      <?php endif; ?>
                    </td>
                    <td width="15%">
                      <?php if ($list1->status_simpan == 1): ?>
                        <a href="<?= base_url('P_admin/aksiSimpan/'.$list1->kode_simpan)?>" class="btn btn-primary btn-sm">
                          <i class="fa fa-check-square-o"> Selesai</i>
                        </a>
                      <?php elseif($list1->status_simpan == 0): ?>
                        <a href="<?= base_url('P_admin/aksiSimpan/'.$list1->kode_simpan)?>" class="btn btn-danger btn-sm">
                          <i class="fa fa-close"> Di Tolak</i>
                        </a>
                      <?php elseif($list1->status_simpan == -1): ?>
                        <a href="<?= base_url('P_admin/aksiSimpan/'.$list1->kode_simpan)?>" class="btn btn-warning btn-sm">
                          <i class="fa fa-warning"> Belum di Verifikasi</i>
                        </a>
                      <?php elseif($list1->status_simpan == -2): ?>
                        <a href="<?= base_url('P_admin/aksiSimpan/'.$list1->kode_simpan)?>" class="btn btn-default btn-sm">
                          <i class="fa fa-warning"> Belum Upload</i>
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
