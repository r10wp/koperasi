<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Formulir Tambah Provinsi</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('Provinsi/add')?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Provinsi <span class="required">*</span>
                </label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nama_provinsi">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-primary">Tambah Provinsi Baru</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Provinsi <small>Indonesia</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
              <!-- Jadikan Table Biasa -->
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Provinsi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($cetak_list1 as $provinsi): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $provinsi->nama ?></td>
                    <td>
                      <a href="<?= base_url('Provinsi/edit/'.$provinsi->id)?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                      <a class="delete_confirm btn btn-danger btn-xs" data-id="Provinsi <?= $provinsi->nama ?>" href="<?= base_url('Provinsi/delete/'.$provinsi->id)?>" ><i class="fa fa-trash-o"></i> Hapus</a>
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
