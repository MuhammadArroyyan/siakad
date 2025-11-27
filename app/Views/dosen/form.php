<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold"><?= isset($dosen) ? 'Edit' : 'Tambah' ?> Dosen</h5>
            </div>
            <div class="card-body">
                
                <?php $validation = \Config\Services::validation(); ?>
                
                <form action="<?= isset($dosen) ? base_url('dosen/update/' . $dosen['nidn']) : base_url('dosen/store') ?>" method="post">
                    
                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <input type="text" name="nidn" 
                               class="form-control <?= $validation->hasError('nidn') ? 'is-invalid' : '' ?>" 
                               value="<?= isset($dosen) ? $dosen['nidn'] : old('nidn') ?>"
                               <?= isset($dosen) ? 'readonly' : '' ?>> <div class="invalid-feedback"><?= $validation->getError('nidn') ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap & Gelar</label>
                        <input type="text" name="nama" 
                               class="form-control" 
                               value="<?= isset($dosen) ? $dosen['nama'] : old('nama') ?>" required>
                    </div>

                    <?php if(!isset($dosen)): ?>
                    <div class="alert alert-success bg-opacity-10 border-success text-success">
                        <i class="bi bi-check-circle-fill me-2"></i> 
                        Akun login akan dibuat otomatis dengan username: <strong>dosen[NIDN]</strong>
                    </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="<?= base_url('dosen') ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Simpan Dosen
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>