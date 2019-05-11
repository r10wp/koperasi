<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Kecamatan <small>Indonesia</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kecamatan</th>
                  <th>Nama Kabupaten</th>
                  <th>Nama Provinsi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($cetak_list1 as $kecamatan): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $kecamatan->nama ?></td>
                    <td><?= $kecamatan->nama_kab ?></td>
                    <td><?= $kecamatan->nama_prov ?></td>
                    <td>
                      <a href="<?= base_url('Kecamatan/edit/'.$kecamatan->id)?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                      <a class="delete_confirm btn btn-danger btn-xs" data-id="Kecamatan <?= $kecamatan->nama ?>" href="<?= base_url('Kecamatan/delete/'.$kecamatan->id)?>" ><i class="fa fa-trash-o"></i> Hapus</a>
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
