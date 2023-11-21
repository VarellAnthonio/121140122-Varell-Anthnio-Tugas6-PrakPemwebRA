<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        a {
            display: block;
            margin: 20px auto;
            text-align: center;
            text-decoration: none;
            color: #4caf50;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hasil Pencarian Mahasiswa</h2>
        
        <?php
            $koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");

            $prodi_cari = $_GET['prodi'];

            $query_cari = "SELECT nim, nama, kode FROM mahasiswa WHERE prodi = '$prodi_cari'";
            $result_cari = mysqli_query($koneksi, $query_cari);

            echo "<table border='1'>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Kode Prodi</th>
                    </tr>";

            while ($row_cari = mysqli_fetch_assoc($result_cari)) {
                echo "<tr>
                        <td>{$row_cari['nim']}</td>
                        <td>{$row_cari['nama']}</td>
                        <td>{$row_cari['kode']}</td>
                    </tr>";
            }

            echo "</table>";

            echo "<a href='mahasiswa.php'>Kembali ke Halaman Utama</a>";

            mysqli_close($koneksi);
        ?>
    </div>
</body>
</html>
