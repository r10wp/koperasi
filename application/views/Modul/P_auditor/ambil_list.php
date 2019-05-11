<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Pengambilan Nasabah</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <i class="fa fa-eye"></i> Sorting Pengambilan Bedasarkan :
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?= base_url('Pengurus/simpananAll')?>">Semua</a>
                  </li>
                  <li><a href="<?= base_url('Pengurus/listSimpananStyle/1')?>">Terbaru</a>
                  </li>
                  <li class="separator"></li>
                  <li><a href="<?= base_url('Pengurus/listSimpananStyle/7')?>">Simpanan Wajib</a>
                  </li>
                  <li><a href="<?= base_url('Pengurus/listSimpananStyle/8')?>">Simpanan Wajib Bulan Ini</a>
                  </li>
                  <li><a href="<?= base_url('Pengurus/listSimpananStyle/5')?>">Simpanan Wajib Di Tolak</a>
                  </li>
                  <li><a href="<?= base_url('Pengurus/listSimpananStyle/5')?>">Simpanan Wajib Belum Di Verfikasi</a>
                  </li>



                </ul>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No. Anggota</th>
                  <th>Nama Pemohon</th>
                  <th>Tgl Pengajuan</th>
                  <th>Sumber Dana</th>
                  <th>Jumlah Dana Diajukan</th>
                  <th>Jumlah Dana Diberikan</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>

                  <tr>
                    <td width="10%">
                      <?= $list1->nomor_anggota ?>
                    </td>
                    <td width="12%">
                      <?= $list1->nama_anggota ?>
                    </td>
                    <td width="5%">
                      <?= cutForDate($list1->tgl_pengajuan) ?>
                    </td>

                    <td width="5%">
                      <?php if ($list1->jenis_ambil_simpanan == 1): ?>
                        Pokok
                      <?php elseif($list1->jenis_ambil_simpanan == 2): ?>
                        Wajib
                      <?php else: ?>
                        Sukarela
                      <?php endif; ?>
                    </td >


                    <td align="right"><?= rupiahset($list1->total_dana_diajukan) ?></td>
                    <td align="right"><?= rupiahset($list1->total_dana_diberikan) ?></td>
                    <td>
                    <?php if ($list1->status_ambil == 1): ?>
                      <font color="blue">Transaksi Sukses. </font>
                    <?php elseif($list1->status_ambil == 0): ?>
                      <font color="red">Pengajuan Ditolak</font>
                    <?php elseif($list1->status_ambil == -1): ?>
                      <font color="blue">Menunggu Konfirmasi Tahap Pencairan</font>
                    <?php elseif($list1->status_ambil == -2): ?>
                      <font color="orange">Menunggu Konfirmasi Tahap Persetujuan</font>
                    <?php elseif($list1->status_ambil == -3): ?>
                      <font color="red">Transaksi Gagal (Kode Verifikasi)</font>
                    <?php endif; ?> </td>
                    <td>
                      <?php if ($list1->status_ambil == 1): ?>
                        <a href="<?= base_url('P_auditor/aksiAmbil/'.$list1->kode)?>" class="btn btn-primary btn-sm">
                          <i class="fa fa-check-square-o"> Selesai</i>
                        </a>
                      <?php elseif($list1->status_ambil == 0): ?>
                        <a href="<?= base_url('P_auditor/aksiAmbil/'.$list1->kode)?>" class="btn btn-danger btn-sm">
                          <i class="fa fa-warning"> Di Tolak</i>
                        </a>
                      <?php elseif($list1->status_ambil == -1): ?>
                        <a href="<?= base_url('P_auditor/aksiAmbil/'.$list1->kode)?>" class="btn btn-warning btn-sm">
                          <i class="fa fa-warning"> Belum di Verifikasi</i>
                        </a>
                      <?php elseif($list1->status_ambil == -2): ?>
                        <a href="<?= base_url('P_auditor/aksiAmbil/'.$list1->kode)?>" class="btn btn-default btn-sm">
                          <i class="fa fa-eye"> Lihat</i>
                        </a>
                      <?php elseif($list1->status_ambil == -3): ?>
                        <a href="<?= base_url('P_auditor/aksiAmbil/'.$list1->kode)?>" class="btn btn-default btn-sm">
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
