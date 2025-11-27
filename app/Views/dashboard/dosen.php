<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="alert alert-primary shadow-sm border-0">
    <h4 class="alert-heading"><i class="bi bi-person-video3 me-2"></i> Selamat Datang, Dosen!</h4>
    <p>Ini adalah area manajemen perkuliahan. Silakan pilih menu di samping untuk melihat jadwal atau input nilai.</p>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center p-5">
                <i class="bi bi-calendar-check text-success display-4 mb-3"></i>
                <h5>Jadwal Mengajar</h5>
                <p class="text-muted">Cek jadwal kelas Anda hari ini.</p>
                <a href="<?= base_url('dosen/jadwal') ?>" class="btn btn-outline-success">Buka Jadwal</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>