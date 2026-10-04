<?php
// Data Produk disimpan dalam Array PHP
$produk_list = [
    [
        "nama" => "Laptop Productivity","kategori" => "Komputer & Laptop",
        "harga" => 8500000,"stok" => 3
    ],[
        "nama" => "Monitor 24 Inch","kategori" => "Aksesoris",
        "harga" => 1800000,"stok" => 4
    ],
    [
        "nama" => "Keyboard Mechanical","kategori" => "Aksesoris",
        "harga" => 450000,"stok" => 10
    ],
    [
        "nama" => "Wireless Mouse","kategori" => "Aksesoris",
        "harga" => 150000,"stok" => 0
    ],
    [
        "nama" => "External SSD 512GB","kategori" => "Penyimpanan",
        "harga" => 1100000,"stok" => 5
    ],
    [
        "nama" => "Headset Gaming RGB","kategori" => "Audio",
        "harga" => 350000,"stok" => 0
    ]
];

$total_produk = count($produk_list);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <style>
        /* Styling CSS */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f4f6f9;
            color: #333;
        }
        /* Navbar */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
            padding: 20px 40px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .logo {
            font-weight: bold;
            font-size: 20px;
        }
        .nav-links {
            display: flex;
            gap: 20px;
        }
        .nav-links a {
            text-decoration: none;
            color: #555;
            font-weight: 500;
        }
        /* Hero Section */
        .hero {
            background: #171923;
            color: #ffffff;
            margin: 30px auto;
            max-width: 1100px;
            padding: 50px;
            border-radius: 15px;
        }
        .hero h3 {
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }
        .hero h1 {
            font-size: 36px;
            margin-bottom: 15px;
        }
        .hero p {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 25px;
        }
        .btn-hero {
            background: #ffffff;
            color: #171923;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        /* Container Katalog */
        .container {
            max-width: 1100px;
            margin: 0 auto 50px auto;
            padding: 0 20px;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        /* Card Produk */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }
        .product-card {
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            transition: transform 0.2s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        .badge-kategori {
            font-size: 12px;
            background: #e2e8f0;
            padding: 4px 8px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 10px;
        }
        .product-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        /* Harga & Diskon */
        .price-normal {
            text-decoration: line-through;
            color: #888;
            font-size: 14px;
        }
        .price-discount {
            font-size: 18px;
            font-weight: bold;
            color: #2b6cb0;
            margin-bottom: 10px;
        }
        .badge-diskon {
            background: #fed7d7;
            color: #9b2c2c;
            font-size: 11px;
            padding: 2px 6px;
            border-radius: 3px;
            font-weight: bold;
        }
        /* Status Stok */
        .stock-status {
            font-size: 14px;
            margin-bottom: 15px;
        }
        .available { color: #38a169; font-weight: 600; }
        .out-of-stock { color: #e53e3e; font-weight: 600; }
        
        /* Tombol Beli */
        .buy-button {
            display: block;
            width: 100%;
            background: #3182ce;
            color: white;
            text-align: center;
            padding: 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }
        .buy-button:hover {
            opacity: 0.85;
        }
        .buy-button.disabled {
            background: #cbd5e0;
            cursor: not-allowed;
            pointer-events: none;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #ffffff;
            border-top: 1px solid #ddd;
            color: #666;
        }

        /* Responsive Layout (Media Queries) */
        @media (max-width: 900px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar / Header -->
    <nav>
        <div class="logo">Cia Store</div>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">About</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h3>CIA STORE</h3>
        <h1>Simple Tech Store.</h1>
        <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
        <a href="#katalog" class="btn-hero">Lihat Produk</a>
    </div>

    <!-- Konten Utama Katalog -->
    <div class="container" id="katalog">
        <div class="section-header">
            <div>
                <p style="font-size: 12px; color: #718096;">OUR PRODUCTS</p>
                <h2>Katalog Produk</h2>
            </div>
            <div>
                <strong>Total Produk: <?php echo $total_produk; ?></strong>
            </div>
        </div>

        <div class="product-grid">
            <!-- Perulangan PHP untuk menampilkan seluruh produk -->
            <?php foreach ($produk_list as $produk): ?>
                <div class="product-card">
                    <span class="badge-kategori"><?php echo $produk['kategori']; ?></span>
                    <div class="product-title"><?php echo $produk['nama']; ?></div>
                    <?php 
                    if ($produk['harga'] >= 1000000) {
                        $diskon = $produk['harga'] * 0.10;
                        $harga_akhir = $produk['harga'] - $diskon;
                        echo '<span class="badge-diskon">DISKON 10%</span>';
                        echo '<div class="price-normal">Rp' . number_format($produk['harga'], 0, ',', '.') . '</div>';
                        echo '<div class="price-discount">Rp' . number_format($harga_akhir, 0, ',', '.') . '</div>';
                    } else {
                        // Harga normal tanpa diskon
                        echo '<div class="price-discount" style="margin-top: 5px;">Rp' . number_format($produk['harga'], 0, ',', '.') . '</div>';
                    }
                    ?>
                    <!-- Percabangan PHP untuk Status Stok -->
                    <div class="stock-status">
                        <?php if ($produk['stok'] > 0): ?>
                            <span class="available">Tersedia (Stok: <?php echo $produk['stok']; ?>)</span>
                        <?php else: ?>
                            <span class="out-of-stock">Stok Habis</span>
                        <?php endif; ?>
                    </div>
                    <!-- Tombol Beli / Dinonaktifkan Berdasarkan Stok -->
                    <?php if ($produk['stok'] > 0): ?>
                        <a href="#" class="buy-button">Beli Sekarang</a>
                    <?php else: ?>
                        <a href="#" class="buy-button disabled">Stok Habis</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>