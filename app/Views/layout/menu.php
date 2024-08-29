<li class="menu-header">Dashboard</li>
<li class="active"><a class="nav-link" href="<?= site_url('home'); ?>"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
<li class="active"><a class="nav-link" href="<?= site_url('pengelolaan'); ?>"><i class="far fa-calendar"></i> <span>Pengelolaan</span></a></li>
<li class="active"><a class="nav-link" href="<?= site_url('distribusi'); ?>"><i class="far fa-calendar"></i> <span>Distribusi</span></a></li>
<li class="active"><a class="nav-link" href="blank.html"><i class="far fa-book"></i> <span>Laporan</span></a></li>

<li class="menu-header">Data Management</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="far fa-folder"></i> <span>Data Management</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?= site_url('tambah_barang'); ?>">Data Barang</a></li>
        <li><a class="nav-link" href="<?= site_url('tambah_pegawai'); ?>">Data Pegawai</a></li>
        <li><a class="nav-link" href="<?= site_url('tambah_bahan'); ?>">Data Bahan</a></li>
    </ul>
</li>