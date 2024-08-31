<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="section-header-button">
                <a href="<?= site_url('data_barang'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h4>Tambah Barang</h4>
        </div>
        <div class="card-body col-md-15">
            <form action="<?= site_url('store_barang'); ?>" method="POST" autocomplete="off">

                <form action="<?= site_url('home/store_barang'); ?>" method="POST" autocomplete="off">

                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <select name="nama_barang" class="form-control" required>
                            <option value="" disabled selected>Select item</option>
                            <option value="Laken">Laken</option>
                            <option value="S.bantal">S.bantal</option>
                            <option value="Selimut">Selimut</option>
                            <option value="Bedcover">Bedcover</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stok_barang">Stok Barang</label>
                        <input type="text" name="stok" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>

                    <a href="<?= site_url('data_barang'); ?>" class="btn btn-secondary">Batal</a>

                    <a href="<?= site_url('home'); ?>" class="btn btn-secondary">Batal</a>

                </form>

        </div>
    </div>
</section>

<?= $this->endSection(); ?>