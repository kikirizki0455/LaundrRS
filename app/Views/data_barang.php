<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Data Barang</h4>
            <div class="section-header-button">
                <a href="<?= site_url('tambah_barang'); ?>" class="btn btn-success">Tambah Barang</a>
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
                                    <a href="<?= site_url('edit_barang/' . esc($value->id_barang)); ?>" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <!-- hapus data barang -->
                                    <form action="<?= site_url('delete_barang/' . esc($value->id_barang)); ?>" method="POST" style="display:inline;">
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