<?php
// Tipe data Integer
$usia = 19;

// Tipe data Float
$nilai = 87.5;

// Tipe data String
$nama = "Andre";

// Tipe data Array
$hobi = ["Belajar", "Tidur", "Main"];

// Menampilkan data
echo "Nama: $nama\n";
echo "Usia: $usia tahun\n";
echo "Nilai: $nilai\n";
echo "Hobi: " . implode(", ", $hobi) . "\n";

// Operasi menggunakan tipe data
$rataRataNilai = ($nilai + 90 + 85) / 3; // Operasi dengan float
echo "Rata-rata nilai: $rataRataNilai\n";
?>
