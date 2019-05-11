<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Pekerjaan Pribadi (Istri / Saudari)</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <?php foreach ($cetak_detail1 as $detail1): ?>

            <form class="form-horizontal form-label-left input_mask" method="post" action="<?= base_url('New_nasabah/form4')?>">
              <?php if ($check_jumlah_pekerjaan_anggota != 0): ?>
                <?php $no=1; foreach ($cetak_detail_pekerjaan_anggota as $pekerjaan_anggota): ?>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan <?=$no++?></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="pekerjaan[]">
                          <?php foreach ($pekerjaan as $kerja): ?>
                            <?php if ($pekerjaan_anggota->id_pekerjaan == $kerja->id_pekerjaan): ?>
                              <option value="<?=$kerja->id_pekerjaan?>" selected><?= $kerja->nama_pekerjaan?></option>
                            <?php else: ?>
                              <option value="<?=$kerja->id_pekerjaan?>"><?= $kerja->nama_pekerjaan?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                        <?php if ($no == 3): ?>
                          <span>Jika tidak ada silahkan pilih opsi tidak bekerja</span>
                        <?php endif; ?>
                      </div>
                    </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan 1</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pekerjaan[]" required>
                      <option value="">-- Belum memilih pekerjaan --</option>
                      <?php foreach ($pekerjaan as $kerja): ?>
                        <option value="<?=$kerja->id_pekerjaan?>"><?= $kerja->nama_pekerjaan?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan 2</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pekerjaan[]" required>
                      <option value="">-- Belum memilih pekerjaan --</option>
                      <?php foreach ($pekerjaan as $kerja): ?>
                        <option value="<?=$kerja->id_pekerjaan?>"><?= $kerja->nama_pekerjaan?></option>
                      <?php endforeach; ?>
                    </select>
                    <span>Jika tidak ada silahkan pilih opsi tidak bekerja</span>
                  </div>
                </div>
              <?php endif; ?>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Penghasilan Per Bulan (Rp)</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="penghasilan_per_bulan" class="form-control" id="rupiah"
                  <?php if ($detail1->penghasilan_per_bulan == NULL ): ?>
                    placeholder="Rp. 0 ,00"
                  <?php else: ?>
                    value="<?= rupiahform($detail1->penghasilan_per_bulan)?>"
                  <?php endif; ?>/>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="form-horizontal col-md-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Pekerjaan Suami</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
              <?php if ($check_jumlah_pekerjaan_suami != 0): ?>
                <?php $no=1; foreach ($cetak_detail_pekerjaan_suami as $pekerjaan_suami): ?>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan <?=$no++?></label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="pekerjaan_suami[]">
                          <?php foreach ($pekerjaan as $kerja): ?>
                            <?php if ($pekerjaan_suami->id_pekerjaan == $kerja->id_pekerjaan): ?>
                              <option value="<?=$kerja->id_pekerjaan?>" selected><?= $kerja->nama_pekerjaan?></option>
                            <?php else: ?>
                              <option value="<?=$kerja->id_pekerjaan?>"><?= $kerja->nama_pekerjaan?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                        <?php if ($no == 3): ?>
                          <span>Jika tidak ada silahkan pilih opsi tidak bekerja</span>
                        <?php endif; ?>
                      </div>
                    </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan 1</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pekerjaan_suami[]" required>
                      <option value="">-- Belum memilih pekerjaan --</option>
                      <?php foreach ($pekerjaan as $kerja): ?>
                        <option value="<?=$kerja->id_pekerjaan?>"><?= $kerja->nama_pekerjaan?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan 2</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pekerjaan_suami[]" required>
                      <option value="">-- Belum memilih pekerjaan --</option>
                      <?php foreach ($pekerjaan as $kerja): ?>
                        <option value="<?=$kerja->id_pekerjaan?>"><?= $kerja->nama_pekerjaan?></option>
                      <?php endforeach; ?>
                    </select>
                    <span>Jika tidak ada silahkan pilih opsi tidak bekerja</span>
                  </div>
                </div>
              <?php endif; ?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Suami</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="nama_suami" class="form-control"
                  <?php if ($detail1->nama_suami == NULL ): ?>
                    placeholder="-"
                  <?php else: ?>
                    value="<?= $detail1->nama_suami?>"
                  <?php endif; ?>
                  >
                </div>
              </div>




              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Penghasilan Per Bulan (Rp)</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="penghasilan_per_bulan_suami" id="rupiah2" class="form-control"
                  <?php if ($detail1->penghasilan_per_bulan_suami == NULL ): ?>
                    placeholder="Rp. 0 ,00"
                  <?php else: ?>
                    value="<?= rupiahform($detail1->penghasilan_per_bulan_suami)?>"
                  <?php endif; ?>
                  >
                </div>
              </div>
          </div>
        </div>

      </div>
      <div class="form-horizontal col-md-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Usaha Pribadi (Jika Memiliki)</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Usaha</label>
                <div class="col-md-3 col-sm-9 col-xs-12">
                  <input type="text" name="jenis_usaha" class="form-control"
                  <?php if ($detail1->jenis_usaha == NULL ): ?>
                    placeholder="-"
                  <?php else: ?>
                    value="<?= $detail1->jenis_usaha?>"
                  <?php endif; ?>
                  >
                </div>Cohtoh : Kuliner / Retail / Peracangan / Jasa / Lain - lain
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Modal Sendiri (Rp)</label>
                <div class="col-md-3 col-sm-9 col-xs-12">
                  <input type="text" name="modal_sendiri" class="form-control" id="rupiah3"
                  <?php if ($detail1->modal_sendiri == NULL ): ?>
                    placeholder="Rp. 0 ,00"
                  <?php else: ?>
                    value="<?= rupiahform($detail1->modal_sendiri)?>"
                  <?php endif; ?>
                  >
                </div> Jumlah Modal yang di keluarkan sendiri
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Modal Luar (Rp)</label>
                <div class="col-md-3 col-sm-9 col-xs-12">
                  <input type="text" name="modal_luar" class="form-control" id="rupiah4"
                  <?php if ($detail1->modal_luar == NULL ): ?>
                    placeholder="Rp. 0 ,00"
                  <?php else: ?>
                    value="<?= rupiahform($detail1->modal_luar)?>"
                  <?php endif; ?>
                  >
                </div> Pinjaman / Kredit / Lain-lain
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Omset Per Bulan (Rp)</label>
                <div class="col-md-3 col-sm-9 col-xs-12">
                  <input type="text" name="omset_per_bulan" class="form-control" id="rupiah5"
                  <?php if ($detail1->omset_per_bulan == NULL ): ?>
                    placeholder="Rp. 0 ,00"
                  <?php else: ?>
                    value="<?= rupiahform($detail1->omset_per_bulan)?>"
                  <?php endif; ?>
                  >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Tenaga Kerja</label>
                <div class="col-md-1 col-sm-9 col-xs-12">
                  <input type="number" name="jumlah_tenaga_kerja" class="form-control"
                  <?php if ($detail1->jumlah_tenaga_kerja == NULL ): ?>
                    placeholder="-"
                  <?php else: ?>
                    value="<?= $detail1->jumlah_tenaga_kerja?>"
                  <?php endif; ?>
                  >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Usaha</label>
                <div class="col-md-2 col-sm-9 col-xs-12">
                  <select class="form-control" name="tempat_usaha">
                    <?php if ($detail1->tempat_usaha == NULL ): ?>
                      <option value="0">Milik Sendiri</option>
                      <option value="1">Sewa</option>
                    <?php elseif($detail1->tempat_usaha == 0): ?>
                      <option value="0" selected>Milik Sendiri</option>
                      <option value="1">Sewa</option>
                    <?php else: ?>
                      <option value="0">Milik Sendiri</option>
                      <option value="1" selected>Sewa</option>
                    <?php endif; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Tempat Usaha</label>
                <div class="col-md-2 col-sm-9 col-xs-12">
                  <textarea rows="3" style="width:400px" class="form-control" name="alamat_usaha"><?php if ($detail1->alamat_usaha != NULL ): ?><?= $detail1->alamat_usaha?> <?php endif; ?></textarea>
                </div>
              </div>


              <div class="ln_solid"></div>

              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('New_nasabah')?>" class="btn btn-default">Kembali</a>
                  <button type="submit" class="btn btn-primary">Simpan Data Form 4</button>
                </div>
              </div>

            </form>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
