<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <?php foreach ($cetak_detail1 as $detail1): ?>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

        <?php if ($detail1->akhir_vcode > date('Y-m-d H:i:s') && $detail1->status_ambil == -2): ?>
          <div class="x_title">
            <h2>Form Verfikasi Keamanan</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('Nasabah/verifikasi_vcode/'.$detail1->kode)?>">

              <?php
                $timeFirst  = strtotime(date('Y-m-d H:i:s'));
                $timeSecond = strtotime($detail1->akhir_vcode);
                $setRedirect = $timeSecond - $timeFirst;
              ?>
              <div class="row begin-countdown">
                <div class="col-md-12 text-center">
                  <progress value="<?= $setRedirect?>" max="180" id="pageBeginCountdown"></progress>
                  <p> Berakhir Dalam <span id="pageBeginCountdownText"><?= $setRedirect?></span> Detik</p>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Peganjuan Ambil Simpanan
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="<?= date("d F Y , h:i:s", strtotime($detail1->tgl_pengajuan))?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jumlah Penarikan
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="<?= rupiahset($detail1->total_dana_diajukan) ?>" class="form-control col-md-7 col-xs-12" readonly>
                </div>
              </div>

              <div class="form-group inputs">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Masukkan Empat Digit Code</label>
                <div class="col-md-1">
                  <input class=" form-control" maxlength="1" id="a" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" name="v_code1" style="text-align:center;" />
                </div>
                <div class="col-md-1">
                  <input class=" form-control" maxlength="1" id="b" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" name="v_code2" style="text-align:center;" />
                </div>

                <div class="col-md-1">
                  <input class=" form-control" maxlength="1" id="c" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" name="v_code3" style="text-align:center;" />
                </div>

                <div class="col-sm-1">
                  <input class=" form-control" maxlength="1" id="d" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" name="v_code4" style="text-align:center;" />
                </div>


              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="default" class="btn btn-primary">Verfikasi</button>
                </div>
              </div>

            </form>
          </div>
        <?php else: ?>
          <div class="x_title">
            <h2>Detail Penarikan</h2>

            <div class="clearfix"></div>
          </div>
          <div class="form-horizontal">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Peganjuan Ambil Simpanan
              </label>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="text" value="<?= date("d F Y , h:i:s", strtotime($detail1->tgl_pengajuan))?>" class="form-control col-md-7 col-xs-12" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jumlah Penarikan
              </label>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <input type="text" value="<?= rupiahset($detail1->total_dana_diajukan) ?>" class="form-control col-md-7 col-xs-12" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Rekening Tujuan Pencairan <br>(Bank / No Rekening / Nama Pemilik)
              </label>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <input type="text" value="<?= $detail1->nama_bank ?>" class="form-control col-md-7 col-xs-12" readonly>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <input type="text" value="<?= $detail1->no_rekening_nasabah ?>" class="form-control col-md-7 col-xs-12" readonly>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <input type="text" value="<?= $detail1->nama_pemilik_dalam_rekening ?>" class="form-control col-md-7 col-xs-12" readonly>
              </div>

            </div>
            <div class="ln_solid"></div>
            <?php if ($detail1->status_ambil == -2): ?>
              <h4>Mohon Maaf. Pengambilan Dana Ditolak dengan Alasan : <font color="red">Terlambat Memasukkan Kode Konfirmasi</font><h4>
              <?php  elseif($detail1->status_ambil == -1): ?>
                <h4><font color="orange" ><i class="fa fa-clock-o"></i> Masih dalam verifikasi untuk dicairkan</font><h4>
            <?php else: ?>
              <?php if ($detail1->status_ambil == 0): ?>
                <h4>Mohon Maaf. Pengambilan Dana Ditolak dengan Alasan : <font color="red"><?= $detail1->keterangan_tambahan?></font><h4>
              <?php else: ?>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tanggal Pencairan
                  </label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <input type="text" value="<?= $detail1->tgl_pencairan_dana ?>" class="form-control col-md-7 col-xs-12" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Total Dana Yang Diberikan
                  </label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <input type="text" value="<?= rupiahset($detail1->total_dana_diberikan) ?>" class="form-control col-md-7 col-xs-12" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Keterangan Tambahan
                  </label>

                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <textarea class="form-control " readonly><?= $detail1->keterangan_tambahan?></textarea>
                  </div>
                </div>
                <?php endif; ?>

            <?php endif; ?>






          </div>
        <?php endif; ?>

        </div>
      </div>
    </div>
    <?php endforeach; ?>





  </div>
</div>
<!-- Buat Database Timer Kurangi -->
<script type="text/javascript">
  ProgressCountdown(<?= $setRedirect?>, 'pageBeginCountdown', 'pageBeginCountdownText').then(value => alert(`Page has started: ${value}.`));
  function ProgressCountdown(timeleft, bar, text) {
    return new Promise((resolve, reject) => {
      var countdownTimer = setInterval(() => {
        timeleft--;

        document.getElementById(bar).value = timeleft;
        document.getElementById(text).textContent = timeleft;

        if (timeleft <= 0) {
          window.location="<?= base_url('Nasabah')?>";
        }
      }, 1000);
    });
  }
</script>

<style>
  progress {
    -webkit-appearance: none;
    width: 500px;
    height: 20px;

  }
  progress[value]::-webkit-progress-bar {
    background-color: #eee;
    border-radius: 2px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25) inset;
  }

  progress[value]::-webkit-progress-value {
    background-image:
       -webkit-linear-gradient(-45deg,
                               transparent 33%, rgba(0, 0, 0, .1) 33%,
                               rgba(0,0, 0, .1) 66%, transparent 66%),
       -webkit-linear-gradient(top,
                               rgba(255, 255, 255, .25),
                               rgba(0, 0, 0, .25)),
       -webkit-linear-gradient(left, #09c, #f44);

      border-radius: 2px;
      background-size: 35px 20px, 100% 100%, 100% 100%;
  }
</style>
