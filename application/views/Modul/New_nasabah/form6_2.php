<div class="right_col" role="main">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-5 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Form Edit Data Anak</h2>
          <div class="clearfix"></div>
        </div>
        <?php foreach ($cetak_detail1 as $detail1): ?>
          <div class="x_content">
          <br />
          <form class="form-horizontal form-label-left input_mask" method="post" action="<?= base_url('New_nasabah/form62/'.$detail1->id)?>">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Anak Ke / Status</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <input type="text" name="status_anak" class="form-control" value="<?= $detail1->status_anak?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Anak</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <input type="text" name="nama_anak" class="form-control" value="<?= $detail1->nama_anak?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Tempat Lahir</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <input type="text" name="nama_kota_lahir" class="form-control" value="<?= $detail1->nama_kota_lahir?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Lahir</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <input type="date" name="tanggal_lahir" class="form-control" value="<?= $detail1->tanggal_lahir?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Pendidikan</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <!-- <input type="text" name="pendidikan" class="form-control" value="<?= $detail1->pendidikan?>"> -->
                <select class="form-control" name="pendidikan" >
                  <option value="Tidak Sekolah" <?php if($detail1->pendidikan == "Tidak Sekolah") : echo "selected"; endif?> > Tidak Sekolah </option>
                  <option value="SD / MI / Setara" <?php if($detail1->pendidikan == "SD / MI / Setara") : echo "selected"; endif?>> SD / MI / Setara</option>
                  <option value="SMP / MA / Setara" <?php if($detail1->pendidikan == "SMP / MA / Setara") : echo "selected"; endif?> > SMP / MA / Setara</option>
                  <option value="SMA / SMK / MTS / Setara" <?php if($detail1->pendidikan == "SMA / SMK / MTS / Setara"): echo "selected"; endif?> > SMA / SMK / MTS / Setara</option>
                  <option value="D1" <?php if($detail1->pendidikan == "D1"): echo "selected"; endif?>> D1</option>
                  <option value="D2" <?php if($detail1->pendidikan == "D2"): echo "selected"; endif?>> D2 </option>
                  <option value="D3" <?php if($detail1->pendidikan == "D3"): echo "selected"; endif?>> D3 </option>
                  <option value="D4" <?php if($detail1->pendidikan == "D4"): echo "selected"; endif?>> D4 </option>
                  <option value="S1" <?php if($detail1->pendidikan == "S1"): echo "selected"; endif?>> S1</option>
                  <option value="S2" <?php if($detail1->pendidikan == "S2"): echo "selected"; endif?>> S2 </option>
                  <option value="S3" <?php if($detail1->pendidikan == "S3"): echo "selected"; endif?>> S3 </option>
                </select>
              </div>
            </div>


            <?php endforeach; ?>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-12 col-sm-9 col-xs-12 col-md-offset-3">
                <a href="<?= base_url('New_nasabah/form63/'.$detail1->id)?>" data-id="Anak Bernama <?= $detail1->nama_anak?>"  class="delete_confirm btn btn-danger">Hapus</a>
                <a href="<?= base_url('New_nasabah/form6')?>" class="btn btn-default">Kembali</a>
                <button type="submit" class="btn btn-primary">Edit Data Anak</button>
              </div>
            </div>

          </form>
        </div>

      </div>

    </div>

    <div class="col-md-7 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Anak Dari Ibu : <?= $this->session->userdata('fullname')?></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Status Anak</th>
                <th>Nama</th>
                <th>Kota Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Usia</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  foreach ($cetak_list1 as $list1): ?>
                <tr>
                  <td width="5%"><?= $list1->status_anak?></td>
                  <td><?= $list1->nama_anak?></td>
                  <td><?= $list1->nama_kota_lahir?></td>
                  <td><?= halfnoTime($list1->tanggal_lahir)?></td>
                  <td><?= date_diff(date_create($list1->tanggal_lahir), date_create('now'))->y;?> Tahun</td>
                  <td >
                    <a href="<?= base_url('New_nasabah/form62/'.$list1->id)?>" class="btn btn-success btn-xs">Lihat Detail</a>
                    <?php if ($detail1->id == $list1->id): ?>
                      Selected
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
