<li class="menu-header">Dashboard</li>
<li class="active"><a class="nav-link" href="<?= site_url('dashboard'); ?>"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Data Management</span></a>
    <ul class="dropdown-menu" style="display: none;">
        <li><a class="nav-link" href="<?= site_url('data_pegawai'); ?>">Data Pegawai</a></li>
        <li><a class="nav-link" href="<?= site_url('data_barang'); ?>">Data Barang</a></li>
        <li><a class="nav-link" href="<?= site_url('data_bahan'); ?>">Data Bahan</a></li>
    </ul>
</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Pengelolaan</span></a>
    <ul class="dropdown-menu" style="display: none;">
        <li><a class="nav-link" href="<?= site_url('pengelolaan/pencucian'); ?>">Pencucian</a></li>
        <li><a class="nav-link" href="<?= site_url(''); ?>">Pengeringan</a></li>
        <li><a class="nav-link" href="<?= site_url(''); ?>">Penyetrikaan</a></li>
        <li><a class="nav-link" href="<?= site_url(''); ?>">Pelipatan</a></li>
    </ul>
</li>
<li class="active"><a class="nav-link" href="<?= site_url('pengelolaan'); ?>"><i class="far fa-calendar"></i> <span>Pengelolaan</span></a></li>
<li class="active"><a class="nav-link" href="<?= site_url('distribusi'); ?>"><i class="far fa-calendar"></i> <span>Distribusi</span></a></li>
<li class="active"><a class="nav-link" href="blank.html"><i class="far fa-book"></i> <span>Laporan</span></a></li>