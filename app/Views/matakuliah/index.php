<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php if(session()->get('errors')): ?>
    <div class="alert alert-danger">
        <ul>
        <?php foreach(session()->get('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
<?php endif; ?>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white py-3">
        <h6 class="m-0 fw-bold text-primary">Tambah Mata Kuliah Baru</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('matakuliah/store') ?>" method="post" class="row g-3">
            <div class="col-md-3">
                <label class="form-label small text-muted">Kode MK</label>
                <input type="text" name="kode_mata_kuliah" class="form-control" placeholder="Cth: WEB001" required>
            </div>
            <div class="col-md-5">
                <label class="form-label small text-muted">Nama Mata Kuliah</label>
                <input type="text" name="nama_mata_kuliah" class="form-control" placeholder="Cth: Pemrograman Web" required>
            </div>
            <div class="col-md-2">
                <label class="form-label small text-muted">SKS</label>
                <select name="sks" class="form-select">
                    <option value="2">2 SKS</option>
                    <option value="3">3 SKS</option>
                    <option value="4">4 SKS</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-plus-lg"></i> Tambah</button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($mk as $m): ?>
                <tr>
                    <td><span class="badge bg-secondary"><?= $m['kode_mata_kuliah'] ?></span></td>
                    <td class="fw-bold"><?= $m['nama_mata_kuliah'] ?></td>
                    <td><?= $m['sks'] ?></td>
                    <td class="text-end">
                        <form action="<?= base_url('matakuliah/' . $m['id_mata_kuliah']) ?>" method="post" class="d-inline" onsubmit="return confirm('Hapus MK ini?');">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>