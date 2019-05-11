<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Nasabah Aktif <small>Users</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <i class="fa fa-eye"></i> Sorting Nasabah Bedasarkan :
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Nasabah Aktif</a>
                  </li>
                  <li><a href="#">Nasabah Di Blokir</a>
                  </li>
                  <li><a href="#">Nasabah Berkas Kurang</a>
                  </li>
                  <li><a href="#">Nasabah Belum Verifikasi</a>
                  </li>
                </ul>
              </li>
            </ul>
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
                      <a href="<?= base_url('P_auditor/jadwalkanJatuhTempoSimpan/'.$list1->id)?>" class="btn btn-danger btn-sm">Rubah jadwal pembayaran</a>
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
