<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="section-header-button">
                <a href="<?= site_url('data_barang'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h4>Edit Barang</h4>
        </div>
        <div class="card-body col-md-15">
            <form action="<?= site_url('update_barang'); ?>" method="POST" autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= esc($barang->id); ?>">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <select name="nama_barang" class="form-control" required>
                        <option value="" disabled>Select item</option>
                        <option value="Laken" <?= $barang->nama_barang == 'Laken' ? 'selected' : ''; ?>>Laken</option>
                        <option value="S.bantal" <?= $barang->nama_barang == 'S.bantal' ? 'selected' : ''; ?>>S.bantal</option>
                        <option value="Selimut" <?= $barang->nama_barang == 'Selimut' ? 'selected' : ''; ?>>Selimut</option>
                        <option value="Bedcover" <?= $barang->nama_barang == 'Bedcover' ? 'selected' : ''; ?>>Bedcover</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stok">Stok Barang</label>
                    <input type="text" name="stok" class="form-control" value="<?= esc($barang->stok); ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= site_url('data_barang'); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>