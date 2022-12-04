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

echo "<h1><br>Kumpulan data yang dianalisis:</h1>";
$query = "SELECT desa, sumber, jumlah FROM airminum ORDER BY desa, sumber;";
$result = $mysqli->query($query);
while ($row = $result->fetch_row()) {
    echo "<h1>$row[0] $row[1] $row[2]<br></h1>";
}
?>
</body>
</html>