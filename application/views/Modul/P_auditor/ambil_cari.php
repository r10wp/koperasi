<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Pencarian Penarikan Dana </h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('Pengurus/simpananCari')?>">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode / Nama Nasabah
                </label>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <select class="jschosen form-control" id="set_cari_anggota" style="width:400px">
                    <option value="">Cari Data ... </option>
                    <?php foreach ($cetak_form1 as $form1) { ?>
                      <option value="<?= $form1->id?>" data-no="<?= $form1->nomor_anggota?>" data-nama="<?= $form1->nama?>" data-gambar="<?= $form1->gambar?>"><?= $form1->nomor_anggota?> - <?= $form1->nama?></option>
                    <?php } ?>
                  </select>
                </div>

              </div>
              <!-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <img src="<?= base_url()?>asset/white.jpg" alt="" id="output" height="200" width="150">
                  </div>
              </div> -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                </label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="text" name="kode" id="no" readonly class="form-control col-md-7 col-xs-12">
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <input type="text" id="nama" readonly class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-xs-3" for="last-name">Tanggal Cari Transaksi</label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input class="form-control" type="text" name="rangedate2" value="<?= date("d/m/Y")?> - <?= date("d/m/Y", strtotime("+1 months"));?>" />
                </div>



              </div>



              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a class="btn btn-default" href="<?= base_url('Pengurus')?>">Kembali</a>
                  <a class="btn btn-warning" href="<?= base_url('Pengurus/simpananCari')?>" >Reset</a>
                  <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Cari</button>
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
    <?php if ($table == 1): ?>

      <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Hasil Pencarian Simpanan Periode : <small> <?= halfnoTime($tgl1) ." - ". halfnoTime($tgl2)?> </small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-hover" >
              <thead>
                <tr>
                  <th>No Anggota</th>
                  <th>Nama Anggota</th>
                  <th>Tanggal Simpan</th>
                  <th>Jenis Simpanan</th>
                  <th>Jumlah Setor</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($cetak_list1 as $list1): ?>
                  <tr>
                    <td width="10%"><?= $list1->nomor_anggota ?></td>
                    <td width="15%"><?= $list1->nama_anggota ?></td>
                    <td width="10%">

                        <?= cutForDate($list1->tgl_wajib_setor) ?>

                        <?= cutForDate($list1->tgl_lakukan_simpan) ?>

                    </td>
                    <td width="5%">
                      <?php if ($list1->jenis_simpanan == 1): ?>
                        Pokok
                      <?php elseif($list1->jenis_simpanan == 2): ?>
                        Wajib
                      <?php else: ?>
                        Sukarela
                      <?php endif; ?>
                    </td >
                    <td width="13%" align="right"><?= rupiahset($list1->total_setoran) ?></td>
                    <td>
                      <?php if ($list1->status_simpan == 1): ?>
                        <p style="color:blue"> Transaksi Sukses. </p> Diverifikasi Tanggal <?= $list1->tgl_verifikasi_simpanan ?>
                      <?php elseif($list1->status_simpan == 0): ?>
                         <p style="color:red"> Setoran Ditolak. </p>Alasan : <?= $list1->keterangan_tolak_simpanan ?>
                      <?php elseif($list1->status_simpan == -1): ?>
                        <p style="color:orange"> Menunggu Konfirmasi</p>
                      <?php elseif($list1->status_simpan == -2): ?>
                        Belum Upload Bukti Pembayaran / Setoran
                      <?php endif; ?>
                    </td>
                    <td width="15%">
                      <?php if ($list1->status_simpan == 1): ?>
                        <a href="<?= base_url('Pengurus/aksiSimpan/'.$list1->kode_simpan)?>" class="btn btn-primary btn-sm">
                          <i class="fa fa-check-square-o"> Selesai</i>
                        </a>
                      <?php elseif($list1->status_simpan == 0): ?>
                        <a href="<?= base_url('Pengurus/aksiSimpan/'.$list1->kode_simpan)?>" class="btn btn-danger btn-sm">
                          <i class="fa fa-warning"> Di Tolak</i>
                        </a>
                      <?php elseif($list1->status_simpan == -1): ?>
                        <a href="<?= base_url('Pengurus/aksiSimpan/'.$list1->kode_simpan)?>" class="btn btn-warning btn-sm">
                          <i class="fa fa-warning"> Belum di Verifikasi</i>
                        </a>
                      <?php elseif($list1->status_simpan == -2): ?>
                        <a href="<?= base_url('Pengurus/aksiSimpan/'.$list1->kode_simpan)?>" class="btn btn-default btn-sm">
                          <i class="fa fa-eye"> Lihat</i>
                        </a>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php else: ?>

    <?php endif; ?>
  </div>
</div>
