<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="row">
    <?php foreach($jadwal as $j): ?>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-3 hover-effect">
            <div class="card-body text-center">
                <h5 class="fw-bold"><?= $j['nama_mata_kuliah'] ?></h5>
                <span class="badge bg-info text-dark mb-3">Kelas <?= $j['nama_kelas'] ?></span>
                
                <p class="text-muted small">
                    <i class="bi bi-clock"></i> <?= $j['hari'] ?>, <?= $j['jam'] ?><br>
                    <i class="bi bi-geo-alt"></i> <?= $j['nama_ruangan'] ?>
                </p>

                <a href="<?= base_url('dosen/input/' . $j['id']) ?>" class="btn btn-primary w-100">
                    <i class="bi bi-pencil-square"></i> Input Nilai
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>