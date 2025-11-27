<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php if(session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= session()->getFlashdata('pesan') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-secondary">Jadwal Perkuliahan Aktif</h5>
        <a href="<?= base_url('jadwal/create') ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-calendar-plus"></i> Buat Jadwal
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Hari & Jam</th>
                        <th>Mata Kuliah</th>
                        <th>Kelas</th>
                        <th>Dosen Pengampu</th>
                        <th>Ruangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($jadwal as $j): ?>
                    <tr>
                        <td>
                            <div class="fw-bold"><?= $j['hari'] ?></div>
                            <small class="text-muted"><?= $j['jam'] ?></small>
                        </td>
                        <td>
                            <div class="fw-bold"><?= $j['nama_mata_kuliah'] ?></div>
                            <small class="text-primary"><?= $j['kode_mata_kuliah'] ?> (<?= $j['sks'] ?> SKS)</small>
                        </td>
                        <td><span class="badge bg-warning text-dark"><?= $j['nama_kelas'] ?></span></td>
                        <td><?= $j['nama_dosen'] ?></td>
                        <td><i class="bi bi-geo-alt me-1"></i> <?= $j['nama_ruangan'] ?></td>
                        <td>
                            <form action="<?= base_url('jadwal/' . $j['id']) ?>" method="post" onsubmit="return confirm('Hapus jadwal ini?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>