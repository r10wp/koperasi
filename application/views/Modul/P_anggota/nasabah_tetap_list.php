<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Nasabah Tetap</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Kode Nasabah</th>
                  <th>Nama Nasabah</th>
                  <th>Status</th>
                  <th>Nama Kelompok</th>
                  <th>Kecamatan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td><?= $list1->nomor_anggota ?></td>
                    <td><?= $list1->nama_anggota ?></td>
                    <td>
                      <?php if ($list1->idjabatan_anggota == 2): ?>
                        Ketua
                      <?php else: ?>
                        Anggota
                      <?php endif; ?>
                    </td>
                    <td><?= $list1->nama_kel ?>  </td>
                    <td><?= $list1->nama_kec ?>  </td>
                    <td width="35%">
                      <div class="btn-group">
                        <a href="<?= base_url('Nasabah/detail/')?><?= $list1->id_anggota?>" class="btn btn-success">
                          <i class="fa fa-list-alt"> Lihat Detail</i>
                        </a>
                      </div>
                      <div class="btn-group">
                        <a class="btn btn-warning btn-sm" href="<?= base_url('P_anggota/suspend/')?><?= $list1->id_anggota ?>">
                          <i class="fa fa-power-off"> Suspend Akun</i>
                        </a>
                      </div>
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
