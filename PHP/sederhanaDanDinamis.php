<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contoh Penggunaan List dalam HTML</title>
</head>
<body>
    <H2>Daftar Nama Barang</H2>
    <ol>
        <?php
        for ($i = 1; $i<= 50; $i++) {
            echo "<li>Barang ke $i</li>";
        }
        ?>
    </ol>
    
</body>
</html>