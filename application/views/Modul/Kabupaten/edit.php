<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 " >
        <div class="x_panel " >
          <div class="x_title" >
            <h2>Formulir Edit Kabupaten </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('Kabupaten/edit/'.$prim_kode)?>">
              <?php foreach ($cetak_detail1 as $kabupaten): ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Provinsi<span class="required">*</span>
                  </label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <select class="form-control" name="id_provinsi">
                      <?php foreach($cetak_form1 as $provinsi) { ?>
                        <?php if ($provinsi->id == $kabupaten->id_provinsi ): ?>
                          <option value="<?= $provinsi->id?>" selected><?= $provinsi->nama?> </option>
                        <?php else: ?>
                          <option value="<?= $provinsi->id?>"><?= $provinsi->nama?> </option>
                        <?php endif; ?>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Kabupaten <span class="required">*</span>
                  </label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="nama_kabupaten" value="<?= $kabupaten->nama?>">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="<?= base_url('Kabupaten')?>"  class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-warning">Rubah Data Kabupaten</button>
                  </div>
                </div>
              <?php endforeach; ?>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Kabupaten <small>Indonesia</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Provinsi</th>
                  <th>Nama Kabupaten</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($cetak_list1 as $kabupaten): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $kabupaten->provinsi ?></td>
                    <td><?= $kabupaten->nama ?></td>
                    <td>
                      <a href="<?= base_url('Kabupaten/edit/'.$kabupaten->id)?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                      <a class="delete_confirm btn btn-danger btn-xs" data-id="Kabupaten <?= $kabupaten->nama ?>" href="<?= base_url('Kabupaten/delete/'.$kabupaten->id)?>" ><i class="fa fa-trash-o"></i> Hapus</a>
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
