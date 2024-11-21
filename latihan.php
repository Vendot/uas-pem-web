<?php
// Variabel untuk menampung hasil
$hasilNilaiHuruf = '';
$hasilGanjilGenap = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proses form Nilai Huruf
    if (isset($_POST['angka'])) {
        $angka = intval($_POST['angka']);
        if ($angka >= 80 && $angka <= 100) {
            $hasilNilaiHuruf = "Nilai Huruf: A";
        } elseif ($angka >= 75 && $angka <= 79) {
            $hasilNilaiHuruf = "Nilai Huruf: B+";
        } elseif ($angka >= 70 && $angka <= 74) {
            $hasilNilaiHuruf = "Nilai Huruf: B";
        } elseif ($angka >= 65 && $angka <= 69) {
            $hasilNilaiHuruf = "Nilai Huruf: C+";
        } elseif ($angka >= 60 && $angka <= 64) {
            $hasilNilaiHuruf = "Nilai Huruf: C";
        } elseif ($angka >= 50 && $angka <= 59) {
            $hasilNilaiHuruf = "Nilai Huruf: D";
        } elseif ($angka >= 0 && $angka <= 49) {
            $hasilNilaiHuruf = "Nilai Huruf: E";
        } else {
            $hasilNilaiHuruf = "Nilai tidak valid";
        }
    }

    // Proses form Ganjil/Genap
    if (isset($_POST['pilihan'])) {
        $pilihan = $_POST['pilihan'];
        if ($pilihan === '1') {
            $hasilGanjilGenap = "Angka Ganjil: ";
            for ($i = 1; $i <= 20; $i++) {
                if ($i % 2 !== 0) {
                    $hasilGanjilGenap .= $i . " ";
                }
            }
        } elseif ($pilihan === '2') {
            $hasilGanjilGenap = "Angka Genap: ";
            for ($i = 20; $i >= 1; $i--) {
                if ($i % 2 === 0) {
                    $hasilGanjilGenap .= $i . " ";
                }
            }
        }
    }
}
?>

<div class="row">
    <h3>Nilai Huruf</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="angka" class="form-label">Angka</label>
            <input type="number" class="form-control" id="angka" name="angka" placeholder="Masukkan angka" max="100" min="0">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php if (!empty($hasilNilaiHuruf)) : ?>
        <div class="mt-3 text-success fw-bold"><?= $hasilNilaiHuruf; ?></div>
    <?php endif; ?>
</div>

<div class="row mt-4">
    <h3>Ganjil/Genap</h3>
    <form method="POST">
        <div class="mb-3">
            <select class="form-select" name="pilihan">
                <option value="" selected>Pilih Ganjil/Genap</option>
                <option value="1">Ganjil</option>
                <option value="2">Genap</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php if (!empty($hasilGanjilGenap)) : ?>
        <div class="mt-3 text-success fw-bold"><?= $hasilGanjilGenap; ?></div>
    <?php endif; ?>
</div>