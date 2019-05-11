<?php
  $data = [];
  $no = 1;
  foreach ($cetak_form3 as $form3) {
    $data[$no]= $form3->isi;
    $no++;
  }
?>
<div class="right_col" role="main">
  <div class="">
     <div class="page-title">
      <div class="title_left">
        <h3>Formulir Setoran Wajib Bulan <strong>  </strong></h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <div class="x_panel">
          <?php if($cetak_count1 == 0):?>
            <div class="x_title">
              <h2>Anda Belum Memiliki Tagihan Setoran Wajib Bulan <strong> <?= date('F')?> </strong></h2>
              <div class="clearfix"></div>
            </div>
          <?php elseif($cetak_count1 == 1): ?>

          <?php foreach ($cetak_detail1 as $detail1): ?>

            <div class="x_content">
            <br />

            <form class="form-horizontal form-label-left input_mask" method="post" action="<?=  base_url('Nasabah/bayarSetoranWajib')?>" enctype="multipart/form-data">
              <?php if ($detail1->status_simpan != 1): ?>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-3 col-xs-12">No. Anggota Koperasi</label>
                  <div class="col-md-7 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" value="<?= $detail1->nomor_anggota?>" readonly>
                    <input type="hidden" name="kode_simpan" class="form-control" value="<?= $detail1->kode_simpan?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-3 col-xs-12">Nama Nasabah</label>
                  <div class="col-md-7 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" value="<?= $detail1->nama?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-3 col-xs-12">Rekening Penyetor </label>
                  <div class="col-md-7 ">
                    <select class="form-control" name="rek_pengguna" required>
                      <option value="" style="text-align: right;">-- Pilih Rekening Bank --</option>
                      <?php foreach ($cetak_form1 as $rekening): ?>
                        <option value="<?= $rekening->id?>">
                          <?= $rekening->no_rekening_nasabah?>
                          <?php $a = strlen($rekening->no_rekening_nasabah);
                                $x = 15 - $a;
                                $y = 15 - $a;
                                echo str_repeat("&nbsp;", $x+$y);?>
                          - <?= $rekening->nama_bank?> -
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-4 col-xs-12">Pilih Bank Tujuan Transfer</label>
                  <div class="col-md-7 col-sm-9 col-xs-12">
                    <select class="form-control" id="set_bank" name="rek_id" required>
                      <option value="">Pilih Bank</option>
                      <?php foreach ($cetak_form2 as $set_rekening) { ?>
                        <option value="<?= $set_rekening->id?>" data-no-rek="<?= $set_rekening->no_rekening?>" data-na-rek="<?= $set_rekening->nama_pemilik_rekening?>" data-na-ba="<?= $set_rekening->nama_bank?>"><?= $set_rekening->nama_bank?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-4 col-xs-12">No. Rekening Tujuan</label>
                  <div class="col-md-7 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" id="no_rek" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-3 col-xs-12">Nama Rekening Tujuan</label>
                  <div class="col-md-7 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" id="na_rek" readonly/>
                  </div>
                </div>
              <?php else: ?>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Rekening Penyetor </label>
                  <div class="col-md-8 ">
                    <input type="text" class="form-control" value="<?= $detail1->no_rekening_nasabah ?>" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Bank Penyetor </label>
                  <div class="col-md-8 ">
                      <input type="text" class="form-control" value="<?= $detail1->nama_bank_nasabah ?>" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Rekening Penyetor </label>
                  <div class="col-md-8 ">
                      <input type="text" class="form-control" value="<?= $detail1->nama_pemilik_dalam_rekening ?>" readonly/>
                  </div>
                </div>

                <div class="ln_solid"></div>

                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Bank Tujuan</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" value="<?= $detail1->no_rekening ?>" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">No. Rekening Tujuan</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" value="<?= $detail1->nama_bank_koperasi ?>" readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Pemilik</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" value="<?= $detail1->nama_pemilik_rekening ?>" readonly/>
                  </div>
                </div>
              <?php endif; ?>


          </div>
        </div>

        <div class="x_panel">
          <div class="x_title">
            <h2>Catatan</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <h4>Transfer</h4>
              Harus Menggunakan Rekening Yang Tertera
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Setoran Wajib</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <div class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Jenis Simpanan</label>
                <div class="col-md-3 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="Wajib" readonly/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Tagihan </label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" class="form-control"  value="<?= date("d F Y , h:i:s", strtotime($detail1->tgl_wajib_setor)) ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Jatuh Tempo </label>
                <div class="col-md-8 col-sm-9 col-xs-12">
                  <input type="text" class="form-control"  value="<?= date("d F Y , h:i:s", strtotime($detail1->tgl_jatuh_tempo_bayar)) ?>" readonly>
                </div>
              </div>

              <?php if ($detail1->tgl_jatuh_tempo_bayar > date('Y-m-d H:i:s') && $detail1->status_simpan != 1): ?>
                <?php if ($detail1->status_simpan == -1): ?>
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Keterangan</label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                      <button type="button" class="form-control btn btn-warning" data-toggle="modal" data-target="#bukti_upload">  Lihat </button>
                      <hr>
                      <font color="orange">Proses Verifikasi Sedang dilakukan. Silahkan Hubungi Pihak Koperasi Jika dalam 3x24 jam Belum Di verifikasi</font>
                    </div>
                  </div>
                <?php else: ?>
                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Total Setoran (Rp)</label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                      <input type="text" id="rupiah" class="form-control" name="jumlah_setor" required/>
                      <input type="hidden" name="min_setor" value="<?= $data[8]?>">
                      <span>Minimal pembayaran setoran wajib <?= rupiahform($data[8])?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Upload Bukti Setoran</label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                      <input type="file" name="bs" class="form-control" accept=".jpg" id="checkext" onchange="ValidateSize(this)" required/>
                    </div>
                  </div>
                <?php endif; ?>

              <?php elseif($detail1->tgl_jatuh_tempo_bayar < date('Y-m-d H:i:s') && $detail1->status_simpan == -2): ?>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Keterangan</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                    <font color="red">Mohon Maaf. Anda Tidak Bisa melakukan setor karena sudah lewat dari tanggal jatuh tempo. Hubungi Pihak Koperasi Untuk Informasi Lebih Lanjut.</font>
                  </div>
                </div>
              <?php elseif($detail1->status_simpan == -1): ?>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Keterangan</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                    <button type="button" class="form-control btn btn-warning" data-toggle="modal" data-target="#bukti_upload">  Lihat </button>
                    <hr>
                    <font color="orange">Proses Verifikasi Sedang dilakukan. Silahkan Hubungi Pihak Koperasi Jika dalam 3x24 jam Belum Di verifikasi</font>
                  </div>
                </div>
              <?php elseif($detail1->status_simpan == 0): ?>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Keterangan</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                    <font color="red">Setoran Ditolak dengan alasan : <?= $detail1->keterangan_tolak_simpanan?></font>
                  </div>
                </div>
                <button type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#bukti_upload">  Lihat </button>
              <?php elseif($detail1->status_simpan == 1): ?>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Keterangan</label>
                  <div class="col-md-8 col-sm-9 col-xs-12">
                    <font color="blue">Sukses. Setoran Wajib Sudah Diterima Pihak Koperasi</font>
                    <hr>
                    <button type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#bukti_upload">  Lihat </button>
                  </div>
                </div>
              <?php endif; ?>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('Nasabah/listSimpanan')?>" class="btn btn-default">Kembali</a>
                  <?php if ($detail1->tgl_jatuh_tempo_bayar > date('Y-m-d H:i:s')): ?>
                    <?php if ($detail1->status_simpan == -2): ?>
                      <button type="submit" class="btn btn-primary">Kirim Bukti Setor</button>
                    <?php endif; ?>
                    <?php if ($detail1->status_simpan == 0): ?>
                      <button type="submit" class="btn btn-info">Kirim Ulang Bukti Setor</button>
                      <br><br><font color="red">Setoran Pernah Ditolak</font>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            </form>

            <?php $gambar1 = $detail1->file_attach_bukti_simpan?>
            <?php endforeach; ?>
                 <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="bukti_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bukti Setoran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url()?>asset/BUKTI_SIMPANAN/<?= $gambar1?>?rand=<?php echo rand(); ?>" height="300" width="400">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
