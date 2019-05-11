<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form 2 - Upload Dokumen Utama</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <?php foreach ($cetak_form1 as $detail1): ?>
            <form  class="form-horizontal form-label-left" action="<?= base_url('New_nasabah/form1add1') ?>" enctype="multipart/form-data" method="post">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">KTP Nasabah
                </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <input type="file" name="ktp"  class="form-control col-md-7 col-xs-12" accept=".jpg" id="checkext" onchange="ValidateSize(this)" required>
                </div>
                <?php if ($detail1->file_attach_ktp_istri == "" || $detail1->file_attach_ktp_istri == NULL): ?>
                  <div class="col-md-1 col-sm-6 col-xs-12">
                    <button type="submit" class="form-control btn btn-primary">  Upload </button>
                  </div>
                <?php else: ?>
                  <div class="col-md-2 ">
                    <button type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#ktp">  Lihat </button>
                  </div>
                  <div class="col-md-2 ">
                    <button type="submit" class="form-control btn btn-warning">  Update </button>
                  </div>
                <?php endif; ?>

              </div>
            </form>
              <form  class="form-horizontal form-label-left" action="<?= base_url('New_nasabah/form1add2') ?>" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">KTP Suami
                </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <input type="file" class="form-control col-md-7 col-xs-12" name="ktp2" accept=".jpg" id="checkext2" onchange="ValidateSize2(this)" required>
                </div>
                <?php if ($detail1->file_attach_ktp_suami == "" || $detail1->file_attach_ktp_suami == NULL): ?>
                  <div class="col-md-1 col-sm-6 col-xs-12">
                    <button type="submit" class="form-control btn btn-primary">  Upload </button>
                  </div>
                <?php else: ?>
                  <div class="col-md-2 ">
                    <button type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#ktp2" >  Lihat </button>
                  </div>
                  <div class="col-md-2 ">
                    <button type="submit" class="form-control btn btn-warning">  Update </button>
                  </div>
                <?php endif; ?>
              </div>
              </form>
              <form  class="form-horizontal form-label-left" action="<?= base_url('New_nasabah/form1add3') ?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kartu Keluarga</label>
                  <div class="col-md-5 col-sm-6 col-xs-12">
                    <input type="file" class="form-control col-md-7 col-xs-12"  name="kk" accept=".jpg" id="checkext3" onchange="ValidateSize3(this)" required>
                  </div>
                  <?php if ($detail1->file_attach_kartu_keluarga == "" || $detail1->file_attach_kartu_keluarga == NULL): ?>
                    <div class="col-md-1 col-sm-6 col-xs-12">
                      <button type="submit" class="form-control btn btn-primary">  Upload </button>
                    </div>
                  <?php else: ?>
                    <div class="col-md-2 ">
                      <button type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#kk">  Lihat </button>
                    </div>
                    <div class="col-md-2 ">
                      <button type="submit" class="form-control btn btn-warning">  Update </button>
                    </div>
                  <?php endif; ?>
                </div>
              </form>
              <form  class="form-horizontal form-label-left" action="<?= base_url('New_nasabah/form1add4') ?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Surat Pernyataan</label>
                  <div class="col-md-5 col-sm-6 col-xs-12">
                    <input type="file" class="form-control col-md-7 col-xs-12"  name="sp" accept=".pdf" required>
                     Dowload Surat Pernyataan <a href="<?= base_url('New_nasabah/download_sk') ?>" style="color:blue"> di sini! </a>
                  </div>
                  <?php if ($detail1->file_attach_perjanjian == "" || $detail1->file_attach_perjanjian == NULL): ?>
                    <div class="col-md-1 col-sm-6 col-xs-12">
                      <button type="submit" class="form-control btn btn-primary">  Upload </button>
                    </div>
                  <?php else: ?>
                    <div class="col-md-2 ">
                      <a class="form-control btn btn-success" href="<?= base_url('asset/SURAT_PERJANJIAN/'.$detail1->file_attach_perjanjian) ?>">  Lihat </a>
                    </div>
                    <div class="col-md-2 ">
                      <button type="submit" class="form-control btn btn-warning">  Update </button>
                    </div>
                  <?php endif; ?>
                </div>
              </form>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?= base_url('New_nasabah')?>" class="btn btn-default">Kembali</a>
                </div>
              </div>

          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>


<div class="modal fade" id="ktp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">KTP </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url()?>asset/KTP/<?= $ai_anggota?>.jpg?rand=<?php echo rand(); ?>" height="400" width="500">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ktp2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">KTP Suami </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url()?>asset/KTP2/<?= $ai_anggota?>.jpg?rand=<?php echo rand(); ?>" height="400" width="500">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="kk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">KK </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url()?>asset/KK/<?= $ai_anggota?>.jpg?rand=<?php echo rand(); ?>" height="400" width="500">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
