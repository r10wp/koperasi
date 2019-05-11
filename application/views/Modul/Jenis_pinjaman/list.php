<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Formulir Tambah Jenis Pinjaman</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('Jenis_pinjaman/add')?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pinjaman <span class="required">*</span>
                </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <input name="nama" type="text"  class="form-control col-md-7 col-xs-12"  required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Batas Peminjaman (Rp. )
                </label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input name="min" type="text" id="rupiah"  required class="form-control col-md-7 col-xs-12">
                  <span>Minimal</span>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input name="max" type="text" id="rupiah2"  required class="form-control col-md-7 col-xs-12">
                  <span>Maximal</span>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bunga Pinjaman (%)</label>
                <div class="col-md-1 col-sm-6 col-xs-12">
                  <input name="bunga" class="form-control col-md-7 col-xs-12" type="text"
                  oninput="this.value=this.value.replace(/[^0-9.]/g,'');" pattern=".{1,90}" required>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Batas Angsuran Maksimal (Bulan)</label>
                <div class="col-md-1 col-sm-6 col-xs-12">
                  <input name="angsur" class="form-control col-md-7 col-xs-12" type="number" required>
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Denda (Hari)</label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input name="denda" class="form-control col-md-7 col-xs-12" type="text" id="rupiah3" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea rows="2" style="width:300px"  name="ket" ></textarea>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('P_sadmin')?>" class="btn btn-default">Kembali</a>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Jenis Pinjaman</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Jenis Pinjaman</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nama Pinjaman</th>
                  <th>Jumlah Minimal Pinjam </th>
                  <th>Jumlah Maksimal Pinjam </th>

                  <th>Bunga per Bulan </th>
                  <th>Batas Angsuran </th>
                  <th>Denda Per Hari </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php  $no=1; foreach ($cetak_list1 as $jp): ?>
                  <tr>
                    <td><?= $jp->nama?></td>
                    <td><?= rupiahset($jp->batas_minimal_pinjaman)?></td>
                    <td><?= rupiahset($jp->batas_maksimal_pinjaman)?></td>
                    <td ><?= $jp->bunga_pinjaman?> %</td>
                    <td><?= $jp->batas_jumlah_angsuran?> X</td>
                    <td><?= rupiahset($jp->denda_per_hari)?></td>
                    <td >
                        <a href="<?= base_url('Jenis_pinjaman/edit/'.$jp->id)?>" class="btn btn-success btn-xs">Edit</a>
                        <a href="<?= base_url('Jenis_pinjaman/delete/'.$jp->id)?>" data-id="Jenis Pinjaman <?= $jp->nama?>" class="delete_confirm btn btn-danger btn-xs">Hapus</a>
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
