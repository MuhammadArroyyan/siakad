<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Setting Jadwal Baru</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('jadwal/store') ?>" method="post">
                    
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label">Mata Kuliah</label>
                            <select name="id_mata_kuliah" class="form-select" required>
                                <option value="">-- Pilih Mata Kuliah --</option>
                                <?php foreach($mk as $m): ?>
                                    <option value="<?= $m['id_mata_kuliah'] ?>">
                                        <?= $m['kode_mata_kuliah'] ?> - <?= $m['nama_mata_kuliah'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" placeholder="Contoh: TI-A" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dosen Pengampu</label>
                        <select name="nidn" class="form-select" required>
                            <option value="">-- Pilih Dosen --</option>
                            <?php foreach($dosen as $d): ?>
                                <option value="<?= $d['nidn'] ?>">
                                    <?= $d['nama'] ?> (NIDN: <?= $d['nidn'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Ruangan</label>
                            <select name="id_ruangan" class="form-select" required>
                                <?php foreach($ruangan as $r): ?>
                                    <option value="<?= $r['id_ruangan'] ?>"><?= $r['nama_ruangan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Hari</label>
                            <select name="hari" class="form-select" required>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jam</label>
                            <input type="text" name="jam" class="form-control" placeholder="08:00 - 10:00" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="<?= base_url('jadwal') ?>" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Terbitkan Jadwal</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>