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
                    <span>Pinjaman + Bunga + Denda* <br>(*Denda = Jika Ada)</span>
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
                    <input class="date-picker form-control" value="<?= rupiahset($detail1->total_pinjaman_diberikan_setelah_bunga - $detail1->terbayar)?>" type="text" readonly>
                    <span>Kekurangan</span>
                  </div>
                </div>
                <div class="ln_solid"></div>


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Lunas</span>
                  </label>
                  <?php if ( $detail1->status_lunas == 0): ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <input class="form-control" type="text" value="Belum Lunas" readonly>
                      <span>Lunas / Belum Lunas</span>
                    </div>
                  <?php else: ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <input class="form-control" type="text" value="Lunas" readonly>
                      <span>Lunas / Belum Lunas</span>
                    </div>
                  <?php endif; ?>
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
            <h2>List Pembayaran Pinjaman</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-sort2" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No. Angsuran</th>
                  <th>Tgl Jatuh Tempo</th>
                  <th>Denda</th>
                  <th>Total (Rp)</th>

                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;  $a = 0; foreach ($cetak_list1 as $list1): ?>
                  <?php if ($list1->status_bayar == 1): ?>
                    <tr>
                      <td width="13%">Angsuran Ke <?= $no++?></td>
                      <td width="15%" align="right"><?= halfNoTime($list1->tgl_jatuh_tempo)?></td>
                      <td><?= rupiahset($list1->denda)?></td>
                      <td><?= rupiahset($list1->angsuran_asli+$list1->denda)?></td>


                      <td width="40%">

                        <?php if ($list1->status_bayar == -2): ?>
                          <?php if ($list1->tgl_tagihan_pinjam < date('Y-m-d H:i:s')  ): ?>
                            <?php if ($list1->tgl_jatuh_tempo < date('Y-m-d H:i:s')): ?>
                              <font color="red">  Anda terlambat melakukan pembayaran hubungi admin untuk pembayaran </font>
                            <?php else: ?>
                              <a href="<?= base_url()?>Nasabah/bayarPinjaman/<?= $list1->kode_bayar?>" class="btn btn-success btn-sm">Bayar Pinjaman</a>
                            <?php endif; ?>
                          <?php else: ?>
                            Belum waktunya Pembayaran
                          <?php endif; ?>
                        <?php elseif($list1->status_bayar == -1):?>
                          Menunggu Konfirmasi
                        <?php elseif($list1->status_bayar == 0):?>
                          <?php if ($list1->tgl_tagihan_pinjam < date('Y-m-d H:i:s')  ): ?>
                            <?php if ($list1->tgl_jatuh_tempo < date('Y-m-d H:i:s')): ?>
                              <font color="red">  Anda terlambat melakukan pembayaran hubungi admin untuk pembayaran </font>
                            <?php else: ?>
                              <a href="<?= base_url()?>Nasabah/bayarPinjaman/<?= $list1->kode_bayar?>" class="btn btn-warning btn-sm">Bayar Pinjaman Ulang</a>
                            <?php endif; ?>
                          <?php else: ?>
                            Belum waktunya Pembayaran
                          <?php endif; ?>
                        <?php elseif($list1->status_bayar == 1):?>

                          <font color="blue"> Lunas </font>

                        <?php endif; ?>


                      </td>
                    </tr>
                  <?php $a = $no-1; ?>
                  <?php else: ?>
                    <?php $b = $no-1 ?>
                    <?php if ($a == $b): ?>
                      <td width="13%">Angsuran Ke <?= $no++?></td>
                      <td width="15%" align="right"><?= halfNoTime($list1->tgl_jatuh_tempo)?></td>
                      <td><?= rupiahset($list1->denda)?></td>
                      <td><?= rupiahset($list1->angsuran_asli+$list1->denda)?></td>


                      <td width="40%">

                        <?php if ($list1->status_bayar == -2): ?>
                          <?php if ($list1->tgl_tagihan_pinjam < date('Y-m-d H:i:s')  ): ?>
                            <?php if ($list1->tgl_jatuh_tempo < date('Y-m-d H:i:s')): ?>
                              <font color="red">  Anda terlambat melakukan pembayaran hubungi admin untuk pembayaran </font>
                            <?php else: ?>
                              <a href="<?= base_url()?>Nasabah/bayarPinjaman/<?= $list1->kode_bayar?>" class="btn btn-success btn-sm">Bayar Pinjaman</a>
                            <?php endif; ?>
                          <?php else: ?>
  <a href="<?= base_url()?>Nasabah/bayarPinjaman/<?= $list1->kode_bayar?>" class="btn btn-success btn-sm">Bayar Pinjaman</a>                          <?php endif; ?>
                        <?php elseif($list1->status_bayar == -1):?>
                          Menunggu Konfirmasi
                        <?php elseif($list1->status_bayar == 0):?>
                          <?php if ($list1->tgl_tagihan_pinjam < date('Y-m-d H:i:s')  ): ?>
                            <?php if ($list1->tgl_jatuh_tempo < date('Y-m-d H:i:s')): ?>
                              <font color="red">  Anda terlambat melakukan pembayaran hubungi admin untuk pembayaran </font>
                            <?php else: ?>
                              <a href="<?= base_url()?>Nasabah/bayarPinjaman/<?= $list1->kode_bayar?>" class="btn btn-warning btn-sm">Bayar Pinjaman Ulang</a>
                            <?php endif; ?>
                          <?php else: ?>
                            Belum waktunya Pembayaran
                          <?php endif; ?>
                        <?php elseif($list1->status_bayar == 1):?>

                          <font color="blue"> Lunas </font>

                        <?php endif; ?>


                      </td>
                    </tr>
                    <?php else: ?>
                      <td width="13%">Angsuran Ke <?= $no++?></td>
                      <td width="15%" align="right"><?= halfNoTime($list1->tgl_jatuh_tempo)?></td>
                      <td><?= rupiahset($list1->denda)?></td>
                      <td><?= rupiahset($list1->angsuran_asli+$list1->denda)?></td>


                      <td width="40%">

                        <?php if ($list1->status_bayar == -2): ?>
                          <?php if ($list1->tgl_tagihan_pinjam < date('Y-m-d H:i:s')  ): ?>
                            <?php if ($list1->tgl_jatuh_tempo < date('Y-m-d H:i:s')): ?>
                              <font color="red">  Anda terlambat melakukan pembayaran hubungi admin untuk pembayaran </font>
                            <?php else: ?>
                              <a href="<?= base_url()?>Nasabah/bayarPinjaman/<?= $list1->kode_bayar?>" class="btn btn-success btn-sm">Bayar Pinjaman</a>
                            <?php endif; ?>
                          <?php else: ?>
                            Belum waktunya Pembayaran
                          <?php endif; ?>
                        <?php elseif($list1->status_bayar == -1):?>
                          Menunggu Konfirmasi
                        <?php elseif($list1->status_bayar == 0):?>
                          <?php if ($list1->tgl_tagihan_pinjam < date('Y-m-d H:i:s')  ): ?>
                            <?php if ($list1->tgl_jatuh_tempo < date('Y-m-d H:i:s')): ?>
                              <font color="red">  Anda terlambat melakukan pembayaran hubungi admin untuk pembayaran </font>
                            <?php else: ?>
                              <a href="<?= base_url()?>Nasabah/bayarPinjaman/<?= $list1->kode_bayar?>" class="btn btn-warning btn-sm">Bayar Pinjaman Ulang</a>
                            <?php endif; ?>
                          <?php else: ?>
                            Belum waktunya Pembayaran
                          <?php endif; ?>
                        <?php elseif($list1->status_bayar == 1):?>

                          <font color="blue"> Lunas </font>

                        <?php endif; ?>


                      </td>
                    </tr>
                    <?php endif; ?>

                  <?php endif; ?>


                <?php endforeach; ?>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
