<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Angsuran Mobil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Header dengan logo dan navigasi -->
    <nav class="navbar navbar-expand-lg navbar-light bg-black">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="logo1.jpeg" alt="FrannChasca" width="50">
                <h1 class="h4 m-0" style="color: white;">FrannChasca</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #ffcf00; color: white;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#" style="color: white;">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: white;">Tentang Perusahaan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: white;">Kontak Perusahaan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Foto Slider -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="car1.jpg" class="d-block w-100" alt="Car 1">
            </div>
            <div class="carousel-item">
                <img src="car2.jpg" class="d-block w-100" alt="Car 2">
            </div>
            <div class="carousel-item">
                <img src="car3.jpg" class="d-block w-100" alt="Car 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Form Input -->
    <div class="container mt-5">
        <h2>Perhitungan Angsuran Mobil</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="hargaMobil" class="form-label">Harga Mobil</label>
                <input type="number" class="form-control" id="hargaMobil" name="hargaMobil" required>
            </div>
            <div class="mb-3">
                <label for="dp" class="form-label">DP (Persen)</label>
                <input type="number" class="form-control" id="dp" name="dp" required>
            </div>
            <div class="mb-3">
                <label for="tenor" class="form-label">Tenor (Tahun)</label>
                <input type="number" class="form-control" id="tenor" name="tenor" required>
            </div>
            <button type="submit" class="btn btn-primary"style="background-color: #ffcf00; border: black; color: black;">Hitung Angsuran</button>
        </form>

        <!-- Perhitungan -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mengambil data input
            $hargaMobil = $_POST['hargaMobil'];
            $dpPercent = $_POST['dp'];
            $tenorTahun = $_POST['tenor'];

            // Menghitung jumlah bulan tenor
            $tenorBulan = $tenorTahun * 12;

            // Menghitung bunga 20%
            $bunga = 0.2 * $hargaMobil;

            // Menghitung DP nominal
            $dpNominal = ($dpPercent / 100) * $hargaMobil;

            // Menghitung total pinjaman
            $totalPinjaman = ($hargaMobil + $bunga) - $dpNominal;

            // Menghitung angsuran per bulan
            $angsuranPerBulan = $totalPinjaman / $tenorBulan;

            // Menampilkan hasil perhitungan
            echo "<div class='mt-4'>
                    <h4>Hasil Perhitungan</h4>
                    <p>Harga Mobil: Rp" . number_format($hargaMobil, 2, ',', '.') . "</p>
                    <p>DP: $dpPercent% (Rp" . number_format($dpNominal, 2, ',', '.') . ")</p>
                    <p>Bunga (20%): Rp" . number_format($bunga, 2, ',', '.') . "</p>
                    <p>Tenor: $tenorTahun tahun ($tenorBulan bulan)</p>
                    <p><strong>Angsuran per bulan: Rp" . number_format($angsuranPerBulan, 2, ',', '.') . "</strong></p>
                  </div>";
        }
        ?>
    </div>
    
    <!-- Footer -->
    <footer style="background-color: #f8f9fa; padding: 20px 0; margin-top: 50px;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 15px;">
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
                
                <!-- Tentang Kami -->
                <div style="flex: 1 1 30%; margin-bottom: 20px;">
                    <h5 style="font-size: 18px; color: #333;">Tentang Kami</h5>
                    <p style="color: #555;">Perusahaan kami menyediakan layanan terbaik untuk pembiayaan mobil. Kami mengutamakan transparansi dan kenyamanan pelanggan dalam setiap transaksi.</p>
                </div>

                <!-- Menu -->
                <div style="flex: 1 1 30%; margin-bottom: 20px;">
                    <h5 style="font-size: 18px; color: #333;">Menu</h5>
                    <ul style="list-style: none; padding: 0; color: #555;">
                        <li><a href="#" style="color: #007bff; text-decoration: none;">Beranda</a></li>
                        <li><a href="#" style="color: #007bff; text-decoration: none;">Tentang Perusahaan</a></li>
                        <li><a href="#" style="color: #007bff; text-decoration: none;">Kontak Perusahaan</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div style="flex: 1 1 30%; margin-bottom: 20px;">
                    <h5 style="font-size: 18px; color: #333;">Kontak</h5>
                    <ul style="list-style: none; padding: 0; color: #555;">
                        <li>Email: <a href="mailto:frannchasca@gmail.com" style="color: #007bff; text-decoration: none;">frannchasca@gmail.com</a></li>
                        <li>Telp: <a href="tel:+621234567" style="color: #007bff; text-decoration: none;">+62 123 4567</a></li>
                        <li>Alamat: Jl.Diran No.11, Batu</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div style="text-align: center; background-color: #343a40; color: white; padding: 10px;">
            <p style="margin: 0;">© <?php echo date("Y"); ?> FrannChasca. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
