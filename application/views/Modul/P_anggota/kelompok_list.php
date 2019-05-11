<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Kelompok dan Penanggung Jawabnya</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-sort1" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Nama Kelompok</th>
                  <th>Kecamatan</th>
                  <th>Penanggung Jawab</th>
                  <!-- <th>Saldo (Rp)</th>
                  <th>Terdaftar Sejak</th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td><?= $list1->nama_kel?></td>
                    <td><?= $list1->nama_kecamatan?></td>
                    <td><?= $list1->nama_lengkap?></td>
                    <!-- <td>d</td>
                    <td>e</td> -->
                    <td>
                      <a href="<?= base_url('P_anggota/kelompokEdit/'.$list1->id)?>" class="btn btn-primary btn-xs">Edit</a>
                      <a class="delete_confirm btn btn-danger btn-xs" data-id="Kelompok <?= $list1->nama_kel ?>" href="<?= base_url('P_anggota/hapus_kelompok/'.$list1->id)?>" class="btn btn-danger btn-xs">Hapus Kelompok</a>
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
