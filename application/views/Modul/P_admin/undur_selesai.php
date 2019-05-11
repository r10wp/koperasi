<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Nasabah Yang Sudah Mengundurkan Diri</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Nasabah</th>
                  <th>Nama Nasabah</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Tanggal Verifikasi Undur</th>
                  <th>Dana</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td><?= $list1->ai_berhenti?></td>
                    <td><?= $list1->nomor_anggota?></td>
                    <td><?= $list1->nama?></td>
                    <td><?= $list1->tgl_permintaan_berhenti?></td>
                    <td><?= $list1->tgl_dana_dicairkan?></td>
                    <td><?= rupiahform($list1->dana_yang_dicairkan)?></td>
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
