<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Data Pegawai</h4>
            <div class="section-header-button">
                <a href="<?= site_url('tambah_pegawai'); ?>" class="btn btn-success">Tambah Pegawai</a>
            </div>
        </div>
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Berhasil</b>
                    <?= session()->getFlashdata('success'); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Gagal</b>
                    <?= session()->getFlashdata('error'); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pegawai</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Aksi</th> <!-- Tambahkan kolom aksi -->
                            <th>Aksi</th> <!-- Tambahkan kolom aksi -->
                            <th>Aksi</th> <!-- Tambahkan kolom aksi -->
                        </tr>
                        <?php foreach ($pegawai as $key => $value): ?>
                            <tr>
                                <td><?= esc($key + 1); ?></td>
                                <td><?= esc($value->nomor_pegawai); ?></td>
                                <td><?= esc($value->nama_pegawai); ?></td>
                                <td><?= esc($value->role_pegawai); ?></td>
                                <td>
                                    <!-- edit pegawai -->
                                    <a href="<?= site_url('home/edit_pegawai/' . esc($value->id_pegawai)); ?>" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <!-- hapus data pegawai -->
                                    <form action="<?= site_url('home/delete_pegawai/' . esc($value->id_pegawai)); ?>" method="POST" style="display:inline;">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE"> <!-- Method spoofing -->
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Data Barang</h4>
            <div class="section-header-button">
                <a href="<?= site_url('tambah_barang'); ?>" class="btn btn-success">Tambah Barang</a>
            </div>
        </div>
        <?php if (session()->getFlashdata('success_barang')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Berhasil</b>
                    <?= session()->getFlashdata('success_barang'); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error_barang')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Gagal</b>
                    <?= session()->getFlashdata('error_barang'); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Aksi</th> <!-- Action column -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barang as $key => $value): ?>
                            <tr>
                                <td><?= esc($key + 1); ?></td>
                                <td><?= esc($value->nama_barang); ?></td>
                                <td><?= esc($value->stok); ?></td>
                                <td>
                                    <!-- edit barang -->
                                    <a href="<?= site_url('home/edit_barang/' . esc($value->id)); ?>" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <!-- hapus data barang -->
                                    <form action="<?= site_url('home/delete_barang/' . esc($value->id)); ?>" method="POST" style="display:inline;">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE"> <!-- Method spoofing -->
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Data Bahan</h4>
            <div class="section-header-button">
                <a href="<?= site_url('tambah_bahan'); ?>" class="btn btn-success">Tambah Bahan</a>
            </div>
        </div>
        <?php if (session()->getFlashdata('success_bahan')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Berhasil</b>
                    <?= session()->getFlashdata('success_bahan'); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error_barang')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Gagal</b>
                    <?= session()->getFlashdata('error_barang'); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bahan</th>
                            <th>Stok</th>
                            <th>Aksi</th> <!-- Action column -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bahan as $key => $value): ?>
                            <tr>
                                <td><?= esc($key + 1); ?></td>
                                <td><?= esc($value->nama_bahan); ?></td>
                                <td><?= esc($value->stok_bahan); ?></td>
                                <td>
                                    <!-- edit barang -->
                                    <a href="<?= site_url('home/edit_bahan/' . esc($value->id)); ?>" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <!-- hapus data barang -->
                                    <form action="<?= site_url('home/delete_bahan/' . esc($value->id)); ?>" method="POST" style="display:inline;">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE"> <!-- Method spoofing -->
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>