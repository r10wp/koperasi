<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data nasabah yang wajib membayar tagihan pinjaman bulan ini</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Tgl Tagihan</th>
                  <th>Tgl Jatuh Tempo</th>
                  <th>Nomor Nasabah</th>
                  <th>Besaran Pembayaran</th>

                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td><?= $list1->tgl_tagihan_pinjam?></td>
                    <td><?= $list1->tgl_jatuh_tempo?></td>
                    <td><?= $list1->nomor_anggota?></td>
                    <td><?= rupiahform($list1->angsuran_asli)?></td>
                    <td>
                      <a href="<?= base_url('P_auditor/ingatkanPembayaran/'.$list1->no_hp1.'/'.$list1->tgl_jatuh_tempo.'/'.$list1->angsuran_asli.'')?>" class="btn btn-warning btn-sm">Ingatkan Tagihan</a>
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
