<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tambah Kelompok</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('P_anggota/kelompokTambah')?>">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Kelompok
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_kelompok" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ketua</label>
                <div class="col-md-4 col-sm-9 col-xs-12">
                  <select class="jschosen form-control" id="set_cari_anggota" name="id_ketua" style="width:400px">
                    <option value="">Cari Data ... </option>
                    <?php foreach ($cetak_form3 as $form1) { ?>
                      <option value="<?= $form1->id?>" data-no="<?= $form1->nomor_anggota?>" data-nama="<?= $form1->nama?>" data-gambar="<?= $form1->gambar?>"><?= $form1->nomor_anggota?> - <?= $form1->nama?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Diskripsi
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea type="text" name="deskripsi"  class="form-control col-md-7 col-xs-12"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                <div class="col-md-4 col-sm-9 col-xs-12">
                  <select name="provinsi" id="provinsi" class="jschosen form-control">
                    <option>- Pilih  Provinsi -</option>
                    <?php foreach($cetak_form1 as $prov){ ?>
                      <option value="<?= $prov->id?>"><?=$prov->nama?></option>';
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kabupaten </label>
                <div class="col-md-4 col-sm-9 col-xs-12">
                  <select name="kab" class="jschosen form-control" id="kabupaten">
                    <option value="">- Pilih Kabupaten -</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan </label>
                <div class="col-md-4 col-sm-9 col-xs-12">
                  <select name="id_kecamatan" class="jschosen form-control" id="kecamatan" required>
                    <option value="">- Pilih Kecamatan -</option>
                    <?php if ($detail1->id_kecamatan_tempat_tinggal != null): ?>
                      <option value="<?= $detail1->id_kecamatan_tempat_tinggal?>" selected><?= $detail1->nama_kecamatan?></option>
                    <?php endif; ?>
                  </select>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-default" type="button">Kembali</button>
                  <button type="submit" class="btn btn-success">Tambah Kelompok Baru</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Foto Nasabah </h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <div class="form-group">
              <input type="hidden" id="gambar">
              <div class="col-md-9 col-sm-9 col-xs-12"><img src="<?= base_url()?>asset/white.jpg" alt="" id="set_gambar"  height="200" width="150"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
