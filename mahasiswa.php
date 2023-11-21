<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
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

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #333;
        }

        select,
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>

        <form action="caridata.php" method="get">
            <label for="prodi">Pilih Prodi:</label>
            <select name="prodi" id="prodi">
                <option value=""></option>
                <?php
                    $koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");

                    $query_prodi = "SELECT DISTINCT prodi FROM mahasiswa";
                    $result_prodi = mysqli_query($koneksi, $query_prodi);

                    while ($row_prodi = mysqli_fetch_assoc($result_prodi)) {
                        echo "<option value='{$row_prodi['prodi']}'>{$row_prodi['prodi']}</option>";
                    }
                    
                    mysqli_close($koneksi);
                ?>
            </select>

            <input type="submit" value="Cari">
        </form>

        <form action="tambahdata.php" method="post">
            <label for="nim">NIM:</label>
            <input type="text" name="nim" required>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>
            <label for="prodi">Prodi:</label>
            <input type="text" name="prodi" required>
            <label for="kode">Kode Prodi:</label>
            <input type="text" name="kode" required>

            <input type="submit" value="Tambahkan">
        </form>

        <form action="editdata.php" method="post">
            <label for="nim_edit">NIM:</label>
            <input type="text" name="nim_edit" required>
            <label for="nama_edit">Nama:</label>
            <input type="text" name="nama_edit" required>
            <label for="kode_edit">Kode Prodi:</label>
            <input type="text" name="kode_edit" required>

            <input type="submit" value="Edit">
        </form>

        <form action="hapusdata.php" method="get">
            <label for="del">Masukkan NIM :</label>
            <input type="text" name="del" required>

            <input type="submit" value="Hapus">
        </form>
        
        <?php
            $koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");

            $query = "SELECT * FROM mahasiswa";
            $result = mysqli_query($koneksi, $query);

            echo "<table border='1'>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Kode Prodi</th>
                    </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['nim']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['kode']}</td>
                    </tr>";
            }

            echo "</table>";

            mysqli_close($koneksi);
        ?>
    </div>
</body>
</html>
