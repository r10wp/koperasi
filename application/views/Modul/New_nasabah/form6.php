<div class="right_col" role="main">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-5 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Form Tambah Anak</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form class="form-horizontal form-label-left input_mask" method="post" action="<?= base_url('New_nasabah/form6')?>">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Anak Ke / Status</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <input type="text" name="status_anak" class="form-control" placeholder="1 / 2 / 3 / ... / Adopsi">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Anak</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <input type="text" name="nama_anak" class="form-control" placeholder="Nama Anak">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Tempat Lahir</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <input type="text" name="nama_kota_lahir" class="form-control" placeholder="Tempat Lahir">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Lahir</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12">Pendidikan</label>
              <div class="col-md-8 col-sm-9 col-xs-12">
                <!-- <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan Terakhir Anak"> -->
                <select class="form-control" name="pendidikan">
                  <option value="Tidak Sekolah"> Tidak Sekolah </option>
                  <option value="SD / MI / Setara"> SD / MI / Setara</option>
                  <option value="SMP / MA / Setara"> SMP / MA / Setara</option>
                  <option value="SMA / SMK / MTS / Setara"> SMA / SMK / MTS / Setara</option>
                  <option value="D1"> D1</option>
                  <option value="D2"> D2 </option>
                  <option value="D3"> D3 </option>
                  <option value="D4"> D4 </option>
                  <option value="S1"> S1</option>
                  <option value="S2"> S2 </option>
                  <option value="S3"> S3 </option>
                </select>
              </div>
            </div>

        

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <a class="btn btn-default" href="<?= base_url('New_nasabah')?>">Kembali</a>
                <button type="submit" class="btn btn-primary">Tambahkan Data Anak</button>
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
                  <td ><?= $list1->status_anak?></td>
                  <td><?= $list1->nama_anak?></td>
                  <td><?= $list1->nama_kota_lahir?></td>
                  <td><?= halfnoTime($list1->tanggal_lahir)?></td>
                  <td><?= date_diff(date_create($list1->tanggal_lahir), date_create('now'))->y;?> Tahun</td>
                  <td>
                    <a href="<?= base_url('New_nasabah/form62/'.$list1->id)?>" class="btn btn-success btn-xs">Lihat Detail</a>
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
