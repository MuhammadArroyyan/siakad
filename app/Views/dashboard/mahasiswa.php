<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body text-center">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                    <i class="bi bi-person-circle fs-1 text-secondary"></i>
                </div>
                <h5 class="fw-bold"><?= session()->get('username') ?></h5>
                <p class="text-muted mb-1">Mahasiswa Aktif</p>
                <span class="badge bg-primary">NIM: <?= session()->get('kode_peran') ?></span>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">Pengumuman Akademik</div>
            <div class="card-body">
                <ul class="list-group list-group-flush small">
                    <li class="list-group-item px-0"><i class="bi bi-calendar-event me-2 text-danger"></i> Batas Pengisian KRS: 30 Des</li>
                    <li class="list-group-item px-0"><i class="bi bi-info-circle me-2 text-info"></i> Jadwal UAS Rilis</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Progress Akademik</h5>
                <small class="text-muted">Grafik IPK per Semester</small>
            </div>
            <div class="card-body">
                <canvas id="gpaChart" height="120"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('gpaChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            // Data Dummy dulu (Nanti kita ambil dari database real)
            labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5'],
            datasets: [{
                label: 'Indeks Prestasi (IP)',
                data: [3.2, 3.4, 3.1, 3.6, 3.8],
                borderColor: '#3498db',
                backgroundColor: 'rgba(52, 152, 219, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4 // Membuat garis melengkung halus
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false,
                    min: 0,
                    max: 4.0
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>

<?= $this->endSection() ?>