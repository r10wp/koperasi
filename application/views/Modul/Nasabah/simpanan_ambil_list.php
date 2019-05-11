<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Pengambilan Simpanan</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-sort00" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Tgl. Pengajuan Pengambilan</th>
                  <th>Tgl. Pencairan</th>
                  <th>Jumlah Tarikan</th>
                  <th>Jumlah Diberikan</th>
                  <th>Keterangan</th>
                  <th>Detail</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>

                  <tr>
                    <td width="15%"><?= $list1->tgl_pengajuan ?></td>
                    <td width="15%"><?= $list1->tgl_pencairan_dana?></td>
                    <td align="right"><?= rupiahset($list1->total_dana_diajukan) ?></td>
                    <td align="right"><?= rupiahset($list1->total_dana_diberikan) ?></td>
                    <td>
                    <?php if ($list1->status_ambil == 1): ?>
                      <font color="blue">Sukses</font>
                    <?php elseif($list1->status_ambil == 0): ?>
                      <font color="red">Pengambilan Dana Di Tolak</font>
                    <?php elseif($list1->status_ambil == -1): ?>
                      <font color="orange">Menunggu Verifikasi dan Pencairan</font>
                    <?php elseif($list1->status_ambil == -2): ?>
                      <font color="red">Gagal Verfikasi Code</font>
                    <?php elseif($list1->status_ambil == -3): ?>
                      <font color="red">Transaksi Gagal</font>
                    <?php endif; ?> </td>

                    <td>
                      <?php if ($list1->akhir_vcode > date('Y-m-d H:i:s') && $list1->status_ambil == -3): ?>
                        <div class="btn-group">
                          <a href="<?= base_url('Nasabah/ambil_detail/'.$list1->kode)?>" class="btn btn-warning">
                            <i class="fa fa-warning"> Belum Verikasi</i>
                          </a>
                        </div>
                      <?php else: ?>
                        <div class="btn-group">
                          <a href="<?= base_url('Nasabah/ambil_detail/'.$list1->kode)?>" class="btn btn-default">
                            <i class="fa fa-book"> Lihat</i>
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
