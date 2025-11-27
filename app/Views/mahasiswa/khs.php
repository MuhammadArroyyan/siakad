<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white border-0 shadow">
            <div class="card-body text-center">
                <h6 class="text-white-50">Indeks Prestasi Kumulatif (IPK)</h6>
                <h1 class="display-3 fw-bold mb-0"><?= $ipk ?></h1>
                <small>Total SKS Lulus: <?= $total_sks ?></small>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold">Hasil Studi Semester Ini</h5>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nilai Huruf</th>
                    <th>Bobot</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($khs as $k): ?>
                <tr>
                    <td><?= $k['kode_mata_kuliah'] ?></td>
                    <td class="fw-bold"><?= $k['nama_mata_kuliah'] ?></td>
                    <td><?= $k['sks'] ?></td>
                    <td>
                        <?php if($k['nilai_huruf']): ?>
                            <span class="fw-bold fs-5"><?= $k['nilai_huruf'] ?></span>
                        <?php else: ?>
                            <span class="text-muted">-</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $k['bobot'] ?? '0' ?></td>
                    <td>
                        <?php if($k['nilai_huruf']): ?>
                            <span class="badge bg-success">Selesai</span>
                        <?php else: ?>
                            <span class="badge bg-warning text-dark">Sedang Berjalan</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>