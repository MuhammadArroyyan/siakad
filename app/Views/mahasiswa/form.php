<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold"><?= isset($mhs) ? 'Edit' : 'Tambah' ?> Mahasiswa</h5>
            </div>
            <div class="card-body">
                
                <?php $validation = \Config\Services::validation(); ?>
                
                <form action="<?= isset($mhs) ? base_url('mahasiswa/update/' . $mhs['nim']) : base_url('mahasiswa/store') ?>" method="post">
                    
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" 
                               class="form-control <?= $validation->hasError('nim') ? 'is-invalid' : '' ?>" 
                               value="<?= isset($mhs) ? $mhs['nim'] : old('nim') ?>"
                               <?= isset($mhs) ? 'readonly' : '' ?>>
                        <div class="invalid-feedback"><?= $validation->getError('nim') ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" 
                               class="form-control" 
                               value="<?= isset($mhs) ? $mhs['nama'] : old('nama') ?>" required>
                    </div>

                    <?php if(!isset($mhs)): ?>
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle-fill"></i> Password default untuk login adalah <strong>123456</strong>
                    </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan Data
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>