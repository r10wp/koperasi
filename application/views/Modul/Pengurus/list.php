<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Pengurus Koperasi</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Level</th>
                  <th>Foto</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $list1->nama?></td>
                    <td><?= $list1->username ?></td>
                    <td><?= $list1->id_jabatan_pengurus?></td>
                    <td><img src="<?= base_url()?>asset/PENGURUS/<?= $list1->foto?>" style="width:50px" ></td>
                    <td>
                      <a href="<?= base_url('Pengurus/edit/'.$list1->id)?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
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
