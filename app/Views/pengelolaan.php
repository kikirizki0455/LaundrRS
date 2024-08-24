<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <h1 class="text-center">Selamat Datang, Pengelola - </h1>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pencucian</h5>
                    <p class="card-text">Kelola item yang sedang dicuci.</p>
                    <a href="<?= base_url('/cuci'); ?>" class="btn btn-light">Masuk</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pengeringan</h5>
                    <p class="card-text">Kelola item yang sedang dikeringkan.</p>
                    <a href="/manager/drying" class="btn btn-light">Masuk</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pelipatan</h5>
                    <p class="card-text">Kelola item yang sedang dilipat.</p>
                    <a href="/manager/folding" class="btn btn-light">Masuk</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Penyetrikaan</h5>
                    <p class="card-text">Kelola item yang sedang disetrika.</p>
                    <a href="/manager/ironing" class="btn btn-light">Masuk</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>