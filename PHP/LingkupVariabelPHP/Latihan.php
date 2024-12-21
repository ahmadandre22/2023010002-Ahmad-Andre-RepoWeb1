<?php
// Variabel global
$globalVar = "Ini adalah variabel global.";

function lingkupVariabel() {
    // Variabel lokal
    $localVar = "Ini adalah variabel lokal.";

    // Mengakses variabel global menggunakan keyword 'global'
    global $globalVar;

    // Menampilkan variabel menggunakan echo
    echo "Menggunakan echo:<br>";
    echo $localVar . "<br>"; // Mengakses variabel lokal
    echo $globalVar . "<br>"; // Mengakses variabel global

    // Menampilkan variabel menggunakan print
    print "Menggunakan print:<br>";
    print $localVar . "<br>";
    print $globalVar . "<br>";
}

// Panggil fungsi untuk menampilkan output
lingkupVariabel();
?>
