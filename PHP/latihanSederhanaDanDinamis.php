<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contoh Penggunaan List dalam HTML</title>
</head>
<body>
    <H2>Daftar nomor antrian</H2>
    <ol>
        <?php
        for ($i = 1; $i<= 50; $i++) {
            echo "<li>Antrian ke- $i</li>";
        }
        ?>
    </ol>
    
</body>
</html>