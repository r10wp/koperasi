<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <?php
      foreach ($cetak_detail1 as $detail1): ?>
        <form class="form-horizontal form-label-left input_mask" method="post" action="<?= base_url('New_nasabah/form3')?>">
          <div class="col-md-5 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Cari Kelompok Beserta Penanggung Jawab</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select name="provinsi" id="provinsi" class="jschosen form-control">
                      <option>- Select Provinsi -</option>
                      <?php foreach($cetak_form1 as $prov){ ?>
                        <option value="<?= $prov->id?>"><?=$prov->nama?></option>';
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Kabupaten </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select name="kab" class="jschosen form-control" id="kabupaten">
                      <option value=''>- Select Kabupaten -</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select name="kec" class="jschosen form-control" id="kecamatan" required>
                      <option value="">- Select Kecamatan -</option>
                    </select>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <a href="<?= base_url('New_nasabah/form3')?>" class="btn btn-default"> Kembali</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Mulai Pencarian</button>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <?php
                  foreach ($cetak_list1 as $list1):
                    $nama_kecamatan = $list1->nama_kec;
                  endforeach;
                ?>
                <h2>List Penanggung Jawab dalam wilayah : <?= $nama_kecamatan?> </h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="datatable-fixed-header" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nama Kelompok</th>
                      <th>Nama Ketua</th>
                      <th>Alamat Ketua</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($cetak_list1 as $list1): ?>
                      <tr>
                        <td><?= $list1->nama_kel ?></td>
                        <td><?= $list1->ketua ?></td>
                        <td><?= $list1->alamat ?></td>
                        <td>
                          <?php if ($detail1->id_kelompok == $list1->id_kel): ?>
                            Kelompok Saat Ini
                            <a href="<?= base_url('New_nasabah/form33/'.$list1->id_kel)?>" class="btn btn-success btn-xs"><i class="fa fa-newspaper-o"></i> Lihat Detail</a>
                          <?php else: ?>

                            <a href="<?= base_url('New_nasabah/form33/'.$list1->id_kel)?>" class="btn btn-success btn-xs"><i class="fa fa-newspaper-o"></i> Lihat Detail</a>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </form>
          <?php endforeach; ?>


    </div>
    <div class="row">
      <?php foreach ($cetak_detail1 as $detail1): ?>
        <div class="form-horizontal form-label-left input_mask" method="post" action="<?= base_url('New_nasabah/form3')?>">
          <div class="col-md-5 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Kelompok Saat Ini</h2>
                <div class="clearfix"></div>
              </div>
                <div class="x_content">
                <br />
                <?php if ($detail1->id_kelompok == null): ?>
                  <h4><font color="red">Anda Belum Memilih Kelompok!.</font></h4>
                  <?php foreach ($cetak_detail2 as $detail2): ?>

                  <?php endforeach; ?>
                <?php else: ?>
                  <div class="form-horizontal form-label-left">
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Kelompok</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" value="<?= $detail1->nama_kel?>" readonly/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Ketua </label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" value="<?= $detail1->nama_ketua?>" readonly/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-3 col-xs-12">Kecamatan</label>
                      <div class="col-md-8 col-sm-9 col-xs-12">

                        <input type="text" class="form-control" value="<?= $detail1->nama_kecamatan?>" readonly/>
                      </div>
                    </div>
                    </div>


                  <?php endif; ?>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
    </div>
  </div>
</div>
