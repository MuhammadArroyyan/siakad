<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'SIAKAD Pro' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .sidebar { min-height: 100vh; background: #2c3e50; color: white; }
        .sidebar a { color: #bdc3c7; text-decoration: none; padding: 10px 20px; display: block; }
        .sidebar a:hover, .sidebar a.active { background: #34495e; color: white; border-left: 4px solid #3498db; }
        .content { background: #f8f9fa; min-height: 100vh; padding: 20px; }
        .card-icon { font-size: 2.5rem; opacity: 0.5; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar p-0">
                <div class="d-flex align-items-center justify-content-center py-4 border-bottom border-secondary">
                    <h4 class="m-0"><i class="bi bi-mortarboard-fill"></i> NOVA-X</h4>
                </div>
                
                <div class="mt-3">
                    <small class="text-uppercase text-muted px-3">Menu Utama</small>
                    <a href="<?= base_url('dashboard') ?>" class="active">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>

                    <?php if(session()->get('role') == 'admin'): ?>
                        <a href="<?= base_url('mahasiswa') ?>"><i class="bi bi-people me-2"></i> Mahasiswa</a>
                        <a href="<?= base_url('dosen') ?>"><i class="bi bi-person-video3 me-2"></i> Dosen</a>
                        <a href="<?= base_url('matakuliah') ?>"><i class="bi bi-book me-2"></i> Mata Kuliah</a>
                        <a href="<?= base_url('ruangan') ?>"><i class="bi bi-building me-2"></i> Ruangan</a>
                        <a href="<?= base_url('jadwal') ?>"><i class="bi bi-calendar-week me-2"></i> Jadwal Kuliah</a>
                    <?php endif; ?>

                    <?php if(session()->get('role') == 'dosen'): ?>
                        <a href="<?= base_url('dosen/jadwal') ?>"><i class="bi bi-calendar-check me-2"></i> Jadwal Mengajar</a>
                    <?php endif; ?>

                    <?php if(session()->get('role') == 'mahasiswa'): ?>
                        <a href="<?= base_url('krs') ?>"><i class="bi bi-card-checklist me-2"></i> Rencana Studi (KRS)</a>
                        <a href="<?= base_url('khs') ?>"><i class="bi bi-trophy me-2"></i> Hasil Studi (KHS)</a>
                    <?php endif; ?>

                    <div class="border-top border-secondary mt-3 pt-3">
                        <a href="<?= base_url('logout') ?>" class="text-danger">
                            <i class="bi bi-box-arrow-left me-2"></i> Logout
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-10 content">
                <nav class="navbar navbar-light bg-white shadow-sm mb-4 rounded px-3">
                    <span class="navbar-brand mb-0 h1"><?= $title ?? 'Dashboard' ?></span>
                    <div class="d-flex align-items-center">
                        <span class="me-2">Halo, <strong><?= session()->get('username') ?></strong> (<?= ucfirst(session()->get('role')) ?>)</span>
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                            <?= strtoupper(substr(session()->get('username'), 0, 1)) ?>
                        </div>
                    </div>
                </nav>

                <?= $this->renderSection('content') ?>
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 3000);
    </script>
</body>
</html>