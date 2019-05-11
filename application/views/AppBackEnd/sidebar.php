<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a class="site_title"><i class="fa fa-unlock"></i>
        <span>
          <?php if ($this->session->userdata('ai_pengurus')): ?>
            <?php if ($jabatan == 1): ?> Super Admin
            <?php elseif($jabatan == 2): ?> Admin
            <?php elseif($jabatan == 3): ?> Auditor
            <?php elseif($jabatan == 4): ?> Bag Keanggotaan
            <?php endif; ?>
          <?php else: ?>
            Anggota
          <?php endif; ?>
        </span>
      </a>
    </div>

    <div class="clearfix"></div>

    <div class="profile clearfix">
      <div class="profile_pic">
        <?php if ($this->session->userdata('ai_pengurus')): ?>
          <img src="<?= base_url() ?>asset/PENGURUS/<?= $this->session->userdata('foto')?>" alt="..." class="img-circle profile_img" height="70">
        <?php else: ?>
          <?php if ($baru == 0): ?>
            <img src="<?= base_url() ?>asset/ANGGOTA/<?= $this->session->userdata('ai_anggota')?>.jpg" alt="..." class="img-circle profile_img" height="70">
          <?php endif; ?>
        <?php endif; ?>
      </div>
      <div class="profile_info">
        <span>Selamat Datang,</span>
        <h2>
          <?php if ($this->session->userdata('ai_anggota')): ?>
            <?= $nickname?>
          <?php else: ?>
            <?= $fullname?>
          <?php endif; ?>
        </h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>Daftar Menu</h3>
        <ul class="nav side-menu">
          <?php if ($this->session->userdata('ai_anggota')): ?>
            <?php if ($baru == 1): ?>
              <li><a href="<?= base_url('New_nasabah')?>"><i class="fa fa-home"></i> Dashboard </a></li>
            <?php else: ?>
              <li><a href="<?= base_url('Nasabah')?>"><i class="fa fa-home"></i> Dashboard </a></li>
            <?php endif; ?>
          <?php else: ?>
            <?php if ($jabatan == 1): ?>
              <li><a href="<?= base_url('P_sadmin')?>"><i class="fa fa-home"></i> Dashboard </a></li>
            <?php elseif($jabatan == 2): ?>
              <li><a href="<?= base_url('P_admin')?>"><i class="fa fa-home"></i> Dashboard </a></li>
            <?php elseif($jabatan == 3): ?>
              <li><a href="<?= base_url('P_auditor')?>"><i class="fa fa-home"></i> Dashboard </a></li>
            <?php elseif($jabatan == 4): ?>
              <li><a href="<?= base_url('P_anggota')?>"><i class="fa fa-home"></i> Dashboard </a></li>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($this->session->userdata('baru') == "1") { ?>
            <?php if ($this->session->userdata('status') == -3 || $this->session->userdata('status') == -1): ?>
              <li><a><i class="fa fa-edit"></i> Kelengkapan Berkas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('New_nasabah/form2')?>">Form 1</a></li>
                  <li><a href="<?= base_url('New_nasabah/form1')?>">Form 2</a></li>
                  <li><a href="<?= base_url('New_nasabah/form3')?>">Form 3</a></li>
                  <li><a href="<?= base_url('New_nasabah/form4')?>">Form 4</a></li>
                  <li><a href="<?= base_url('New_nasabah/form5')?>">Form 5</a></li>
                  <li><a href="<?= base_url('New_nasabah/form6')?>">Form 6</a></li>
                  <li><a href="<?= base_url('New_nasabah/form7')?>">Form 7</a></li>
                  <li><a href="<?= base_url('New_nasabah/form8')?>">Form 8</a></li>
                  <li><a href="<?= base_url('New_nasabah/form_submit')?>">Selesaikan Berkas</a></li>
                </ul>
              </li>
            <?php endif; ?>
          <?php } elseif ($this->session->userdata('baru') == "0") { ?>
            <li><a><i class="fa fa-sign-in"></i> Simpanan (Setor)<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?= base_url('Nasabah/setorSimpananNasabah')?>">Setor Simpanan Sukarela </a></li>
                <li><a href="<?= base_url('Nasabah/bayarSetoranWajib')?>">Bayar Setoran Wajib</a></li>
                <li><a href="<?= base_url('Nasabah/listSimpanan')?>">Lihat Simpanan Yang Ada</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-share-square-o"></i> Simpanan (Ambil)<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?= base_url('Nasabah/ambilSimpanan')?>">Ambil Simpanan Sukarela</a></li>
                <li><a href="<?= base_url('Nasabah/listAmbilSimpanan')?>"> Lihat Data Ambil Simpanan</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Pinjaman <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?= base_url('Nasabah/ajukanPinjaman')?>">Buat Pinjaman</a></li>
                <li><a href="<?= base_url('Nasabah/listPinjaman')?>">Lihat Data Pinjaman</a></li>
              </ul>
            </li>

            <?php if ($jabatan != 1): ?>
              <li><a><i class="fa fa-table"></i> Data Kelompok 1<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('Nasabah/detailKelompok')?>"> Data Kelompok </a></li>
                  <li><a href="<?= base_url('Nasabah/listTunggakanKelompok')?>"> Lihat Data Tunggakan </a></li>
                  <li><a href="<?= base_url('Nasabah/listPermintaanAnggotaKelompok')?>"> Permintaan Anggota Baru </a></li>
                </ul>
              </li>
            <?php endif; ?>
            <li><a href="<?= base_url('Nasabah/pengunduranDiri')?>"><i class="fa fa-power-off"></i> Berhenti Dari Koperasi</a></li>
          <?php }elseif ($this->session->userdata('ai_pengurus')) { ?>
            <?php if ($jabatan == 1): ?>
            <?php elseif($jabatan == 2):?>
              <li><a><i class="fa fa-sign-in"></i> Simpanan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('P_admin/simpananProses')?>">Simpanan Proses</a></li>
                  <li><a href="<?= base_url('P_admin/simpananBerhasil')?>">Simpanan Berhasil</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-share-square-o"></i> Ambil Simpanan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('P_admin/ambilProses')?>">Ambil Simpanan Proses</a></li>
                  <li><a href="<?= base_url('P_admin/ambilBerhasil')?>"> Ambil Simpanan Berhasil </a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-list"></i>Transaksi Pinjaman<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('P_admin/pinjamanAll')?>"> Pinjaman Proses / Berjalan</a></li>
                  <li><a href="<?= base_url('P_admin/pinjamanLunasList')?>">Data Pinjaman Lunas</a></li>
                </ul>
              </li>

              <li><a><i class="fa fa-plane"></i>Pengunduran Diri<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('P_admin/undurList')?>"> Pencairan Dana Pengunduran</a></li>
                  <li><a href="<?= base_url('P_admin/undurSelesai')?>"> Pengunduran Selesai</a></li>
                </ul>
              </li>

            <?php elseif($jabatan == 3):?>
              <li><a><i class="fa fa-list"></i>Transaksi Pinjaman<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('P_auditor/pinjamanList')?>">Pinjaman Proses / Berjalan</a></li>
                  <!-- <li><a href="<?= base_url('P_auditor/pinjamanCari')?>">List Tunggak Pinjaman</a></li> -->
                  <li><a href="<?= base_url('P_auditor/pinjamanLunas')?>">Data Pinjaman Lunas</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-money"></i>Tunggakan Nasabah<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('P_auditor/checkPinjamanMonth')?>">Bayar Pinjaman Bulan Ini</a></li>
                  <li><a href="<?= base_url('P_auditor/checkPinjamanTerlewat')?>">Bayar Pinjaman Terlewat</a></li>
                  <li><a href="<?= base_url('P_auditor/checkSetoranWajibMonth')?>">Setoran Wajib Bulan Ini</a></li>
                  <li><a href="<?= base_url('P_auditor/checkSetoranWajibLewat')?>">Setoran Wajib Terlewat</a></li>
                </ul>
              </li>
            <?php elseif($jabatan == 4):?>
              <li><a><i class="fa fa-group"></i> Nasabah<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('P_anggota/nasabahBaruList')?>">Calon Nasabah Baru</a></li>
                  <li><a href="<?= base_url('P_anggota/nasabahTetapList')?>">Nasabah Tetap</a></li>
                  <li><a href="<?= base_url('P_anggota/nasabahBlackList')?>">Nasabah Suspended</a></li>
                  <li><a href="<?= base_url('P_anggota/nasabahMantanList')?>">Nasabah Pensiun</a></li>
                </ul>
              </li>
              <!-- <li><a><i class="fa fa-slideshare"></i> Pengaturan Kelompok<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?= base_url('P_anggota/kelompokTambah')?>">Tambah Kelompok</a></li>
                  <li><a href="<?= base_url('P_anggota/kelompokList')?>">List Kelompok dan Ketua</a></li>
                </ul>
              </li> -->
              <li><a href="<?= base_url('P_anggota/undurList')?>"><i class="fa fa-suitcase"></i> Pengunduran Diri Anggota </a></li>
            <?php endif; ?>
          <?php } ?>
        </ul>
      </div>
      <!-- <div class="menu_section">
        <h3>Live On</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-bug"></i> Pengaturan Koperasi <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="e_commerce.html">Identitas</a></li>
              <li><a href="projects.html">Suku Bunga</a></li>
            </ul>
          </li>

          <li><a href=""><i class="fa fa-laptop"></i> User Profile </a></li>
        </ul>
      </div> -->

      <!-- <div class="menu_section">
        <h3>Menu Tambahan</h3>
        <ul class="nav side-menu">
          <li><a href="<?= base_url('Pesan')?>"><i class="fa fa-envelope"></i> Kotak Pesan </a></li>

        </ul>
      </div> -->

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('Auth/logout')?>">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>
