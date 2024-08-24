<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Edit Pegawai</h4>
        </div>
        <div class="card-body col-md-15">
            <form action="<?= site_url('home/update'); ?>" method="POST" autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_pegawai" value="<?= esc($pegawai->id_pegawai); ?>">
                <div class="form-group">
                    <label for="nomor_pegawai">Nomor Pegawai</label>
                    <input type="text" name="nomor_pegawai" class="form-control" value="<?= esc($pegawai->nomor_pegawai); ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama_pegawai">Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control" value="<?= esc($pegawai->nama_pegawai); ?>" required>
                </div>
                <div class="form-group">
                    <label for="role_pegawai">Role Pegawai</label>
                    <select name="role_pegawai" class="form-control" required>
                        <option value="" disabled>Select role</option>
                        <option value="pengelola" <?= $pegawai->role_pegawai === 'pengelola' ? 'selected' : ''; ?>>Pengelola</option>
                        <option value="distribusi" <?= $pegawai->role_pegawai === 'distribusi' ? 'selected' : ''; ?>>Distribusi</option>
                        <option value="admin" <?= $pegawai->role_pegawai === 'admin' ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= site_url('home'); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>