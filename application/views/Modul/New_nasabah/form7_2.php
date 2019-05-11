<div class="right_col" role="main">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-5 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Form Edit Rekening</h2>
          <div class="clearfix"></div>
        </div>
        <?php foreach ($cetak_detail1 as $detail1): ?>
          <div class="x_content">
          <br />
          <form class="form-horizontal form-label-left input_mask" method="post" action="<?= base_url('New_nasabah/form72/'.$detail1->id)?>">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">No Rekening</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <input type="text" name="no_rekening" class="form-control" value="<?= $detail1->no_rekening_nasabah?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Bank</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <select class="form-control" name="nama_bank" required>
                  <?php foreach ($cetak_bank as $bank): ?>
                    <?php if ($detail1->id_bank_nasabah == $bank->id_bank): ?>
                      <option value="<?= $bank->id_bank?>" selected><?= $bank->nama_bank?></option>
                    <?php else: ?>
                      <option value="<?= $bank->id_bank?>"><?= $bank->nama_bank?></option>
                    <?php endif; ?>

                  <?php endforeach; ?>

                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Pemilik Rekening</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <input type="text" name="nama_pemilik_rekening" class="form-control" value="<?= $detail1->nama_pemilik_dalam_rekening?>" required>
              </div>
            </div>






            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-12 col-sm-9 col-xs-12 col-md-offset-3">
                <a href="<?= base_url('New_nasabah/form73/'.$detail1->id)?>" data-id="No Rekening : <?= $detail1->no_rekening_nasabah?>"  class="delete_confirm btn btn-danger">Hapus</a>
                <a href="<?= base_url('New_nasabah/form7')?>" class="btn btn-default">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
              </div>
            </div>

          </form>
        </div>
        <?php endforeach; ?>
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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($cetak_list1 as $list1): ?>
                <tr>
                  <td><?= $no++?></td>
                  <td><?= $list1->no_rekening_nasabah?></td>
                  <td><?= $list1->nama_bank?></td>
                  <td><?= $list1->nama_pemilik_dalam_rekening?></td>
                  <td >
                    <a href="<?= base_url('New_nasabah/form72/'.$list1->id)?>" class="btn btn-success btn-xs">Pilih</a>
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
