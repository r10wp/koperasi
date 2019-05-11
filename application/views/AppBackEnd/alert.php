<div id="notifications">
  <?php
    $day = date('D', strtotime(date('Y-m-d')));
        $dayList = array(
          'Sun' => 'Minggu',
          'Mon' => 'Senin',
          'Tue' => 'Selasa',
          'Wed' => 'Rabu',
          'Thu' => 'Kamis',
          'Fri' => 'Jumat',
          'Sat' => 'Sabtu'
    );
    if($this->session->flashdata('PesanSukses')){ ?>
      <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4><i class="fa fa-check-square-o"></i> Sukses</h4>
        <strong><?= $this->session->flashdata('PesanSukses') ?></strong>
        <p><?php echo $dayList[$day] . date(', d M Y H:i:s') ?> </p>
      </div>
    <?php }elseif ($this->session->flashdata('PesanError')) { ?>
      <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4><i class="fa fa-exclamation-circle"></i> Terjadi Kesalahan</h4>
        <strong><?= $this->session->flashdata('PesanError') ?></strong>
        <p>Pukul : <?= date('d M Y H:i:s') ?> </p>
      </div>
    <?php  }elseif ($this->session->flashdata('PesanPeringatan')) { ?>
      <div class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4><i class="fa fa-warning"></i> Peringatan</h4>
        <strong><?= $this->session->flashdata('PesanPeringatan') ?></strong>
        <p>Pukul : <?= date('d M Y H:i:s') ?> </p>
      </div>
    <?php  } ?>
  </div>
