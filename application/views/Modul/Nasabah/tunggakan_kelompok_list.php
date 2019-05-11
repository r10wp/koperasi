<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Tunggakan Nasabah</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>

                  <th>Nama Nasabah</th>
                  <th>Nomor Telephone</th>
                  <th>Jumlah Pinjaman</th>
                  <th>Terbayar</th>
                  <th>Kurang</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($cetak_list1 as $list): ?>
                  <tr>
                    <td><?= $no++?></td>
                    <td><?= $list->nama_nasabah?></td>
                    <td><?= $list->no_hp1?></td>
                    <td><?= $list->total_pinjaman_diberikan_setelah_bunga?></td>
                    <td><?= $list->terbayar?></td>
                    <td><?= $list->total_pinjaman_diberikan_setelah_bunga-$list->terbayar?></td>
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
