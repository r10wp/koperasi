<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-7 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form 1 - Data Akun dan Verifikasi</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <?php foreach ($cetak_detail1 as $detail1): ?>
            <form class="form-horizontal form-label-left input_mask" method="post" action="<?= base_url('New_nasabah/form2')?>" enctype="multipart/form-data">
              <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" name="nama_pendek" class="form-control has-feedback-left"
                <?php if ($detail1->nama_pendek == NULL ): ?>
                  placeholder="Nama Pendek"
                <?php else: ?>
                  value="<?= $detail1->nama_pendek?>"
                <?php endif; ?>
                placeholder="Nama Pendek"
                maxlength="8" required>
                <span class="fa fa-female form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-7 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" placeholder="<?= $detail1->nomor_anggota?>" readonly>
                <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
              </div>

              <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" name="nama_lengkap" class="form-control has-feedback-left"
                <?php if ($detail1->nama_lengkap == NULL ): ?>
                  placeholder="Nama Lengkap"
                <?php else: ?>
                  value="<?= $detail1->nama_lengkap?>"
                <?php endif; ?>
                 placeholder="Nama Lengkap"
                 required>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="email" name="email" class="form-control has-feedback-left"
                <?php if ($detail1->email == NULL ): ?>
                  placeholder="E-Mail"
                <?php else: ?>
                  value="<?= $detail1->email?>"
                <?php endif; ?>
                placeholder="E-Mail">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" name="telp_rumah" class="form-control"
                <?php if ($detail1->telp_rumah == NULL ): ?>
                  placeholder="Telephone Rumah"
                <?php else: ?>
                  value="<?= $detail1->telp_rumah?>"
                <?php endif; ?>
                 placeholder="Telephone Rumah">
                <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" name="no_hp1" class="form-control has-feedback-left" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                <?php if ($detail1->no_hp1 == NULL ): ?>
                  placeholder="Nomor Handphone / WA"
                <?php else: ?>
                  value="<?= $detail1->no_hp1?>"
                <?php endif; ?>
                placeholder="Nomor Handphone / WA">
                <span class="fa fa-phone-square form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" name="no_hp2" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                <?php if ($detail1->no_hp2 == NULL ): ?>
                  placeholder="Nomor Handphone 2"
                <?php else: ?>
                  value="<?= $detail1->no_hp2?>"
                <?php endif; ?>
                 placeholder="Nomor Handphone 2">
                <span class="fa fa-phone-square form-control-feedback right" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"
                <?php if ($detail1->no_ktp == NULL ): ?>
                  placeholder="Nomor KTP"
                <?php else: ?>
                  value="<?= $detail1->no_ktp?> (KTP)" readonly
                <?php endif; ?>
                 placeholder="Nomor KTP">
                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="input" name="no_sim" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                <?php if ($detail1->no_sim == NULL ): ?>
                  placeholder="Nomor SIM (A/B/C)"
                <?php else: ?>
                  value="<?= $detail1->no_sim?>"
                <?php endif; ?>
                placeholder="Nomor SIM (A/B/C)">
                <span class="fa fa-car form-control-feedback right" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" name="gelar" class="form-control has-feedback-left"
                <?php if ($detail1->gelar == NULL ): ?>
                  placeholder="Gelar Pendidikan"
                <?php else: ?>
                  value="<?= $detail1->gelar ?>"
                <?php endif; ?>
                placeholder="Gelar Pendidikan">
                <span class="fa fa-graduation-cap form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <!-- <input type="text" name="pendidikan" class="form-control"
                <?php if ($detail1->pendidikan_terakhir == NULL ): ?>
                  placeholder="Pendidikan Terakhir"
                <?php else: ?>
                  value="<?= $detail1->pendidikan_terakhir?>"
                <?php endif; ?>
                placeholder="Pendidikan Terakhir"> -->
                <?php if ($detail1->pendidikan_terakhir == NULL ): ?>
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
                <?php else: ?>
                  <select class="form-control" name="pendidikan">
                    <option value="Tidak Sekolah" <?php if($detail1->pendidikan_terakhir == "Tidak Sekolah") : echo "selected"; endif?> > Tidak Sekolah </option>
                    <option value="SD / MI / Setara" <?php if($detail1->pendidikan_terakhir == "SD / MI / Setara") : echo "selected"; endif?>> SD / MI / Setara</option>
                    <option value="SMP / MA / Setara" <?php if($detail1->pendidikan_terakhir == "SMP / MA / Setara") : echo "selected"; endif?> > SMP / MA / Setara</option>
                    <option value="SMA / SMK / MTS / Setara" <?php if($detail1->pendidikan_terakhir == "SMA / SMK / MTS / Setara"): echo "selected"; endif?> > SMA / SMK / MTS / Setara</option>
                    <option value="D1" <?php if($detail1->pendidikan_terakhir == "D1"): echo "selected"; endif?>> D1</option>
                    <option value="D2" <?php if($detail1->pendidikan_terakhir == "D2"): echo "selected"; endif?>> D2 </option>
                    <option value="D3" <?php if($detail1->pendidikan_terakhir == "D3"): echo "selected"; endif?>> D3 </option>
                    <option value="D4" <?php if($detail1->pendidikan_terakhir == "D4"): echo "selected"; endif?>> D4 </option>
                    <option value="S1" <?php if($detail1->pendidikan_terakhir == "S1"): echo "selected"; endif?>> S1</option>
                    <option value="S2" <?php if($detail1->pendidikan_terakhir == "S2"): echo "selected"; endif?>> S2 </option>
                    <option value="S3" <?php if($detail1->pendidikan_terakhir == "S3"): echo "selected"; endif?>> S3 </option>
                  </select>
                <?php endif; ?>

                <span class="fa fa-university form-control-feedback right" aria-hidden="true" style="margin-right:10px"></span>
              </div>

          </div>
        </div>



        <div class="x_panel">
          <div class="x_title">
            <h2>Form 1 - Tempat Tanggal Lahir</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <label for="fullname">Kota :</label><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select class="jschosen form-control" name="kota_lahir" style="width:400px">

              <option value="">Choose..</option>
              <?php foreach ($cetak_form2 as $tmpt_lahir): ?>
                <?php if ($tmpt_lahir->id == $detail1->id_kota_lahir): ?>
                  <option value="<?= $detail1->id_kota_lahir?>" selected><?= $tmpt_lahir->nama?></option>
                <?php else: ?>
                  <option value="<?= $tmpt_lahir->id?>"><?= $tmpt_lahir->nama?></option>
                <?php endif; ?>
              <?php endforeach; ?>

            </select>
            <br><br>
            <label for="fullname">Tanggal :</label><br><br>
            <div class="example">
              <?php if ($detail1->tgl_lahir == NULL ): ?>
                <input type="hidden" id="datedrop">
                <input type="hidden" id="bindingtanggal" name="tgl_lahir">
              <?php else: ?>
                <input type="hidden" id="datedrop" value="<?= $detail1->tgl_lahir?>">
                <input type="hidden" id="bindingtanggal" name="tgl_lahir" value="<?= $detail1->tgl_lahir?>">
              <?php endif; ?>

            </div>
          </div>

      </div>


      </div>


      <div class="col-md-5 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form 1 - Pas Foto Diri</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <div class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                <?php if ($detail1->gambar == null): ?>

                  <div class="col-md-9 col-sm-9 col-xs-12"><img src="<?= base_url()?>asset/white.jpg" alt="" id="output" height="200" width="150"></div>
                  <br><br><br><br><br><br><br><br><br><br><br>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="file" name="gambar" class="form-control" accept=".jpg" id="checkext4" onchange="ValidateSizePreview(this)" required/>
                  </div>
                <?php else: ?>
                  <div class="col-md-9 col-sm-9 col-xs-12"><img src="<?= base_url()?>asset/ANGGOTA/<?= $detail1->gambar ?>?rand=<?php echo rand(); ?>" alt="" id="output" height="200" width="150"></div>
                  <br><br><br><br><br><br><br><br><br><br><br>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="file" name="gambar" class="form-control" accept=".jpg" id="checkext4" onchange="ValidateSizePreview(this)"/>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-5 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form 1 - Alamat Tempat Tinggal</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <div class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <?php if ($detail1->id_kecamatan_tempat_tinggal != null): ?>
                    <select name="provinsi" id="provinsi" class="jschosen form-control">
                      <option>- Pilih Ulang Provinsi -</option>
                      <?php foreach($cetak_form1 as $prov){ ?>
                        <?php if ($prov->id == $detail->id_provinsi): ?>
                          <option value="<?= $prov->id?>" selected><?=$prov->nama?></option>';
                        <?php else: ?>
                          <option value="<?= $prov->id?>"><?=$prov->nama?></option>';
                        <?php endif; ?>
                      <?php } ?>
                    </select>
                  <?php else: ?>
                    <select name="provinsi" id="provinsi" class="jschosen form-control">
                      <option>- Pilih Provinsi -</option>
                      <?php foreach($cetak_form1 as $prov){ ?>
                        <?php if ($prov->id == $detail->id_provinsi): ?>
                          <option value="<?= $prov->id?>" selected><?=$prov->nama?></option>';
                        <?php else: ?>
                          <option value="<?= $prov->id?>"><?=$prov->nama?></option>';
                        <?php endif; ?>
                      <?php } ?>
                    </select>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kabupaten </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select name="kab" class="jschosen form-control" id="kabupaten">
                    <?php if ($detail1->id_kecamatan_tempat_tinggal != null): ?>
                      <option value="">- Pilih Ulang Kabupaten -</option>
                    <?php else: ?>
                      <option value="">- Pilih Kabupaten -</option>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select name="kec" class="jschosen form-control" id="kecamatan" required>
                    <option value="">- Pilih Kecamatan -</option>
                    <?php if ($detail1->id_kecamatan_tempat_tinggal != null): ?>
                      <option value="<?= $detail1->id_kecamatan_tempat_tinggal?>" selected><?= $detail1->nama_kecamatan?></option>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Tempat Tinggal
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <textarea required class="form-control" rows="3" name="alamat"><?php if ($detail1->alamat_lengkap != NULL ){ echo $detail1->alamat_lengkap; }; ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-sm-12 text-center ">
          <a href="<?= base_url('New_nasabah')?>" class="btn btn-default">Kembali</a>
          <button type="submit" class="btn btn-primary btn-lg">Simpan Semua Data Isian Form 1</button>
        </div><br><br><br>
      </div>
    </form>
    <?php endforeach; ?>
    </div>

  </div>
</div>
