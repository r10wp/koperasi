<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tunggakan Setoran Wajib</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Tanggal Tagihan</th>
                  <th>Jatuh Tempo</th>
                  <th>Total Tunggakan</th>
                  <th>Saldo (Rp)</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td><?= $list1->tgl_wajib_setor?></td>
                    <td><?= $list1->tgl_jatuh_tempo_bayar?></td>
                    <td><?= rupiahset($list1->total_setoran)?></td>

                    <td>
                      <a href="<?= base_url()?>" class="btn btn-info btn-sm">Lihat Detail</a>

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
