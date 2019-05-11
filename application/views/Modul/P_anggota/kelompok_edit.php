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
            <?php foreach ($cetak_detail2 as $detail2): ?>


            <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('P_anggota/kelompokEdit/'.$prim_kode)?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Kelompok Terbentuk
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_kelompok" value="<?= halfNoTime($detail2->tgl_berdiri)?>" readonly class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Kelompok
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_kelompok" value="<?= $detail2->nama_kel?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ketua Kelompok Saat Ini
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail2->nama_lengkap?>" readonly class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cari Ketua Baru  </label>
                <div class="col-md-4 col-sm-9 col-xs-12">
                  <select class="jschosen form-control" id="set_cari_anggota2" name="id_ketua" style="width:400px">
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
                  <textarea type="text" name="deskripsi" class="form-control col-md-7 col-xs-12" rows="8"><?= $detail2->deskripsi_kelompok?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                <div class="col-md-5 col-sm-9 col-xs-12">
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
                <div class="col-md-5 col-sm-9 col-xs-12">
                  <select name="kab" class="jschosen form-control" id="kabupaten">
                    <option value="">- Pilih Kabupaten -</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan </label>
                <div class="col-md-5 col-sm-9 col-xs-12">
                  <select name="id_kecamatan" class="jschosen form-control" id="kecamatan">
                    <option value="">- Pilih Kecamatan -</option>
                  </select>
                  <span> Kecamatan saat ini : <?= $detail2->nama?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Kelompok </label>
                <div class="col-md-5 col-sm-9 col-xs-12">
                  <select name="id_kecamatan" class="form-control" id="kecamatan">
                    <option value=""> AKTIF </option>
                    <option value=""> NON-AKITF</option>
                  </select>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-default" type="button">Kembali</button>
                  <button type="submit" class="btn btn-primary  ">Edit Data Kelompok</button>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Foto Ketua Saat Ini </h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12"><img src="<?= base_url()?>asset/ANGGOTA/<?= $detail2->gambar?>" alt=""  height="200" width="150"></div>
            </div>
          </div>
        </div>
        <div class="x_panel">
          <div class="x_title">
            <h2>Foto Ketua Pengganti </h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="form-group">
              <input type="hidden" id="gambar">
              <div class="col-md-9 col-sm-9 col-xs-12"><img src="<?= base_url()?>asset/white.jpg" alt="" id="set_gambar2"  height="200" width="150"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
