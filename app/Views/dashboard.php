<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Dashboard</h4>
        </div>
        <div class="card-body">
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
                        <?php
                        // Cari bahan dengan stok kurang dari 5 untuk pegawai ini
                        $bahan_kritis = array_filter($bahan, function ($b) {
                            return $b->stok_bahan < 5;
                        });
                        // Ambil data barang terkait dengan pegawai (misal berdasarkan ID pegawai)
                        // Asumsi: Ada kolom yang menghubungkan pegawai dan barang, jika tidak, sesuaikan sesuai kebutuhan
                        ?>
                        <tr>
                            <td><?= esc($p->id_pegawai); ?></td>
                            <td><?= esc($p->nomor_pegawai); ?></td>
                            <td><?= esc($p->nama_pegawai); ?></td>
                            <td>
                                <?php if (!empty($bahan_kritis)): ?>
                                    <?php foreach ($bahan_kritis as $b): ?>
                                        <?= esc($b->nama_bahan); ?><br>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($bahan_kritis)): ?>
                                    <?php foreach ($bahan_kritis as $b): ?>
                                        <?= esc($b->stok_bahan); ?><br>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php
                                // Menampilkan data barang (misal berdasarkan ID pegawai atau logika lain)
                                // Anda bisa sesuaikan sesuai hubungan antara pegawai dan barang jika ada
                                ?>
                                <?php foreach ($barang as $b): ?>
                                    <?= esc($b->nama_barang); ?><br>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($barang as $b): ?>
                                    <?= esc($b->stok); ?><br>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>





</section>

<?= $this->endSection(); ?>