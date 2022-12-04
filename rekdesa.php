<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="assets/img/AirMinumku.png" />
<title>Rekomendasi Desa</title>
<style>
h1, table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
.button {
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 4px 2px;
cursor: pointer;
}
.button1 {background-color: #588c7e;} /* Green */
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>

<body>
<h1>Rekomendasi Desa</h1>
<button class="button button1" onclick="location.href = 'index.html';">Kembali ke Halaman Utama</button>
<br>
<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost:8111", "root", "1234", "airminumku");

$query = "SELECT count(desa) OVER() desa FROM airminum GROUP BY desa;";
$result = $mysqli->query($query);
$row = $result->fetch_row();
$jumlahdesa = $row[0];
echo "<h1>Jumlah desa: $jumlahdesa </h1>";

$query = "SELECT count(kecamatan) OVER() FROM airminum GROUP BY kecamatan;";
$result = $mysqli->query($query);
$row = $result->fetch_row();
$jumlahkecamatan = $row[0];
echo "<h1>Jumlah kecamatan: $jumlahkecamatan </h1>";

$query = "SELECT count(sumber) OVER() FROM airminum GROUP BY sumber;";
$result = $mysqli->query($query);
$row = $result->fetch_row();
$jumlahsumber = $row[0];
echo "<h1>Jumlah sumber: $jumlahsumber </h1>";

echo "<h1><br>Tes data untuk dimasukkan ke matriks:</h1>";
$query = "SELECT desa, sumber, jumlah FROM airminum ORDER BY desa, sumber;";
$result = $mysqli->query($query);
$matriks = array(array());
echo "<h1>Matriks mula-mula:</h1>";
for($i = 0; $i < $jumlahdesa; $i++){
    for($j = 0; $j < $jumlahsumber; $j++){
        $matriks[$i][$j] = 0;
        echo $matriks[$i][$j];
    }
    echo "<br>";
}

$count = 0;
$value = $jumlahdesa + 1;
$tampungvalue = -1;
while ($row = $result->fetch_row()) {
    if ($row[1] == "Air hujan") {
        $value = 0;
        $jumlah = $row[2];
        if($value - $tampungvalue <= 0){
            $count = $count + 1;
        }
        $matriks[$count][$value] = $jumlah;
        echo "<h1>$count $value $jumlah</h1>";
    } elseif($row[1] == "Air isi ulang") {
        $value = 1;
        $jumlah = $row[2];
        if($value - $tampungvalue <= 0){
            $count = $count + 1;
        }
        $matriks[$count][$value] = $jumlah;
        echo "<h1>$count $value $jumlah</h1>";
    } elseif($row[1] == "Air kemasan bermerek") {
        $value = 2;
        $jumlah = $row[2];
        if($value - $tampungvalue <= 0){
            $count = $count + 1;
        }
        $matriks[$count][$value] = $jumlah;
        echo "<h1>$count $value $jumlah</h1>";
    } elseif($row[1] == "Air sungan/danau/waduk") {
        $value = 3;
        $jumlah = $row[2];
        if($value - $tampungvalue <= 0){
            $count = $count + 1;
        }
        $matriks[$count][$value] = $jumlah;
        echo "<h1>$count $value $jumlah</h1>";
    } elseif($row[1] == "Lainnya") {
        $value = 4;
        $jumlah = $row[2];
        if($value - $tampungvalue <= 0){
            $count = $count + 1;
        }
        $matriks[$count][$value] = $jumlah;
        echo "<h1>$count $value $jumlah</h1>";
    } elseif($row[1] == "Leding eceran") {
        $value = 5;
        $jumlah = $row[2];
        if($value - $tampungvalue <= 0){
            $count = $count + 1;
        }
        $matriks[$count][$value] = $jumlah;
        echo "<h1>$count $value $jumlah</h1>";
    } elseif($row[1] == "Leding meteran") {
        $value = 6;
        $jumlah = $row[2];
        if($value - $tampungvalue <= 0){
            $count = $count + 1;
        }
        $matriks[$count][$value] = $jumlah;
        echo "<h1>$count $value $jumlah</h1>";
    } elseif($row[1] == "Mata air tak terlindung") {
        $value = 7;
        $jumlah = $row[2];
        if($value - $tampungvalue <= 0){
            $count = $count + 1;
        }
        $matriks[$count][$value] = $jumlah;
        echo "<h1>$count $value $jumlah</h1>";
    } elseif($row[1] == "Mata air terlindung") {
        $value = 8;
        $jumlah = $row[2];
        if($value - $tampungvalue <= 0){
            $count = $count + 1;
        }
        $matriks[$count][$value] = $jumlah;
        echo "<h1>$count $value $jumlah</h1>";
    } elseif($row[1] == "Sumur bor/pompa") {
        $value = 9;
        $jumlah = $row[2];
        if($value - $tampungvalue <= 0){
            $count = $count + 1;
        }
        $matriks[$count][$value] = $jumlah;
        echo "<h1>$count $value $jumlah</h1>";
    } elseif($row[1] == "Sumur tak terlindung") {
        $value = 10;
        $jumlah = $row[2];
        if($value - $tampungvalue <= 0){
            $count = $count + 1;
        }
        $matriks[$count][$value] = $jumlah;
        echo "<h1>$count $value $jumlah</h1>";
    } elseif($row[1] == "Sumur terlindung") {
        $value = 11;
        $jumlah = $row[2];
        if($value - $tampungvalue <= 0){
            $count = $count + 1;
        }
        $matriks[$count][$value] = $jumlah;
        echo "<h1>$count $value $jumlah</h1>";
    }
    $tampungvalue = $value; 
}
echo "<h1>Matriks baru:</h1>";
for($i = 0; $i < $jumlahdesa; $i++){
    for($j = 0; $j < $jumlahsumber; $j++){
        echo $matriks[$i][$j] . "&emsp;&emsp;";
    }
    echo "<br>";
}

// Mencari nilai pembagi

// Mencari keputusan ternormalisasi

// Tabel keputusan ternormalisasi dan terbobot

// Hasil perhitungan solusi ideal positif dan solusi ideal negatif

// Nilai separation measure D+ dan D-

// Hasil perhitungan kedekatan nilai preferensi

// Hasil akhir

echo "<h1><br>Kumpulan data yang dianalisis:</h1>";
$query = "SELECT desa, sumber, jumlah FROM airminum ORDER BY desa, sumber;";
$result = $mysqli->query($query);
while ($row = $result->fetch_row()) {
    echo "<h1>$row[0] $row[1] $row[2]<br></h1>";
}
?>
</body>
</html>