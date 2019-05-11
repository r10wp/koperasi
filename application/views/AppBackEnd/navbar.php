<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="images/img.jpg" alt=""><?=  strtoupper($fullname)?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <?php if ($this->session->userdata('ai_anggota')): ?>
              <li><a href="<?= base_url('Nasabah/detail/'.$this->session->userdata('ai_anggota'))?>"> Profile</a></li>
            <?php endif; ?>
            <?php if ($this->session->userdata('ai_anggota')): ?>
              <li><a href="<?= base_url('AuthAnggota/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
            <?php else: ?>
              <li><a href="<?= base_url('AuthPengurus/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
            <?php endif; ?>
          </ul>
        </li>

        <!-- <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <?php if ($jumlah_pesan_belum_dibaca != 0): ?>
              <span class="badge bg-green">
                <?= $jumlah_pesan_belum_dibaca?>
              </span>
            <?php endif; ?>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <?php foreach ($cetak_pesan as $pesan): ?>


            <li>
              <a href="<?= base_url('Pesan/detail/'.$pesan->id_pesan)?>">
                <span class="image">
                  <!-- Kotak Navigasi Pesan  -->
                  <?php if ($pesan->dari_pengurus == null ): ?>
                    <img src="<?= base_url()?>asset/ANGGOTA/<?= $pesan->gambar?>" alt="Profile Image" />
                  <?php else: ?>
                    <img src="<?= base_url()?>theme/images/img.jpg" alt="Profile Image" />
                  <?php endif; ?>
                </span>
                <span>
                  <span>
                    <?php if ($pesan->dari_pengurus == null ): ?>
                      <?= $pesan->nama_pendek?>
                    <?php else: ?>
                      Pengurus Koperasi
                    <?php endif; ?>
                  </span>
                  <span class="time"><?= timeAgo($pesan->dikirim_pukul)?></span>
                </span>
                <span class="message">
                  <?= $pesan->judul?>
                </span>
              </a>
            </li>
            <?php endforeach; ?>
            <li>
              <div class="text-center">
                <a href="<?= base_url('Pesan')?>">
                  <strong>Lihat Semua Pesan</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li> -->
      </ul>
    </nav>
  </div>
</div>
