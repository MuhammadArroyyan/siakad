<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="row g-3">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-white bg-primary h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Total Mahasiswa</h6>
                        <h2 class="mt-2 mb-0 fw-bold"><?= $total_mhs ?></h2>
                    </div>
                    <i class="bi bi-people-fill card-icon"></i>
                </div>
                <small class="mt-3 d-block text-white-50">Data aktif semester ini</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-white bg-success h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Total Dosen</h6>
                        <h2 class="mt-2 mb-0 fw-bold"><?= $total_dosen ?></h2>
                    </div>
                    <i class="bi bi-person-video3 card-icon"></i>
                </div>
                <small class="mt-3 d-block text-white-50">Pengajar terdaftar</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-white bg-warning h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Mata Kuliah</h6>
                        <h2 class="mt-2 mb-0 fw-bold"><?= $total_mk ?></h2>
                    </div>
                    <i class="bi bi-book-half card-icon"></i>
                </div>
                <small class="mt-3 d-block text-white-50">Kurikulum 2025</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-white bg-danger h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-0">Jadwal Kuliah</h6>
                        <h2 class="mt-2 mb-0 fw-bold"><?= $total_jadwal ?></h2>
                    </div>
                    <i class="bi bi-calendar-week card-icon"></i>
                </div>
                <small class="mt-3 d-block text-white-50">Kelas terjadwal</small>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-secondary">Aksi Cepat</h5>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                    <a href="<?= base_url('mahasiswa/create') ?>" class="btn btn-outline-primary">
                        <i class="bi bi-person-plus-fill"></i> Tambah Mahasiswa
                    </a>
                    <a href="<?= base_url('dosen/create') ?>" class="btn btn-outline-info text-dark">
                        <i class="bi bi-person-badge-fill"></i> Tambah Dosen
                    </a>
                    <a href="<?= base_url('matakuliah') ?>" class="btn btn-outline-warning text-dark">
                        <i class="bi bi-book-half"></i> Tambah Mata Kuliah
                    </a>
                    <a href="<?= base_url('jadwal/create') ?>" class="btn btn-outline-success">
                        <i class="bi bi-calendar-plus-fill"></i> Tambah Jadwal
                    </a>
                    <a href="<?= base_url('dashboard/cetak') ?>" target="_blank" class="btn btn-outline-dark ms-auto">
                        <i class="bi bi-printer-fill"></i> Cetak Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>