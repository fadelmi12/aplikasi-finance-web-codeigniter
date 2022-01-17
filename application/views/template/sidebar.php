<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="<?= base_url() ?>assets/img/logo.png" class="header-logo" /> <span class="logo-name">ANITA</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown <?php echo ($this->uri->segment(1) == '') ? 'active' : '' ?>">
                <a href="<?php echo base_url()?>" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown <?php echo ($this->uri->segment(1) === 'master_data') ? 'active' : '' ?>">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="folder"></i><span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?php echo base_url() ?>master_data/saldo_awal">Saldo Awal</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>master_data/info_perusahaan">Info Perusahaan</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>master_data/data_perkiraan_akun">Data Perkiraan Akun</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>master_data/data_barang">Data Barang</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>master_data/data_pelanggan">Data Pelanggan</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>master_data/data_supplier">Data Supplier</a></li>
                </ul>
            </li>
            <li class="dropdown <?php echo ($this->uri->segment(1) === 'transaksi') ? 'active' : '' ?>">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="bar-chart"></i><span>Data Transaksi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?php echo base_url() ?>transaksi/daftar_penjualan">Daftar Penjualan</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>transaksi/daftar_pembelian">Data Pembelian</a></li>
                </ul>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="dropdown <?php echo ($this->uri->segment(1) === 'akuntansi') ? 'active' : '' ?>">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="calendar"></i><span>Akuntansi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?php echo base_url() ?>akuntansi/jurnal_umum">Jurnal Umum</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>akuntansi/buku_besar">Buku Besar</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>akuntansi/jurnal_penyesuaian">Jurnal Penyesuaian</a></li>
                </ul>
            </li>
            
            <li class="dropdown <?php echo ($this->uri->segment(1) === 'laporan') ? 'active' : '' ?>">
                <a href="<?php echo base_url()?>pengaturan" class="menu-toggle nav-link has-dropdown"><i data-feather="file-text"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?php echo base_url() ?>laporan/laporan_laba_rugi">Laporan Laba Rugi</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>laporan/laporan_posisi_keuangan">Laporan Posisi Keuangan</a></li>
                </ul>
            </li>
            <li class="menu-header">Akun</li>
            <li class="dropdown <?php echo ($this->uri->segment(1) === 'pengaturan') ? 'active' : '' ?>">
                <a href="<?php echo base_url()?>pengaturan" class="nav-link "><i data-feather="settings"></i><span>Pengaturan Akun</span></a>     
            </li>
            <li class="dropdown <?php echo ($this->uri->segment(1) === 'pengaturan_profile') ? 'active' : '' ?>">
                <a href="<?php echo base_url()?>pengaturan" class="nav-link "><i data-feather="user"></i><span>Pengaturan Profile</span></a>     
            </li>
        </ul>
    </aside>
</div>