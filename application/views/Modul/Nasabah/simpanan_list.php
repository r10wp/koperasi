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
            <table id="datatable-sort1" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Jumlah Setor</th>
                  <th>Jenis Simpanan</th>
                  <th>Tanggal Simpan</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Jumlah Setor</th>
                  <th>Jenis Simpanan</th>
                  <th>Tanggal Simpan</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>

                  <tr>
                    <td align="right"><?= rupiahset($list1->total_setoran) ?></td>

                    <td width="8%" align="center">
                      <?php if ($list1->jenis_simpanan == 2): ?>
                        Wajib
                      <?php else: ?>
                        Sukarela
                      <?php endif; ?>
                    </td >

                    <td width="14%">
                      <?php if ($list1->jenis_simpanan == 2): ?>
                        <?= $list1->tgl_wajib_setor ?>
                      <?php else: ?>

                        <?= $list1->tgl_lakukan_simpan ?>
                      <?php endif; ?>
                    </td>


                    <td>
                    <?php if ($list1->status_simpan == 1): ?>
                      <font color="blue">Transaksi Sukses. </font>
                      Diverifikasi Tanggal <?= $list1->tgl_verifikasi_simpanan ?>
                    <?php elseif($list1->status_simpan == 0): ?>
                       <font color="red">Setoran Ditolak. </font>Alasan : <?= $list1->keterangan_tolak_simpanan ?>
                    <?php elseif($list1->status_simpan == -1): ?>
                      <font color="orange">Menunggu Konfirmasi</font>
                    <?php elseif($list1->status_simpan == -2): ?>
                      Belum Upload Bukti Pembayaran / Setoran
                    <?php endif; ?> </td>
                    <td>
                      <?php if ($list1->status_simpan == 1): ?>
                        <div class="btn-group">
                          <a href="<?= base_url('Nasabah/upload_setoran/'.$list1->kode_simpan)?>" class="btn btn-success btn-sm" >
                            <i class="fa fa-check-square"> Transaksi Selesai</i>
                          </a>
                        </div>
                      <?php elseif($list1->status_simpan == 0): ?>
                        <div class="btn-group">
                          <a href="<?= base_url('Nasabah/upload_setoran/'.$list1->kode_simpan)?>" class="btn btn-danger btn-sm" >
                            <i class="fa fa-close"> Transaksi Ditolak</i>
                          </a>
                        </div>
                      <?php elseif($list1->status_simpan == -1): ?>
                        <div class="btn-group">
                          <a href="<?= base_url('Nasabah/upload_setoran/'.$list1->kode_simpan)?>" class="btn btn-warning btn-sm" >
                            <i class="fa fa-clock-o"> Transaksi Sedang di proses</i>
                          </a>
                        </div>
                      <?php elseif($list1->status_simpan == -2): ?>
                        <div class="btn-group">
                          <?php if ($list1->jenis_simpanan == 2): ?>
                            <a href="<?= base_url('Nasabah/bayarSetoranWajibset/'.$list1->kode_simpan)?>" class="btn btn-success btn-sm">
                              <i class="fa fa-upload"> Simpanan Wajib Belum Terbayar</i>
                            </a>

                          <?php else: ?>
                            <a href="<?= base_url('Nasabah/upload_setoran/'.$list1->kode_simpan)?>" class="btn btn-primary btn-sm">
                              <i class="fa fa-upload"> Upload Bukti Setoran / Pembayaran</i>
                            </a>
                          <?php endif; ?>

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
