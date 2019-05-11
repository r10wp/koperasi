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

                  <th>Kode Nasabah</th>
                  <th>Nama Nasabah</th>

                  <th>Status Jabatan</th>
                  <th>Status Anggota</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>

                  <tr>

                    <td><?= $list1->nomor_anggota ?></td>
                    <td><?= $list1->nama ?></td>

                    <td><?= $list1->idjabatan_anggota ?></td>
                    <td><?= $list1->nasabah_baru ?> | <?= $list1->status_terima ?>  </td>
                    <td width="45%">



                      <?php if ($list1->nasabah_baru == 0 && $list1->status_terima == 1): ?>
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-edit"> Edit </i>
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Rubah Berkas</a>
                            </li>
                            <li><a href="#">Rubah Data Diri</a>
                            </li>
                            <li><a href="#">Rubah Kelompok</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Detail Nasabah</a>
                            </li>
                          </ul>
                        </div>

                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-newspaper-o"> Kegiatan </i>
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Simpan</a>
                            </li>
                            <li><a href="#">Pinjaman</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Periksa Tagihan</a>
                            </li>
                          </ul>
                        </div>

                        <div class="btn-group">
                          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-trash-o"> Non Aktif</i>
                            <span class="caret"></span>

                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Anggota Keluar</a>
                            </li>
                            <li><a href="#">Suspend Akun</a>
                            </li>
                          </ul>
                        </div>

                      <?php elseif($list1->nasabah_baru == 0 && $list1->status_terima == 0): ?>
                        <div class="btn-group">
                          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-check-square"> Buka Blokir Anggota</i>
                          </button>
                        </div>

                      <?php elseif($list1->nasabah_baru == 1 && $list1->status_terima == -1): ?>

                      <div class="btn-group">
                        <a href="<?= base_url('Admin/checkBerkasNasabah/')?><?= $list1->id?>" class="btn btn-success">
                          <i class="fa fa-check-square"> Check Berkas dan Verifikasi Ulang</i>
                        </a>
                      </div>
                      <?php elseif($list1->nasabah_baru == 1 && $list1->status_terima == -2): ?>
                        <div class="btn-group">
                          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-check-square"> Check Berkas dan Verifikasi</i>
                          </button>
                        </div>
                      <?php elseif($list1->nasabah_baru == 1 && $list1->status_terima == -3): ?>
                        Belum Melakukan Upload dan Mengisi Data
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
