<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">

            <div class="section-header-button">
                <a href="<?= site_url('data_bahan'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h4>Tambah Bahan</h4>
        </div>
        <div class="card-body col-md-15">
            <form action="<?= site_url('store_bahan'); ?>" method="POST" autocomplete="off">
                <h4>Tambah Bahan</h4>
        </div>
        <div class="card-body col-md-15">
            <form action="<?= site_url('home/store_bahan'); ?>" method="POST" autocomplete="off">

                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="nama_bahan">Nama Bahan </label>
                    <select name="nama_bahan" class="form-control" required>
                        <option value="" disabled selected>Select item</option>
                        <option value="ditergen liquid">ditergen liquid</option>
                        <option value="penetral">penetral</option>
                        <option value="concenrated oxygen bleach">concenrated oxygen bleach</option>
                        <option value="karbol sere">karbol sere</option>
                        <option value="soklin">soklin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stok_barang">Stok Bahan</label>
                    <input type="text" name="stok_bahan" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>

                <a href="<?= site_url('data_bahan'); ?>" class="btn btn-secondary">Batal</a>

                <a href="<?= site_url('home'); ?>" class="btn btn-secondary">Batal</a>

            </form>

        </div>
    </div>
</section>

<?= $this->endSection(); ?>