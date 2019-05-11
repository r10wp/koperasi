<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Verifikasi Persetujuan Calon Anggota Kelompok</h2>
            <div class="clearfix"></div>
          </div>
          <?php foreach ($cetak_detail1 as $detail1): ?>
          <?php foreach ($cetak_detail2 as $detail2): ?>
            <div class="x_content">
              <br />
              <form  class="form-horizontal form-label-left" action="<?= base_url('Nasabah/terimaAnggota/'.$kode1."/".$kode2."/".$kode3) ?>" enctype="multipart/form-data" method="post">
                <div class="col-md-5 ">
                </div>
                <img src="<?= base_url('asset/ANGGOTA/')?><?= $detail1->gambar?>" alt="" style="width:120px;height:160px;">
                <hr>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Anggota</label>
                  <div class="col-md-4 ">
                    <input type="text" value="<?= $detail1->nama?>" readonly class="form-control col-md-7 col-xs-12" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">No Tlp WA / Alternatif / Tlp Rumah</label>
                  <div class="col-md-3 ">
                    <input type="text" value="<?= $detail1->no_hp1?>" readonly class="form-control " />
                  </div>
                  <div class="col-md-3 ">
                    <input type="text" value="<?= $detail1->no_hp2?>" readonly class="form-control " />
                  </div>
                  <div class="col-md-3 ">
                    <input type="text" value="<?= $detail1->telp_rumah?>" readonly class="form-control " />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Anggota</label>
                  <div class="col-md-4 ">
                    <textarea readonly class="form-control col-md-7 col-xs-12" ><?= $detail1->alamat_lengkap?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                  <div class="col-md-4 ">
                    <select class="form-control" name="status_terima" required>
                      <option value="" <?php if ($detail2->status_terima_dari_kelompok == -1){ echo "selected";} ?>>-- Pilih Status Persetujuan --</option>
                      <option value="1" <?php if ($detail2->status_terima_dari_kelompok == 1){ echo "selected";} ?>>Terima</option>
                      <option value="0" <?php if ($detail2->status_terima_dari_kelompok == 0){ echo "selected";} ?>>Tolak</option>
                    </select>
                  </div>
                  <!-- <div class="col-md-4 ">
                    <a href="<?= base_url('Nasabah/jadwalkan_pertemuan')?>" class="btn btn-info"> Jadwalkan Pertemuan</a>
                  </div> -->
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Upload Bukti Persetujuan Anggota
                  </label>
                  <div class="col-md-5 col-sm-6 col-xs-12">
                    <input type="file" name="bpk" class="form-control col-md-7 col-xs-12" accept=".pdf" id="checkpdf" onchange="ValidateSizePdf(this)" required>
                  </div>
                  <?php if ($detail2->status_terima_dari_kelompok == 1): ?>
                    <div class="col-md-2 ">
                      <a href=""class="form-control btn btn-success" target="_blank">  Lihat </button>
                    </div>
                  <?php elseif($detail2->status_terima_dari_kelompok == 0): ?>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <button type="submit" class="form-control btn btn-primary">  Upload Ulang</button>
                    </div>
                  <?php elseif($detail2->status_terima_dari_kelompok == -1): ?>
                    <div class="col-md-2 ">
                      <button type="submit" class="form-control btn btn-primary">  Submit Berkas </button>
                    </div>
                  <?php else: ?>

                  <?php endif; ?>
                </div>
              </form>

              <div class="ln_solid"></div>
                <?php if ($detail2->status_terima_dari_kelompok == 1): ?>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <span>Sudah Terdaftar Di Kelompok</span>
                    </div>
                  </div>
                <?php else: ?>

                <?php endif; ?>
              </div>

            <?php $berkas = $detail2->berkas_permintaan?>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>


  </div>
</div>

<div class="modal fade" id="bpk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bukti Setoran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url()?>asset/BUKTI_PERSETUJUAN_KELOMPOK/<?= $berkas?>?rand=<?php echo rand(); ?>" height="300" width="400">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
