<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Dashboard</h4>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nomor Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>Nama Bahan</th>
                        <th>Stok Bahan</th>
                        <th>Nama Barang</th>
                        <th>Stok Barang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pegawai as $p): ?>
                        <tr>
                            <td><?= esc($p->id_pegawai); ?></td>
                            <td><?= esc($p->nomor_pegawai); ?></td>
                            <td><?= esc($p->nama_pegawai); ?></td>
                            <td>
                                <?php foreach ($bahan_kritis as $b): ?>
                                    <?= esc($b->nama_bahan); ?><br>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($bahan_kritis as $b): ?>
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <!-- Bagian stok bahan -->
                                        <span><?= esc($b->stok_bahan); ?></span>

                                        <!-- Bagian tombol "Tambah Stok" -->
                                        <?php if ($b->stok_bahan < 5): ?>
                                            <a href="<?= base_url('dashboard/show_modal/' . $b->id_bahan); ?>" class="btn btn-warning" style="margin-left: 10px;">Tambah Stok</a>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php if (!empty($barang)): ?>
                                    <?php foreach ($barang as $b): ?>
                                        <?= esc($b->nama_barang); ?><br>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($barang)): ?>
                                    <?php foreach ($barang as $b): ?>
                                        <?= esc($b->stok); ?><br>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Modal Tambah Stok -->
<?php if (!empty($modalBahan) && !empty($modalBahanId)): ?>
    <div class="modal fade show d-block" id="tambahStokModal" tabindex="-1" aria-labelledby="tambahStokModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahStokModalLabel">Tambah Stok</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('dashboard/tambah_stok'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_bahan" class="form-label">Nama Bahan</label>
                            <input type="text" class="form-control" id="nama_bahan" name="nama_bahan" value="<?= esc($modalBahan); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="stok_tambah" class="form-label">Tambah Stok</label>
                            <input type="number" class="form-control" id="stok_tambah" name="stok_tambah" required min="1">
                        </div>
                        <input type="hidden" name="id_bahan" id="id_bahan" value="<?= esc($modalBahanId); ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>

<?= $this->endSection(); ?>