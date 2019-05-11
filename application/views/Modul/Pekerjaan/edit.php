<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-5 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Formulir Data Pekerjaan</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('Pekerjaan/edit/'.$prim_kode)?>">
              <?php foreach ($cetak_detail1 as $detail1): ?>

              <div class="form-group">
                <label class="control-label col-xs-4" for="first-name">Nama Pekerjaan
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" required class="form-control" name="nama" value="<?= $detail1->nama_pekerjaan?>">
                </div>
              </div>

              <?php endforeach; ?>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1">
                  <a href="<?= base_url('P_sadmin')?>" class="btn btn-default">Kembali</a>
                  <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Ubah Data Pekerjaan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-7 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Pekerjaan</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pekerjaan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  foreach ($cetak_list1 as $kerja): ?>
                  <tr>

                    <td scope="row" ><?= $no++?></td>
                    <td ><?= $kerja->nama_pekerjaan ?></td>
                    <td >
                        <a href="<?= base_url('Pekerjaan/edit/'.$kerja->id_pekerjaan)?>" class="btn btn-success btn-xs">Edit</a>
                        <a href="<?= base_url('Pekerjaan/delete/'.$kerja->id_pekerjaan)?>" data-id="Pekerjaan <?= $kerja->nama_pekerjaan?>" class="delete_confirm btn btn-danger btn-xs">Hapus</a>
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
