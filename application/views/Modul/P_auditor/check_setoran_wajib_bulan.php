<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data nasabah yang membayar simpanan wajib bulan ini</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Tgl Tagihan</th>
                  <th>Tgl Jatuh Tempo</th>
                  <th>Nomor Nasabah</th>

                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td><?= $list1->tgl_wajib_setor?></td>
                    <td><?= $list1->tgl_jatuh_tempo_bayar?></td>
                    <td><?= $list1->id_pelaku_simpan?></td>
                    <td>
                      <a href="<?= base_url('P_auditor/ingatkanPembayaranSimpan/'.$list1->no_hp1.'/'.$list1->tgl_jatuh_tempo_bayar.'')?>" class="btn btn-warning btn-sm">Ingatkan Tagihan</a>
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
