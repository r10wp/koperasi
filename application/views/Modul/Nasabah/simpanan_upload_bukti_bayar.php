<div class="right_col" role="main">
  <div class="clearfix"></div>
  <?php foreach ($cetak_detail1 as $detail1): ?>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Upload Bukti Transfer</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" action="<?= base_url('Nasabah/upload_setoran/'.$detail1->kode_simpan) ?>" enctype="multipart/form-data" method="post">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Simpanan</label>
                <div class="col-md-2 col-sm-9 col-xs-12">
                  <?php if ($detail1->jenis_simpanan == 2): ?>
                    <input type="text" class="form-control" value="Wajib"  readonly/>
                  <?php else: ?>
                    <input type="text" class="form-control" value="Sukarela"  readonly/>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Setoran (Rp)</label>
                <div class="col-md-3 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" value="<?= rupiahset($detail1->total_setoran)?>"  readonly/>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Terbilang</label>
                <div class="col-md-5 col-sm-9 col-xs-12">
                  <textarea class="form-control" readonly><?= terbilang($detail1->total_setoran)?> Rupiah</textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Jatuh Tempo</label>
                <div class="col-md-5 col-sm-9 col-xs-12">
                  <input class="form-control" readonly value="<?= date("d F Y , h:i:s", strtotime($detail1->tgl_jatuh_tempo_bayar))?>"></input>
                  <?php if ($detail1->status_simpan  == -2): ?>
                    <font color="red">Upload Bukti Setoran Sebelum Tanggal Diatas..!</font>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Upload Bukti Transfer Simpanan
                </label>
                <?php if ($detail1->status_simpan  == -2): ?>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <input type="file" name="bs" class="form-control col-md-7 col-xs-12" accept=".jpg" id="checkext" onchange="ValidateSize(this)" required>
                </div>
                <?php elseif ($detail1->status_simpan  == -1): ?>
                  <div class="col-md-2 ">
                    <button type="button" class="form-control btn btn-warning" data-toggle="modal" data-target="#bukti_upload">  Lihat </button>
                  </div>
                  <font color="orange"><strong>Terimakasih.</strong> Sudah Melakukan Upload. <br>Permintaan Anda Sedang diproses Hubungi Pihak koperasi jika 3 x 24 Jam Belum Di Proses</font>
                <?php elseif ($detail1->status_simpan  == 0): ?>
                  <font color="red"><strong>Transaksi Ditolak..!</strong> Alasan : <?= $detail1->keterangan_tolak_simpanan?> <br>Hubungi pihak koperasi untuk di proses lebih lanjut.</font>
                <?php elseif ($detail1->status_simpan  == 1): ?>
                  <div class="col-md-2 ">
                    <button type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#bukti_upload">  Lihat </button>
                  </div>
                  <font color="blue"><strong>Transaksi Berhasil.</strong> <br> Dana sudah diterima koperasi Dharma Bhakti. <br></font>
                <?php endif; ?>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('Nasabah/listSimpanan')?>" class="btn btn-default">Kembali</a>
                  <?php if ($detail1->status_simpan  == -2): ?>
                    <button type="submit" class="btn btn-primary">Upload Bukti Setor</button>

                  <?php endif; ?>


                </div>
              </div>
            </form>
            <?php $gambar1 =$detail1->file_attach_bukti_simpan?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Rekening Penyetor</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <div class="form-group">
              <label class="control-label col-md-5 col-sm-3 col-xs-12">No Rekening</label>
              <div class="col-md-7 col-sm-9 col-xs-12">
                <input type="text" class="form-control" value="<?= $detail1->no_rekening_nasabah?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-5 col-sm-3 col-xs-12">Nama Pemilik Rekening</label>
              <div class="col-md-7 col-sm-9 col-xs-12">
                <input type="text" class="form-control" value="<?= $detail1->nama_pemilik_dalam_rekening?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-5 col-sm-3 col-xs-12">Nama Bank</label>
              <div class="col-md-7 col-sm-9 col-xs-12">
                <input type="text" class="form-control" value="<?= $detail1->nama_bank_nasabah?>" readonly>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Rekening Tujuan</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <div class="form-group">
              <label class="control-label col-md-5 col-sm-4 col-xs-12">No. Rekening Tujuan</label>
              <div class="col-md-7 col-sm-9 col-xs-12">
              <input type="text" class="form-control" value="<?= $detail1->no_rekening?>" readonly/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-5 col-sm-3 col-xs-12">Nama Rekening Tujuan</label>
              <div class="col-md-7 col-sm-9 col-xs-12">
              <input type="text" class="form-control" value="<?= $detail1->nama_pemilik_rekening?>"  readonly/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-5 col-sm-4 col-xs-12">Nama Bank</label>
              <div class="col-md-7 col-sm-9 col-xs-12">
                <input type="text" class="form-control" value="<?= $detail1->nama_bank_koperasi?>" readonly/>
              </div>
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
