<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <?php foreach ($cetak_detail1 as $detail1): ?>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Data Pinjaman : <?= $detail1->kode?></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Data Nasabah</span>
                  </label>
                  <div class="col-md-2 col-sm-6 col-xs-12">
                    <input type="text"  class="form-control" value="<?= $detail1->nomor_anggota?>" readonly>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <input type="text"  class="form-control" value="<?= $detail1->nama_anggota?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Lakukan Pinjaman</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text"  class="form-control" value="<?= $detail1->tgl_pinjaman?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jenis Pinjaman Yang Di Ambil</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text"  value="<?= $detail1->nama?>" readonly class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Jenis Pinjaman</label>
                  <div class="col-md-1 col-sm-4 col-xs-12">
                    <input class="form-control" type="text" value="<?= $detail1->bunga_pinjaman?>" readonly>
                    <span>Bunga</span>
                  </div>
                  <div class="col-md-2 col-sm-4 col-xs-12">
                    <input class="form-control" type="text" value="<?= $detail1->batas_jumlah_angsuran?>" readonly>
                    <span>Batas Angsuran / Kali</span>
                  </div>
                  <div class="col-md-2 col-sm-4 col-xs-12">
                    <input class="form-control" type="text" value="<?= $detail1->denda_per_hari?>" readonly>
                    <span>Denda / Hari</span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Batas Akhir Pelunasan</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php
                      $set_batas_akhir = $detail1->batas_jumlah_angsuran+1;
                     ?>
                    <input class="form-control" value="<?=  date('Y-m-d',strtotime("$detail1->tgl_pinjaman +$set_batas_akhir month"))?> "type="text" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Dana Pinjaman</span>
                  </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input class="form-control" type="text" value="<?= rupiahset($detail1->jumlah_pinjaman_diajukan)?>" readonly  >
                    <span>Yang Di Minta</span>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input class="date-picker form-control" value="<?= rupiahset($detail1->jumlah_pinjaman_diberikan)?>"  readonly type="text">
                    <span>Yang Di Kabulkan</span>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input class="date-picker form-control" value="<?= rupiahset($detail1->total_pinjaman_diberikan_setelah_bunga)?>"  readonly type="text">
                    <span>Setelah Bunga</span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Dana Pelunasan</span>
                  </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input class="form-control" type="text" value="<?= rupiahset($detail1->terbayar)?>" readonly>
                    <span>Terbayar</span>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input class="date-picker form-control" value="<?= rupiahset($detail1->total_pinjaman_diberikan_setelah_bunga-$detail1->terbayar)?>" type="text" readonly>
                    <span>Kekurangan</span>
                  </div>
                </div>
                <div class="ln_solid"></div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Pembayaran</span>
                  </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <?php if ($detail1->status_lunas == 1 ): ?>
                      <input class="date-picker form-control" value="Lunas" type="text" readonly>
                    <?php else: ?>
                      <input class="date-picker form-control" value="Belum Lunas" type="text" readonly>
                    <?php endif; ?>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Nasabah Aktif <small>Users</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-sort0-asc" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Tgl Bayar</th>
                  <th>Tgl Jatuh Tempo</th>
                  <th>Total (Rp)</th>
                  <th>Terdaftar Sejak</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td>
                      <?php if ($list1->tgl_pembayaran == null): ?>
                        (kosong)
                      <?php else: ?>
                        <?= $list1->tgl_pembayaran?>
                      <?php endif; ?>
                    </td>
                    <td><?= $list1->tgl_jatuh_tempo?></td>
                    <td><?= rupiahset($list1->angsuran_asli)?></td>

                    <td>
                      <?php if ($list1->tgl_jatuh_tempo > date("Y-m-d H:i:s")): ?>
                        <?php if ($list1->status_bayar == -1): ?>
                          Nasabah sudah membayar dan menunggu verfikasi
                        <?php else: ?>
                          Belum waktunya dilalukan penagihan
                        <?php endif; ?>
                      <?php elseif($list1->status_bayar == -1): ?>
                        Menunggu Verifikasi Pengurus
                      <?php elseif($list1->status_bayar == 0): ?>
                        Pembayaran Ditolak
                      <?php elseif($list1->status_bayar == 1): ?>
                        Pembayaran Lunas
                      <?php endif; ?>
                    </td>
                    <td>

                      <?php if ($list1->status_bayar == -2): ?>
                        <?php if (date('Y-m-d H:i:s') > $list1->tgl_jatuh_tempo):?>
                          <a href="<?= base_url()?>P_admin/accBayar/<?= $list1->kode_bayar?>" class="btn btn-danger btn-sm">Lewat Jatuh Tempo</a>
                        <?php else: ?>
                          <a href="<?= base_url()?>P_admin/accBayar/<?= $list1->kode_bayar?>" class="btn btn-default btn-sm">Lihat</a>
                        <?php endif; ?>
                      <?php elseif($list1->status_bayar == -1): ?>
                        <a href="<?= base_url()?>P_admin/accBayar/<?= $list1->kode_bayar?>" class="btn btn-warning btn-sm">Verifikasi Pembayaran</a>
                      <?php elseif($list1->status_bayar == 0): ?>
                        <a href="<?= base_url()?>P_admin/accBayar/<?= $list1->kode_bayar?>" class="btn btn-warning btn-sm">Verifikasi Ulang</a>
                      <?php elseif($list1->status_bayar == 1): ?>
                        <a href="<?= base_url()?>P_admin/accBayar/<?= $list1->kode_bayar?>" class="btn btn-info btn-sm">Sudah Terbayar</a>
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
