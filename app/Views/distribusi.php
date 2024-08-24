<?= $this->extend('layout/default'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <h1 class="text-center mb-4">Dasbor Distribusi</h1>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card bg-light border-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Status Pengiriman</h5>
                    <p class="card-text">Periksa status pengiriman item yang telah diproses.</p>
                    <a href="/distribution/status" class="btn btn-primary">Lihat Status</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card bg-light border-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Distribusi</h5>
                    <p class="card-text">Lihat jadwal distribusi untuk rencana pengiriman mendatang.</p>
                    <a href="/distribution/schedule" class="btn btn-primary">Lihat Jadwal</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card bg-light border-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Riwayat Pengiriman</h5>
                    <p class="card-text">Lihat riwayat pengiriman yang telah dilakukan.</p>
                    <a href="/distribution/history" class="btn btn-primary">Lihat Riwayat</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card bg-light border-light shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Kelola Kendaraan</h5>
                    <p class="card-text">Kelola kendaraan yang digunakan untuk distribusi.</p>
                    <a href="/distribution/vehicles" class="btn btn-primary">Kelola Kendaraan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>