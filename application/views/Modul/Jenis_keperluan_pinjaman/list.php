<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-5 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Formulir Tambah Keperluan Pinjaman</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('Jenis_keperluan_pinjaman/add')?>">
              <div class="form-group">
                <label class="control-label col-xs-4" for="first-name">Jenis Keperluan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" class="form-control" name="jenis">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-4" for="last-name">Keterangan</span>
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <textarea id="message" rows="3" name="keterangan" ></textarea>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1">
                  <a href="<?= base_url('P_sadmin')?>" class="btn btn-default">Kembali</a>

                  <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Keperluan Pinjaman Baru</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-7 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Keperluan Pinjam</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Jabatan </th>
                  <th>Keterangan </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  foreach ($cetak_list1 as $keperluan_pinjam): ?>
                  <tr>

                    <td scope="row" ><?= $no++?></td>
                    <td ><?= $keperluan_pinjam->jenis?></td>
                    <td><?= $keperluan_pinjam->keterangan?></td>
                    <td >
                        <a href="<?= base_url('Jenis_keperluan_pinjaman/edit/'.$keperluan_pinjam->id)?>" class="btn btn-success btn-xs">Edit</a>
                        <a href="<?= base_url('Jenis_keperluan_pinjaman/delete/'.$keperluan_pinjam->id)?>" data-id="Keperluan Pinjam <?= $keperluan_pinjam->jenis?>" class="delete_confirm btn btn-danger btn-xs">Hapus</a>
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
