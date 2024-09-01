<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Pencucian</h4>
            <div class="card-header-action">
                <a href="<?= base_url('pencucian/tambah_pencucian'); ?>" class="btn btn-primary">Tambah Pencucian</a>
            </div>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Timbangan</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pencucian as $p): ?>
                        <tr>
                            <td><?= esc($p->id_pencucian); ?></td>
                            <td><?= esc($p->id_timbangan); ?></td>
                            <td><?= esc($p->waktu_mulai); ?></td>
                            <td><?= esc($p->waktu_selesai); ?></td>
                            <td><?= esc($p->status); ?></td>
                            <td>
                                <?php if ($p->status == 'Dalam Proses'): ?>
                                    <a href="<?= base_url('pencucian/edit/' . $p->id_pencucian); ?>" class="btn btn-warning">Update Status</a>
                                <?php endif; ?>
                                <a href="<?= base_url('pencucian/delete/' . $p->id_pencucian); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pencucian ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>