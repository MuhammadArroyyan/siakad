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
        <h5 class="mb-0 fw-bold text-secondary">Daftar Mahasiswa</h5>
        <a href="<?= base_url('mahasiswa/create') ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> Tambah Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Akun Login</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($mahasiswa as $m): ?>
                    <tr>
                        <td class="fw-bold"><?= $m['nim'] ?></td>
                        <td><?= $m['nama'] ?></td>
                        <td>
                            <span class="badge bg-info text-dark">
                                <i class="bi bi-person-badge"></i> Aktif
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="<?= base_url('mahasiswa/edit/' . $m['nim']) ?>" class="btn btn-warning btn-sm text-white">
                                <i class="bi bi-pencil"></i>
                            </a>
                            
                            <form action="<?= base_url('mahasiswa/' . $m['nim']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data ini? Akun login juga akan terhapus.');">
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