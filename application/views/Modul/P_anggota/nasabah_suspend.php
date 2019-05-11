<div class="right_col" role="main">
    <div class="clearfix"></div>

    <?php foreach ($cetak_detail1 as $detail1): ?>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Verifikasi Berkas Calon Nasabah</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('P_anggota/suspend/')?><?= $detail1->id?>">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alasan Blokir
                  </label>
                  <div class="col-md-7 col-sm-6 col-xs-12">
                    <textarea class="form-control" name="pesan_blokir" rows="3"></textarea>
                  </div>
                </div>
      

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Data Nasabah
                </label>

                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nomor_anggota?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->nama?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <a target="_blank" href="<?= base_url('Nasabah/detail/'.$prim_kode)?>" class="btn btn-success"> Lihat Detail Nasabah </a>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor Handphone Anggota
                </label>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <input type="text" value="<?= $detail1->no_hp1?>" class="form-control col-md-7 col-xs-12" name="no_hp1" readonly>
                </div>
              </div>
                  
              <br>
              <div class="ln_solid"></div>




              <div class="form-group" id="ifNo" style="display:none">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Tolak
                </label>
                <div class="col-md-7 col-sm-6 col-xs-12">
                  <textarea id="ket_tolak_nasabah" rows="3" name="keterangan_tolak" class="form-control"></textarea>
                </div>
              </div>

              <div class="form-group" >
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-danger">Blokir Nasabah</button>
                </div>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>


    <?php endforeach; ?>



</div>
