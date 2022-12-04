<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/x-icon" href="assets/img/AirMinumku.png" />
    <title>Rekomendasi Desa</title>
    <style>
        h1,
        table {
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

        .button1 {
            background-color: #588c7e;
        }

        /* Green */
        tr:nth-child(even) {
            background-color: #f2f2f2
        }
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
    for ($i = 0; $i < $jumlahdesa; $i++) {
        for ($j = 0; $j < $jumlahsumber; $j++) {
            $matriks[$i][$j] = 0.0;
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
            if ($value - $tampungvalue <= 0) {
                $count = $count + 1;
            }
            $matriks[$count][$value] = $jumlah;
            echo "<h1>$count $value $jumlah</h1>";
        } elseif ($row[1] == "Air isi ulang") {
            $value = 1;
            $jumlah = $row[2];
            if ($value - $tampungvalue <= 0) {
                $count = $count + 1;
            }
            $matriks[$count][$value] = $jumlah;
            echo "<h1>$count $value $jumlah</h1>";
        } elseif ($row[1] == "Air kemasan bermerek") {
            $value = 2;
            $jumlah = $row[2];
            if ($value - $tampungvalue <= 0) {
                $count = $count + 1;
            }
            $matriks[$count][$value] = $jumlah;
            echo "<h1>$count $value $jumlah</h1>";
        } elseif ($row[1] == "Air sungan/danau/waduk") {
            $value = 3;
            $jumlah = $row[2];
            if ($value - $tampungvalue <= 0) {
                $count = $count + 1;
            }
            $matriks[$count][$value] = $jumlah;
            echo "<h1>$count $value $jumlah</h1>";
        } elseif ($row[1] == "Lainnya") {
            $value = 4;
            $jumlah = $row[2];
            if ($value - $tampungvalue <= 0) {
                $count = $count + 1;
            }
            $matriks[$count][$value] = $jumlah;
            echo "<h1>$count $value $jumlah</h1>";
        } elseif ($row[1] == "Leding eceran") {
            $value = 5;
            $jumlah = $row[2];
            if ($value - $tampungvalue <= 0) {
                $count = $count + 1;
            }
            $matriks[$count][$value] = $jumlah;
            echo "<h1>$count $value $jumlah</h1>";
        } elseif ($row[1] == "Leding meteran") {
            $value = 6;
            $jumlah = $row[2];
            if ($value - $tampungvalue <= 0) {
                $count = $count + 1;
            }
            $matriks[$count][$value] = $jumlah;
            echo "<h1>$count $value $jumlah</h1>";
        } elseif ($row[1] == "Mata air tak terlindung") {
            $value = 7;
            $jumlah = $row[2];
            if ($value - $tampungvalue <= 0) {
                $count = $count + 1;
            }
            $matriks[$count][$value] = $jumlah;
            echo "<h1>$count $value $jumlah</h1>";
        } elseif ($row[1] == "Mata air terlindung") {
            $value = 8;
            $jumlah = $row[2];
            if ($value - $tampungvalue <= 0) {
                $count = $count + 1;
            }
            $matriks[$count][$value] = $jumlah;
            echo "<h1>$count $value $jumlah</h1>";
        } elseif ($row[1] == "Sumur bor/pompa") {
            $value = 9;
            $jumlah = $row[2];
            if ($value - $tampungvalue <= 0) {
                $count = $count + 1;
            }
            $matriks[$count][$value] = $jumlah;
            echo "<h1>$count $value $jumlah</h1>";
        } elseif ($row[1] == "Sumur tak terlindung") {
            $value = 10;
            $jumlah = $row[2];
            if ($value - $tampungvalue <= 0) {
                $count = $count + 1;
            }
            $matriks[$count][$value] = $jumlah;
            echo "<h1>$count $value $jumlah</h1>";
        } elseif ($row[1] == "Sumur terlindung") {
            $value = 11;
            $jumlah = $row[2];
            if ($value - $tampungvalue <= 0) {
                $count = $count + 1;
            }
            $matriks[$count][$value] = $jumlah;
            echo "<h1>$count $value $jumlah</h1>";
        }
        $tampungvalue = $value;
    }
    echo "<h1>Matriks baru:</h1>";
    for ($i = 0; $i < $jumlahdesa; $i++) {
        for ($j = 0; $j < $jumlahsumber; $j++) {
            echo $matriks[$i][$j] . "&emsp;&emsp;";
        }
        echo "<br>";
    }

    echo "<h1><br>Kumpulan data yang dianalisis:</h1>";
    $query = "SELECT desa, sumber, jumlah FROM airminum ORDER BY desa, sumber;";
    $result = $mysqli->query($query);
    while ($row = $result->fetch_row()) {
        echo "<h1>$row[0] $row[1] $row[2]<br></h1>";
    }

    // Mencari nilai pembagi
    $pembagi = array();
    for ($i = 0; $i < $jumlahsumber; $i++) {
        $temp = 0;
        for ($j = 0; $j < $jumlahdesa; $j++) {
            $temp = $temp + $matriks[$j][$i];
        }
        $pembagi[$i] = sqrt($temp);
        echo $pembagi[$i] . "<br>";
    }
    echo "<br>";

    // Mencari keputusan ternormalisasi
    $ternormalisasi = array(array());
    for ($i = 0; $i < $jumlahdesa; $i++) {
        for ($j = 0; $j < $jumlahsumber; $j++) {
            $ternormalisasi[$i][$j] = $matriks[$i][$j] / $pembagi[$j];
        }
    }

    // Tabel keputusan ternormalisasi dan terbobot
    $bobot = array();
    $bobot[0] = 1;
    $bobot[1] = 2;
    $bobot[2] = 2;
    $bobot[3] = 1;
    $bobot[4] = 1;
    $bobot[5] = 1;
    $bobot[6] = 1;
    $bobot[7] = 1;
    $bobot[8] = 1;
    $bobot[9] = 1;
    $bobot[10] = 1;
    $bobot[11] = 1;

    $terbobot = array(array());
    for ($i = 0; $i < $jumlahdesa; $i++) {
        for ($j = 0; $j < $jumlahsumber; $j++) {
            $terbobot[$i][$j] = $ternormalisasi[$i][$j] * $bobot[$j];
        }
    }

    // Hasil perhitungan solusi ideal positif dan solusi ideal negatif
    $aplus = array();
    for ($i = 0; $i < $jumlahsumber; $i++) {
        $aplus[$i] = 0;
    }
    // MAX
    for ($i = 0; $i < $jumlahsumber; $i++) {
        for ($j = 0; $j < $jumlahdesa; $j++) {
            if ($terbobot[$j][$i] > $aplus[$i]) {
                $aplus[$i] = $terbobot[$j][$i];
            }
        }
        echo $aplus[$i] . "<br>";
    }

    $aminus = array();
    for ($i = 0; $i < $jumlahsumber; $i++) {
        $aminus[$i] = 0;
    }
    // MIN
    echo "<br>";
    for ($i = 0; $i < $jumlahsumber; $i++) {
        for ($j = 0; $j < $jumlahdesa; $j++) {
            if ($terbobot[$j][$i] < $aplus[$i]) {
                $aminus[$i] = $terbobot[$j][$i];
            }
        }
        echo $aminus[$i] . "<br>";
    }

    // Nilai separation measure D+ dan D-
    $dplus = array();
    for ($i = 0; $i < $jumlahdesa; $i++) {
        for ($j = 0; $j < $jumlahsumber; $j++) {
            $temp = pow($terbobot[$i][$j] - $aplus[$j], 2);
        }
        $dplus[$i] = sqrt($temp);
    }

    $dminus = array();
    for ($i = 0; $i < $jumlahdesa; $i++) {
        for ($j = 0; $j < $jumlahsumber; $j++) {
            $temp = pow($terbobot[$i][$j] - $aminus[$j], 2);
        }
        $dminus[$i] = sqrt($temp);
    }

    // Hasil perhitungan kedekatan nilai preferensi
    $V = array(array());
    echo "<br>";
    for ($i = 0; $i < $jumlahdesa; $i++) {
        $temp = $dplus[$i] + $dminus[$i];
        $V[$i][1] = $dminus[$i] / $temp;
        echo $V[$i][1] . "<br>";
    }
    $query = "SELECT desa FROM airminum GROUP BY desa ORDER BY desa;";
    $result = $mysqli->query($query);
    $count = 0;
    while ($row = $result->fetch_row()) {
        $V[$count][0] = $row[0];
        $count = $count + 1;
    }

    rsort($V);
    echo "<br>";
    for ($i = 0; $i < $jumlahdesa; $i++) {
        for ($j = 0; $j < 2; $j++) {
            echo $V[$i][$j] . " ";
        }
        echo "<br>";
    }

    // Hasil akhir
    echo "<h1>Hasil Analisis:<br>Semakin besar V, maka semakin tinggi rankingnya. Oleh karena itu, " . $V[0][0] . " terpilih sebagai desa yang paling diutamakan dengan nilai tertinggi sebesar ". $V[0][1] . ".</h1>";
    ?>
</body>

</html>