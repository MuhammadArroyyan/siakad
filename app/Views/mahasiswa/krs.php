<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="alert alert-info border-0 shadow-sm">
    <i class="bi bi-info-circle-fill me-2"></i> Silakan pilih mata kuliah yang ingin diambil semester ini.
</div>

<div class="row">
    <?php foreach($jadwal as $j): ?>
    <div class="col-md-6 mb-3">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold text-primary"><?= $j['nama_mata_kuliah'] ?></h5>
                    <span class="badge bg-secondary"><?= $j['sks'] ?> SKS</span>
                </div>
                <p class="mb-1 text-muted small"><?= $j['kode_mata_kuliah'] ?> - Kelas <?= $j['nama_kelas'] ?></p>
                
                <div class="d-flex align-items-center mt-3">
                    <i class="bi bi-person-video3 me-2 text-success"></i>
                    <small><?= $j['nama_dosen'] ?></small>
                </div>
                <div class="d-flex align-items-center mt-1">
                    <i class="bi bi-calendar-event me-2 text-warning"></i>
                    <small><?= $j['hari'] ?>, <?= $j['jam'] ?> @ <?= $j['nama_ruangan'] ?></small>
                </div>

                <hr>

                <?php if(in_array($j['id'], $sudah_diambil)): ?>
                    <a href="<?= base_url('krs/batal/' . $j['id']) ?>" class="btn btn-outline-danger w-100">
                        <i class="bi bi-x-circle"></i> Batalkan
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('krs/ambil/' . $j['id']) ?>" class="btn btn-primary w-100">
                        <i class="bi bi-plus-circle"></i> Ambil Kelas
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>