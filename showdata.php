<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="assets/img/AirMinumku.png" />
<title>Tabel Seluruh Data</title>
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
<h1>Tabel Seluruh Data</h1>
<button class="button button1" onclick="location.href = 'index.html';">Kembali ke Halaman Utama</button>
<br>
<table>
<tr>
<th>Kecamatan</th>
<th>Desa</th>
<th>Sumber</th>
<th>Jumlah</th>
<th>Satuan</th>
<th>Tahun</th>
</tr>
<?php
$conn = mysqli_connect("localhost:8111", "root", "1234", "airminumku");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM airminum ORDER BY kecamatan, desa, sumber";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["kecamatan"]. "</td><td>" . $row["desa"] . "</td><td>" . $row["sumber"]. "</td><td>" . $row["jumlah"]. "</td><td>" . $row["satuan"]. "</td><td>" . $row["tahun"]. "</td></tr>";
}
echo "</table>";
} else { echo "<h1>Tabel kosong!</h1>"; }
$conn->close();
?>
</table>
</body>
</html>