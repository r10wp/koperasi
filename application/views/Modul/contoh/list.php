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
                  <th>No</th>
                  <th>Kode Nasabah</th>
                  <th>Nama Nasabah</th>
                  <th>Saldo (Rp)</th>
                  <th>Terdaftar Sejak</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                  <tr>
                    <td>a</td>
                    <td>b</td>
                    <td>c</td>
                    <td>d</td>

                    <td>e</td>
                    <td>
                      <a href="<?= base_url()?>" class="btn btn-primary btn-xs">Edit</a>
                      <a href="<?= base_url()?>" class="btn btn-info btn-xs">Hapus</a>
                      <a href="<?= base_url()?>" class="btn btn-danger btn-xs">Blokir</a>
                    </td>
                  </tr>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
