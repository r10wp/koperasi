<div class="right_col" role="main">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-5 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Form Tambah Rekening</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form class="form-horizontal form-label-left input_mask" method="post" action="<?= base_url('Rekening_koperasi/add')?>">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">No Rekening</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <input type="text" name="rekening" class="form-control" >
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Bank</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <select class="form-control" name="bank" required>
                  <option value="">--Pilih Bank--</option>
                  <?php foreach ($cetak_bank as $bank): ?>
                    <option value="<?= $bank->id_bank?>"><?= $bank->nama_bank?></option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Pemilik Rekening</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <input type="text" name="pemilik" class="form-control">
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <a class="btn btn-default" href="<?= base_url('P_sadmin')?>">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambahkan Rekening</button>
              </div>
            </div>

          </form>
        </div>
      </div>

    </div>

    <div class="col-md-7 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Rekening</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Rekening</th>
                <th>Nama Bank</th>
                <th>Pemiik Rekening</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($cetak_list1 as $list1): ?>
                <tr>
                  <td><?= $no++?></td>
                  <td><?= $list1->no_rekening?></td>
                  <td><?= $list1->nama_bank?></td>
                  <td><?= $list1->nama_pemilik_rekening?></td>
                  <td><?= $list1->status_rekening_koperasi?></td>
                  <td>
                    <a href="<?= base_url('Rekening_koperasi/edit/'.$list1->id)?>" class="btn btn-success btn-xs">Pilih</a>
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
