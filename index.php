<?php
$harga_mobil = "";
$dp_persen = "";
$tenor_tahun = "";
$hasil = null;
$error_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $harga_mobil = isset($_POST['harga_mobil']) ? floatval($_POST['harga_mobil']) : 0;
    $dp_persen = isset($_POST['dp_persen']) ? floatval($_POST['dp_persen']) : 0;
    $tenor_tahun = isset($_POST['tenor_tahun']) ? intval($_POST['tenor_tahun']) : 0;

    if ($harga_mobil <= 0) {
        $error_msg = "Harga mobil harus diisi dengan angka yang valid!";
    } elseif ($dp_persen <= 0) {
        $error_msg = "Silakan pilih persentase DP terlebih dahulu!";
    } elseif ($tenor_tahun <= 0) {
        $error_msg = "Silakan pilih tenor (tahun) terlebih dahulu!";
    } else {
   
        $total_bunga = 0.20 * $harga_mobil;


        $nominal_dp = ($dp_persen / 100) * $harga_mobil;

 
        $jumlah_bulan = $tenor_tahun * 12;

        $sisa_hutang = ($harga_mobil + $total_bunga) - $nominal_dp;
        $jumlah_angsuran = $sisa_hutang / $jumlah_bulan;

        $hasil = [
            'harga_mobil' => $harga_mobil,
            'dp_persen' => $dp_persen,
            'nominal_dp' => $nominal_dp,
            'tenor_tahun' => $tenor_tahun,
            'jumlah_bulan' => $jumlah_bulan,
            'total_bunga' => $total_bunga,
            'jumlah_angsuran' => $jumlah_angsuran
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Astra Indonesia - Kalkulator Angsuran</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header id="mainHeader">
        <div class="topbar d-flex justify-content-between align-items-center">
            <div>
                <i class="bi bi-envelope-fill me-2"></i>info@astraindonesia.com
                <i class="bi bi-telephone-fill ms-4 me-2"></i>+0123 456 789
            </div>
            <div class="d-none d-md-block">
                <a href="#" class="text-white ms-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white ms-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white ms-3"><i class="bi bi-twitter-x"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">PT Astra Indonesia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link" href="#heroCarousel">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#kalkulator">Kalkulator</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#empat">Contact</a></li>
                    </ul>
                    <a href="#kalkulator" class="btn-donate">Simulasi Kredit</a>
                </div>
            </div>
        </nav>
    </header>

    <div id="heroCarousel" class="carousel slide carousel-fade hero-slider" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('gambar1.jpg');">
                <div class="carousel-caption">
                    <h5 class="text-uppercase mb-3" style="letter-spacing: 5px;">Warisan Masa Depan</h5>
                    <h1 class="display-1 fw-bold">Solusi Kredit<br>Mobil Terbaik</h1>
                    <p class="lead px-md-5">Wujudkan impian memiliki kendaraan pribadi dengan cicilan ringan dan transparan.</p>
                    <a href="#kalkulator" class="btn btn-success btn-lg mt-3">Hitung Angsuran</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('gambar2.jpg');">
                <div class="carousel-caption">
                    <h5 class="text-uppercase mb-3" style="letter-spacing: 5px;">Aksi Nyata</h5>
                    <h1 class="display-1 fw-bold">Proses Cepat<br>& Terpercaya</h1>
                    <p class="lead px-md-5">Nikmati kemudahan layanan pembiayaan mobil baru dan bekas bersama kami.</p>
                    <a href="#kalkulator" class="btn btn-success btn-lg mt-3">Hitung Angsuran</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('gambar3.jpg');">
                <div class="carousel-caption">
                    <h5 class="text-uppercase mb-3" style="letter-spacing: 5px;">Inovasi Modern</h5>
                    <h1 class="display-1 fw-bold">Simulasi Kredit<br>Otomatis</h1>
                    <p class="lead px-md-5">Hitung rincian bunga, DP, dan cicilan bulanan Anda secara akurat seketika.</p>
                    <a href="#kalkulator" class="btn btn-success btn-lg mt-3">Hitung Angsuran</a>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    
    <section class="about-section py-5" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1553440569-bcc63803a83d?q=80&w=1000" class="img-fluid rounded shadow" alt="Mobil Impian">
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <span class="about-badge">Tentang Kami</span>
                    <h2 class="about-title display-6">Mitra Terpercaya Pembiayaan Kendaraan Anda</h2>
                    <p class="text-muted mt-3">PT Astra Indonesia hadir untuk memberikan kemudahan dalam pembiayaan kendaraan impian Anda. Dengan sistem perhitungan yang transparan, aman, dan mudah diakses kapan saja.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="kalkulator" class="py-5 bg-white border-top border-bottom">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">Simulasi Kredit</span>
                <h2 class="section-title">Kalkulator Penghitung Angsuran Mobil</h2>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm p-4 border">
                        
                        <?php if (!empty($error_msg)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $error_msg; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="">

                            <div class="mb-3 row">
                                <label for="harga_mobil" class="col-sm-3 col-form-label fw-semibold">Harga Mobil</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" id="harga_mobil" name="harga_mobil" value="<?php echo htmlspecialchars($harga_mobil); ?>" placeholder="Contoh: 150000000" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="dp_persen" class="col-sm-3 col-form-label fw-semibold">DP (%)</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="dp_persen" name="dp_persen" required>
                                        <option value="" disabled <?php if($dp_persen == "") echo "selected"; ?>>Pilih Persentase DP</option>
                                        <option value="10" <?php if($dp_persen == 10) echo "selected"; ?>>10%</option>
                                        <option value="20" <?php if($dp_persen == 20) echo "selected"; ?>>20%</option>
                                        <option value="30" <?php if($dp_persen == 30) echo "selected"; ?>>30%</option>
                                        <option value="40" <?php if($dp_persen == 40) echo "selected"; ?>>40%</option>
                                        <option value="50" <?php if($dp_persen == 50) echo "selected"; ?>>50%</option>
                                        <option value="60" <?php if($dp_persen == 60) echo "selected"; ?>>60%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-3 col-form-label fw-semibold">Tenor</label>
                                <div class="col-sm-9 d-flex align-items-center gap-3 flex-wrap pt-2">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tenor_tahun" id="tenor<?php echo $i; ?>" value="<?php echo $i; ?>" <?php if($tenor_tahun == $i) echo "checked"; ?> required>
                                            <label class="form-check-label" for="tenor<?php echo $i; ?>">
                                                <?php echo $i; ?> Tahun
                                            </label>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success px-5 py-2 fw-bold">Hitung Angsuran</button>
                            </div>
                        </form>

                        <?php if ($hasil): ?>
                            <hr class="my-4">
                            <div class="bg-light p-4 border rounded">
                                <h5 class="fw-bold text-success mb-3">Hasil Rincian Simulasi Kredit:</h5>
                                <table class="table table-sm table-borderless mb-0">
                                    <tr>
                                        <td width="35%">Harga Mobil</td>
                                        <td width="5%">:</td>
                                        <td><strong>Rp <?php echo number_format($hasil['harga_mobil'], 0, ',', '.'); ?></strong></td>
                                    </tr> 
                                    <tr>
                                        <td>DP (<?php echo $hasil['dp_persen']; ?>%)</td>
                                        <td>:</td>
                                        <td>Rp <?php echo number_format($hasil['nominal_dp'], 0, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tenor</td>
                                        <td>:</td>
                                        <td><?php echo $hasil['tenor_tahun']; ?> Tahun (<?php echo $hasil['jumlah_bulan']; ?> Bulan)</td>
                                    </tr>
                                    <tr>
                                        <td>Total Bunga (20%)</td>
                                        <td>:</td>
                                        <td>Rp <?php echo number_format($hasil['total_bunga'], 0, ',', '.'); ?></td>
                                    </tr>
                                    <tr class="table-active border-top">
                                        <td class="pt-3"><strong>Jumlah Angsuran</strong></td>
                                        <td class="pt-3">:</td>
                                        <td class="pt-3"><strong class="text-danger fs-5">Rp <?php echo number_format($hasil['jumlah_angsuran'], 0, ',', '.'); ?> / Bulan</strong></td>
                                    </tr>
                                </table>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">
        <div id="footer-main">
            <div class="container">
                <div class="row g-5" id="empat">
                    <div class="col-md-4">
                        <h6>Tentang Kami</h6>
                        <p>PT Astra Indonesia menyediakan layanan simulasi kredit dan pembiayaan kendaraan terpercaya di Indonesia.</p>
                    </div>
                    <div class="col-md-4">
                        <h6>Layanan Kami</h6>
                        <ul>
                            <li><a href="#kalkulator">Kredit Mobil Baru</a></li>
                            <li><a href="#kalkulator">Simulasi Cicilan</a></li>
                            <li><a href="#about">Konsultasi Pembiayaan</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h6>Kontak Kami</h6>
                        <p class="small mb-1"><i class="bi bi-geo-alt me-2"></i>Jl. Sudirman No. 45, Jakarta Pusat</p>
                        <p class="small mb-1"><i class="bi bi-envelope me-2"></i>info@astraindonesia.com</p>
                        <p class="small"><i class="bi bi-telephone me-2"></i>(021) 555-8899</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer-bottom">
            <div class="container d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    <a href="#" class="text-success fw-bold text-decoration-none me-1"><i class="bi bi-shield-check me-1"></i>PT Astra Indonesia</a>
                    &copy; 2026. All Rights Reserved.
                </div>
                <div class="footer-social">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="btn-up"><i class="bi bi-arrow-up"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.onscroll = function() {
            var header = document.getElementById("mainHeader");
            if (window.pageYOffset > 80) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        };
    </script>
</body>
</html>
