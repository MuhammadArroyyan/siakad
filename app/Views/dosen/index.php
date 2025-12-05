<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php if(session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('pesan') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-secondary">Daftar Dosen Pengajar</h5>
        <a href="<?= base_url('dosen/create') ?>" class="btn btn-success btn-sm">
            <i class="bi bi-plus-lg"></i> Tambah Dosen
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>Username Login</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dosen as $d): ?>
                    <tr>
                        <td class="fw-bold"><?= $d['nidn'] ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle p-2 me-2 text-success">
                                    <i class="bi bi-person-video3"></i>
                                </div>
                                <?= $d['nama'] ?>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-secondary"><?= $d['nidn'] ?></span>
                        </td>
                        <td class="text-end">
                            <a href="<?= base_url('dosen/edit/' . $d['nidn']) ?>" class="btn btn-warning btn-sm text-white">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="<?= base_url('dosen/' . $d['nidn']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus dosen ini?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
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