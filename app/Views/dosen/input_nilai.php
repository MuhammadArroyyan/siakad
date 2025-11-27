<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold">Penilaian: <?= $jadwal['nama_mata_kuliah'] ?> (<?= $jadwal['nama_kelas'] ?>)</h4>
    <a href="<?= base_url('dosen/jadwal') ?>" class="btn btn-secondary btn-sm">Kembali</a>
</div>

<?php if(session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
<?php endif; ?>

<form action="<?= base_url('dosen/simpan_nilai') ?>" method="post">
    <input type="hidden" name="id_jadwal" value="<?= $jadwal['id'] ?>">
    
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th style="width: 150px;">Nilai Angka (0-100)</th>
                        <th>Konversi Huruf</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($mahasiswa as $m): ?>
                    <tr>
                        <td><?= $m['nim'] ?></td>
                        <td class="fw-bold"><?= $m['nama'] ?></td>
                        <td>
                            <input type="number" name="nilai_angka[<?= $m['id_rencana_studi'] ?>]" 
                                   class="form-control text-center fw-bold" 
                                   min="0" max="100" 
                                   value="<?= $m['nilai_angka'] ?>">
                        </td>
                        <td>
                            <?php if($m['nilai_huruf']): ?>
                                <span class="badge bg-primary fs-6"><?= $m['nilai_huruf'] ?></span>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white text-end py-3">
            <button type="submit" class="btn btn-success btn-lg">
                <i class="bi bi-save"></i> Simpan Semua Nilai
            </button>
        </div>
    </div>
</form>
<?= $this->endSection() ?>