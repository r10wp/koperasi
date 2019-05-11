<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-5 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tambah Bank</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('Bank/add')?>">
              <div class="form-group">
                <label class="control-label col-xs-5" for="first-name">Nama Bank
                </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" name="bank" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-5" for="first-name">Perusahan Pemilik
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" name="pt" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-5" for="first-name">Call Center
                </label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" name="call" required>
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('P_sadmin')?>" class="btn btn-default">Kembali</a>

                  <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Bank Baru</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-7 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Bank Tersedia</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Bank </th>
                  <th>Perusahaan Pemilik </th>
                  <th>Call Center</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  foreach ($cetak_list1 as $bank): ?>
                  <tr>

                    <td scope="row" ><?= $no++?></td>
                    <td ><?= $bank->nama_bank?></td>
                    <td><?= $bank->pt_bank?></td>
                    <td><?= $bank->call_center_bank?></td>
                    <td >
                        <a href="<?= base_url('Bank/edit/'.$bank->id_bank)?>" class="btn btn-success btn-xs">Edit</a>
                        <a href="<?= base_url('Bank/delete/'.$bank->id_bank)?>" data-id="Bank <?= $bank->nama_bank?>" class="delete_confirm btn btn-danger btn-xs">Hapus</a>
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
