<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="assets/img/AirMinumku.png" />
<title>Hapus Semua Data pada Tabel</title>
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
<h1>Hapus Semua Data pada Tabel</h1>
<button class="button button1" onclick="location.href = 'index.html';">Kembali ke Halaman Utama</button>
<br>
<?php
$conn = mysqli_connect("localhost:8111", "root", "1234", "airminumku");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "DROP TABLE airminum;

CREATE TABLE airminum 
(
    kecamatan	varchar(30),
    desa	varchar(30),
    sumber	varchar(30),
    jumlah	int,
    satuan	varchar(10),
    tahun	year
);";
$result = $conn->multi_query($sql);
$conn->close();
?>
<h1>Semua data berhasil dihapus!</h1>
</body>
</html>