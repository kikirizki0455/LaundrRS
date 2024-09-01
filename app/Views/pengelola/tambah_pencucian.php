<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Pencucian</h4>
        </div>
        <div class="card-body">
            <form action="<?= site_url('pencucian/store'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="id_timbangan" class="form-label">Pilih Timbangan</label>
                    <select class="form-control" id="id_timbangan" name="id_timbangan" required>
                        <?php foreach ($timbangan as $item): ?>
                            <option value="<?= $item->id_timbangan; ?>"><?= $item->nama_barang; ?> (<?= $item->berat_barang; ?> kg)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>