<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Antrian Calon Anggota Yang Mendaftar Ke Kelompok Ini</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No Wa</th>
                  <th>No Alternatif</th>
                  <th>Tanggal Permintaan</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td><?= $list1->nama ?></td>
                    <td><?= $list1->alamat_lengkap ?></td>
                    <td><?= $list1->no_hp1 ?></td>
                    <td><?= $list1->no_hp2 ?> | <?= $list1->telp_rumah ?></td>
                    <td><?= $list1->tanggal_permintaan ?></td>

                    <td>
                      <?php if ($list1->status_terima_dari_kelompok == -1): ?>
                        Belum Disetujui
                      <?php elseif($list1->status_terima_dari_kelompok == 0): ?>
                        Sudah Pernah Ditolak
                      <?php elseif($list1->status_terima_dari_kelompok == 1): ?>
                        Sudah Terdaftar
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if ($list1->id_kelompok == null): ?>
                      <?php if ($list1->status_terima_dari_kelompok == -1): ?>
                        <a href="<?= base_url('Nasabah/terimaAnggota/'.$list1->id_permintaan."/".$list1->kode_anggota_peminta."/".$list1->kelompok_yang_dituju)?>" class="btn btn-warning btn-sm">Verifikasi Anggota</a>
                      <?php elseif($list1->status_terima_dari_kelompok == 0): ?>
                        <a href="<?= base_url('Nasabah/terimaAnggota/'.$list1->id_permintaan."/".$list1->kode_anggota_peminta."/".$list1->kelompok_yang_dituju)?>" class="btn btn-warning btn-sm">Verifikasi Ulang</a>
                      <?php elseif($list1->status_terima_dari_kelompok == 1): ?>
                        <a href="<?= base_url('Nasabah/terimaAnggota/'.$list1->id_permintaan."/".$list1->kode_anggota_peminta."/".$list1->kelompok_yang_dituju)?>" class="btn btn-info btn-sm">Sudah Diterima</a>
                        
                      <?php endif; ?>
                      <?php else: ?>
                        Sudah Menjadi Bagian dari kelompok
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
